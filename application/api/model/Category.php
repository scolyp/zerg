<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/5/12
 * Time: 23:10
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = [
        'delete_time','create_time', 'update_time'];

    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
}