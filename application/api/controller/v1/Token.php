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

/**
 * 获取令牌，相当于登陆
 */
class Token
{
    /**
     * 用户获取令牌(登陆)
     * $Url /token/user?code=code1 http://z.cn/api/v1/token/user Body->raw{"code":"021qKVZk2S3aeE0ImAZk2Rvf0l2qKVZD"}
     * @Http POST
     * @code 调用微信wx.login接口获取登录凭证(code)
     * @throws
     * @return token
     * */
    public function getToken($code = ''){
        (new TokenValidate())->goCheck();
        $ut = new UserToken($code);
        $token = $ut->get();

        return $token;
    }
}