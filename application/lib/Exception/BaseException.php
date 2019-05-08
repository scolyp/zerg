<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/4/11
 * Time: 22:43
 */

namespace app\lib\Exception;


use think\Exception;

class BaseException extends Exception
{
    //HTTP 状态码 404，200
    public $code = 404;
    //错误具体信息
    public $msg = '文件找不到';
    //自定义的错误码
    public $errorCode = 10000;

    public function __construct($params = []){
        if(!is_array($params)){
            return ;
        }else{
            if(array_key_exists('code',$params)){
                $this->code = $params['code'];
            }
            if(array_key_exists('msg',$params)){
                $this->msg = $params['msg'];
            }
            if(array_key_exists('errorCode',$params)){
                $this->errorCode = $params['errorCode'];
            }
        }
    }
}