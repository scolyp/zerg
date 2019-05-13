<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/13 0013
 * Time: 13:09
 */

namespace app\api\validate;


use app\lib\Exception\BaseException;

class TokenValidate extends BaseValidate
{
    protected $rule = [
        'code' => ['require']
    ];
}