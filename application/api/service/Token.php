<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/14 0014
 * Time: 13:59
 */

namespace app\api\service;


use app\lib\Exception\TokenException;
use think\facade\Cache;
use think\Exception;
use think\facade\Request;

class Token
{
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

    public static function getCurrentUid(){
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
}