<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/13 0013
 * Time: 13:04
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenValidate;
use think\Exception;

class Token
{
    /**
     * $Url /token/user?code=code1 http://z.cn/api/v1/token/user?code
     * */
    public function getToken($code = ''){
        (new TokenValidate())->goCheck();
        $ut = new UserToken($code);
        $token = $ut->get();

    }
}