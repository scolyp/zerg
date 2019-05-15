<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/5/15
 * Time: 22:59
 */

namespace app\lib\Exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}