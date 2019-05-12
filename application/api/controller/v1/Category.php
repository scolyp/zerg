<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/5/12
 * Time: 23:04
 */

namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\Exception\CategoryException;

class Category
{
    /**
     * 获取所有商品分类标题
     * @Url /category
     * @Http GET
     * @return Category模型
     * */
    public function getAllCategories()
    {
        $result = CategoryModel::all([],'img');
        if($result->isEmpty()){
            throw new CategoryException();
        }
        return $result;
    }
}