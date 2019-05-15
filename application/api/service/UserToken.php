<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/13 0013
 * Time: 13:24
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\Exception\TokenException;
use app\lib\Exception\WeChatException;
use think\Exception;
use app\api\model\User as UserModel;

class UserToken extends Token
{
    protected $wxAppCode;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxAppLoginUrl;

    function __construct($code){
        $this->wxAppCode = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxAppLoginUrl = sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->wxAppCode);
    }
    public function get(){
        $result = curl_get($this->wxAppLoginUrl);
        $wxResult = json_decode($result,true);

        if(empty($wxResult)){
            throw new Exception('获取session_key及openID时异常，微信内部错误');
        }else{
            $loginFail = array_key_exists('errcode',$wxResult);
            if($loginFail){
                $this->processLoginError($wxResult);
            }else{
                return $this->grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult){
        //获取openid
        //判断user表中是否存在该openid，存在：不处理。不存在：就新增一条数据
        //生成令牌，准备缓存数据，写入缓存
        //key:令牌(Token)
        //value:wxResult,uid,scope(权限)
        //将令牌返回客户端
        $openid = $wxResult['openid'];
        $user = UserModel::where('openid','=',$openid)->find();
        //取uid的意义:本身有已有openid做标识，但openid太长，用简短的用户id更直观
        if(empty($user)){
            $uid = $this->newUser($openid);
        }else{
            $uid = $user->id;
        }
        $cacheValue = $this->prepareCachedValue($wxResult,$uid);
        $token = $this->saveToCache($cacheValue);
        return [
            'token' => $token
        ];

    }

    private function saveToCache($cacheValue){
        $key = self::generateToken();
        $value = json_encode($cacheValue);
        $expire_in = config('setting.token_expire_in');
        $result = cache($key,$value,$expire_in);
        if(!$result){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
    }

    private function prepareCachedValue($wxResult,$uid){
        $cacheValue =$wxResult;
        $cacheValue['uid'] = $uid;
        $cacheValue['scope'] = ScopeEnum::User;
        return $cacheValue;
    }

    private function newUser($openid){
        $user = UserModel::create([
            'openid' => $openid
        ]);
        return $user->id;
    }

    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }
}