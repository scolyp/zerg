<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/4/11
 * Time: 22:37
 */

namespace app\lib\Exception;
use think\exception\Handle;
use Exception;
use think\facade\Request;
use think\facade\Log;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    //返回请求的Url

    public function render(Exception $e){
        if($e instanceof BaseException){
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{
            if(Config('app_trace')){
                return parent::render($e);
            }else{
                $this->code = 510;
                $this->msg = '服务器内部错误';
                $this->errorCode = 999;
            }
            $this->recordErrorLog($e);
        }
        $result = [
            'code' => $this->code,
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => Request::url()
        ];
        return json($result,400);
    }

    protected function recordErrorLog(Exception $e){
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(),'error');
    }
}