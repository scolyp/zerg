<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/16 0016
 * Time: 13:18
 */

namespace app\api\controller\v1;


use app\api\validate\OrderPlaceValidate;

class Order extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder']//checkExclusive在BaseController，是一个方法
    ];

    /**
     * 下订单
     * @Url /address
     * @note
     * Headers:token:
     * raw:[{"productID":1,"count":2},{"productID":2,"count":3}]
     * */
    public function placeOrder(){
        //订单参数校验
        //判断是否库存足够，有：生产订单，无：提示库存不够
        //客户端发起支付，在查一次库存，有库存，调用微信服务器支付接口
        //微信服务器（异步返回消息）
        //成功删除库存
        (new OrderPlaceValidate())->goCheck();
        //取出Uid，根据客户端传递的商品信息取出商品ID，查出对应数据库商品数据

        return 'success';
    }
}