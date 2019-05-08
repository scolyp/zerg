<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/4/14
 * Time: 16:18
 */

namespace app\lib\Exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '内部错误';
    public $errorCode = 10000;

}