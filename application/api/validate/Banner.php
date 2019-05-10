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
    ];
    protected $message = [
        'id.isZNumber' => 'ID必须为正整数',
        'id.number' => 'ID必须为纯数字',
    ];
    protected function isZNumber($value){
        if(!$this->isPositiveInteger($value)){
            return false;
        }
        return true;
    }

}