<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/5/12
 * Time: 22:43
 */

namespace app\lib\Exception;


class ProductException extends BaseException
{
    public $code = 404;
    public $msg = '指定商品不存在，请检查商品ID';
    public $errorCode = 20000;
}