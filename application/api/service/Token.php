<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/14 0014
 * Time: 13:59
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\Exception\ForbiddenException;
use app\lib\Exception\TokenException;
use think\facade\Cache;
use think\Exception;
use think\facade\Request;

class Token
{
    //生成Token
    public static function generateToken(){
        //用三组字符串，进行MD5加密
        //32个字符组成一组随机字符串
        $randChars = getRandChar(32);
        //当前时间戳
        $timesTamp = time();
        //盐
        $salt = config('secure.token_salt');

        return md5($randChars.$timesTamp.$salt);
    }

    //通用方法 根据参数获取缓存对应值
    public static function getCurrentTokenVar($key){
        $token = Request::header('Token');
        $cache = Cache::get($token);
        if(!$cache){
            throw new TokenException();
        }
        if(!is_array($cache)){
            $cache = json_decode($cache,true);
        }
        if(array_key_exists($key,$cache)){
            return $cache[$key];
        }else{
            throw new Exception('尝试获取的Token变量不存在');
        }
    }

    //获取当前缓存Uid
    public static function getCurrentUid(){
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }

    //用户与管理员，带有效的Token与scope才可访问接口。
    public static function needPrimaryScope(){
        $scope = self::getCurrentTokenVar('scope');
        if($scope >= ScopeEnum::User){
            return true;
        }else{
            throw new ForbiddenException();
        }
    }

    //排除管理员,只限定用户访问接口
    public static function needExclusiveScope(){
        $scope = self::getCurrentTokenVar('scope');
        if($scope == ScopeEnum::User){
            return true;
        }else{
            throw new ForbiddenException();
        }
    }
}