<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/5/12
 * Time: 18:28
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = [
        'delete_time', 'main_img_id', 'pivot', 'from', 'category_id',
        'create_time', 'update_time'];
    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }

    public function images(){
        return $this->hasMany('ProductImage','product_id','id');
    }

    public function property(){
        return $this->hasMany('ProductProperty','product_id','id');
    }

    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }

    public static function getRecentProducts($count){
        $products = self::limit($count)
            ->order('create_time','desc')
            ->select();
        return $products;
    }

    public static function getProductByCategoryID($id){
        return self::where('category_id','=',$id)->select();
    }

    public static function getProductDetail($id){
        $result = self::with([
            'images' => function($query){
                $query->with(['imgUrl'])
                    ->order('order','asc');
            }
        ])
            ->with(['property'])
            ->find($id);

        return $result;
    }
}