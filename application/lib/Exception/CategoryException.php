<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/5/12
 * Time: 23:15
 */

namespace app\lib\Exception;


class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '指定类目不存在，请检查商品ID';
    public $errorCode = 20000;
}