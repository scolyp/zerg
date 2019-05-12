<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/5/12
 * Time: 22:01
 */

namespace app\api\controller\v1;
use app\api\validate\CountValidate;
use app\api\model\Product as ProductModel;
use app\lib\Exception\ProductException;

class Product
{
    /**
     * 获取最近商品
     * @Url /recent?count?=1 http://z.cn/api/v1/product/recent?count=10
     * @Http GET
     * @count 获取商品条数
     * @return Product一组模型
     * */
    public function getRecent($count = 15){
        (new CountValidate())->goCheck();
        $result = ProductModel::getRecentProducts($count);
        if($result->isEmpty()){
            throw new ProductException();
        }
        $result = $result->hidden(['summary']);
        return $result;
    }
}