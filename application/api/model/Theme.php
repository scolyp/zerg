<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/10 0010
 * Time: 15:15
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden = ['delete_time','update_time','topic_img_id','head_img_id'];
    public function topicImg(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
    public function headImg(){
        return $this->belongsTo('Image','head_img_id','id');
    }
}