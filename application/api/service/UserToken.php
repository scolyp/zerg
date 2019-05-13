<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/13 0013
 * Time: 13:24
 */

namespace app\api\service;


use think\Exception;

class UserToken
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
//        dump($this->wxAppCode);
//        dump($this->wxAppID);
//        dump($this->wxAppSecret);
//        halt($this->wxAppLoginUrl);
        $result = curl_get($this->wxAppLoginUrl);
        $wxResult = json_decode($result,true);

        if(empty($wxResult)){
            throw new Exception('获取session_key及openID时异常，微信内部错误');
        }else{
            $loginFail = array_key_exists('errcode',$wxResult);
            if($loginFail){
            
            }else{

            }
        }
    }
}