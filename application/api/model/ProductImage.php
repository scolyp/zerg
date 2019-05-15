<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/15 0015
 * Time: 10:29
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    public function imgUrl(){
        return $this->belongsTo('Image','img_id','id');
    }
}