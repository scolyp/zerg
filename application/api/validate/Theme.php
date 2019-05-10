<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/10 0010
 * Time: 14:08
 */

namespace app\api\validate;


class Theme extends BaseValidate
{
    protected $rule = [
        'ids' => ['require','checkIDs']
    ];
    protected $message = [
        'ids.require' => 'ids参数不能为空',
        'ids.checkIDs' => 'ids参数必须为以逗号分隔的正整数'
    ];
    protected function checkIDs($value){
        $values = explode(',',$value);
        if(empty($values)){
            return false;
        }
        foreach($values as $v){
            if(!$this->isPositiveInteger($v)){
                return false;
            }
        }
        return true;
    }
}
