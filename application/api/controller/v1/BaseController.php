<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/16 0016
 * Time: 13:08
 */

namespace app\api\controller\v1;


use think\Controller;
use app\api\service\Token;

class BaseController extends Controller
{
    protected function checkPrimaryScope(){
        return Token::needPrimaryScope();
    }

    protected function checkExclusiveScope(){
        return Token::needExclusiveScope();
    }
}