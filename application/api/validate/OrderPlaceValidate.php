<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/16 0016
 * Time: 13:51
 */

namespace app\api\validate;



use app\lib\Exception\ParameterException;

class OrderPlaceValidate extends BaseValidate
{
    protected $rule = [
        'products' => 'checkProducts'
    ];
    protected $singleRule = [
        'product_id' => ['require','isPositiveInteger'],
        'count' => ['require','isPositiveInteger'],

    ];

    protected function checkProducts($value,$rule,$data=[]){
        if(!is_array($value)){
            throw new ParameterException([
                'msg' => '商品列表参数格式不正确'
            ]);
        }
        if(empty($value)){
            throw new ParameterException([
                'msg' => '商品列表参数不能为空'
            ]);
        }
        foreach($value as $v){
            $this->checkProduct($v);
        }
        return true;
    }

    private function checkProduct($v){
        $validate = new BaseValidate($this->singleRule);
        $result = $validate->batch()->check($v);
        if(!$result){
            throw new ParameterException([
                'msg' => '商品列表参数错误'
            ]);
        }
    }
}