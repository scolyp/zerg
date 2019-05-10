<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/10 0010
 * Time: 11:50
 */

namespace app\api\model;



class Image extends BaseModel
{
    //隐藏表字段数据
    protected $hidden = ['delete_time','update_time','from'];

    //对图片资源URL配置
    public function getUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
}