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
//        dump($params);

        if(!$result){
            $error = $this->error;
//            throw new ParameterException([
//                'msg' => $error
//            ]);
//            throw Exception('suowu ');
//            return $error;
            throw new Exception('123');
        }else{
            return true;
        }
    }
}