<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/10 0010
 * Time: 13:43
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    //组合新的图片url
    protected function prefixImgUrl($value,$data){
        $finalUrl = $value;
        if($data['from'] == 1){
            $finalUrl = config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }
}