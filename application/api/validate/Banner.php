<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/4/10
 * Time: 20:27
 */

namespace app\api\validate;
use think\Validate;

class Banner extends BaseValidate
{
    protected $rule = [
        'id' => ['require','number','isZNumber'],
        'age' => 'number'
    ];
    protected function isZNumber($value,$rule = '',$data = ''){
        if(is_int($value + 0) && is_int($value + 0) > 0){
            return true;
        }else{
            return $value.'不是一个整数';
        }
    }

}