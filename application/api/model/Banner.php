<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/4/11
 * Time: 22:34
 */

namespace app\api\model;


use think\Model;

class Banner extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }
    public static function getBannerInfo($id){
        $banner = self::with(['items','items.image'])->find($id);
        return $banner;
    }
}