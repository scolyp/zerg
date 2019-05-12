<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/5/12
 * Time: 20:44
 */

namespace app\api\validate;


class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => ['require','isPositiveInteger']
    ];
    protected $message = [
        'id.isPositiveInteger' => 'id参数必须为整数',
    ];
}