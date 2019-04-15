<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/4/11
 * Time: 22:51
 */

namespace app\lib\Exception;

class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '文件无法找到';
    public $errorCode = 4000;
}