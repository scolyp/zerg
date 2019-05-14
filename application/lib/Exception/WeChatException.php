<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/14 0014
 * Time: 10:40
 */

namespace app\lib\Exception;


class WeChatException extends BaseException
{
    public $code = 404;
    public $msg = '微信服务器接口调用失败';
    public $errorCode = 999;
}