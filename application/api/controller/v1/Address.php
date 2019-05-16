<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/15 0015
 * Time: 13:13
 */

namespace app\api\controller\v1;


use app\api\model\User;
use app\api\validate\AddressValidate;
use app\api\service\Token;
use app\lib\Exception\SuccessMessage;
use app\lib\Exception\UserException;

class Address extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
    ];

    /**
     * 新增地址或更新地址
     * @Url /address http://z.cn/api/v1/address
     * @Http POST
     * @throws
     * @return true
     * @note token参数放于Headers中
     * row
     * {
        "name":"zyr","mobile":"18960923220","province":"江西省","city":"抚州市","country":"广昌县","detail":"旴江镇..."
        }
     * */
    public function createOrUpdateAddress(){
        $validate = new AddressValidate();
        $validate->goCheck();
        //根据客户端传递Token，取出uid
        //根据uid查找用户表用户是否存在，不存在抛出异常
        //获取数据
        //对数据进行检查过滤
        //判断地址表是否存在该uid地址，无->创建，有->更新
        $uid = Token::getCurrentUid();
        $user = User::get($uid);
        if(!$user){
            throw new UserException();
        }
        $data = $validate->getDataByRule(input('post.'));
        if($user->address){
            //更新
            $user->address->save($data);
        }else{
            //新增
            $user->address()->save($data);
        }
        throw new SuccessMessage();
    }
}