<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/4/10
 * Time: 21:08
 */

namespace app\api\validate;
use app\lib\Exception\ParameterException;
use think\facade\Request;
use think\Validate;
use think\Exception;

class BaseValidate extends Validate
{
    public function goCheck(){
        $params = Request::param();
        $result = $this->batch()->check($params);
        if(!$result){
            $error = $this->error;
            throw new ParameterException([
                'msg' => $error
            ]);
        }else{
            return true;
        }
    }

    protected function isPositiveInteger($value, $rule='', $data = [], $field = ''){
        if(is_int($value + 0) && is_int($value + 0) > 0){
            return true;
        }else{
            return false;
        }
    }

    protected function isNotEmpty($value,$rule='',$data=[],$field=''){
        if(empty($value)){
            return false;
        }else{
            return true;
        }
    }

    public function getDataByRule($data){
        //校验客户端用户是否传入额外的参数
        if(array_key_exists('uid',$data) || array_key_exists('user_id',$data)){
            throw new ParameterException([
                'msg' => '参数中含有非法的参数名user_id或uid'
            ]);
        }
        $newArray = [];
        foreach($this->rule as $key=>$value){
            $newArray[$key] = $data[$key];
        }
        return $newArray;
    }
}