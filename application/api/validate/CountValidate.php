<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/5/12
 * Time: 22:08
 */

namespace app\api\validate;


class CountValidate extends BaseValidate
{
    protected $rule = [
        'count' => ['isPositiveInteger','between:1,15']
    ];
    protected $message = [
        'count.isPositiveInteger' => 'count必须为正整数',
    ];
}