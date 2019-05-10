<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/9 0009
 * Time: 17:28
 */

namespace app\api\model;


use think\Model;

class BannerItem extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public function image(){
        return $this->belongsTo('Image','img_id','id');
    }
}