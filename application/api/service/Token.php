<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/14 0014
 * Time: 13:59
 */

namespace app\api\service;


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
}