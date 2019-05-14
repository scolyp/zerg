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
     * @Http POST
     * @code 调用微信wx.login接口获取登录凭证(code)
     * */
    public function getToken($code = ''){
        (new TokenValidate())->goCheck();
        $ut = new UserToken($code);
        $token = $ut->get();

        return $token;
    }
}