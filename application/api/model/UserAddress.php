<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/15 0015
 * Time: 13:14
 */

namespace app\api\model;


class UserAddress extends BaseModel
{

    public static function getOneUserAddress($uid){
        $address = self::where('user_id','=',$uid)->find();
        return $address;
    }
}