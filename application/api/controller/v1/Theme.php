<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/10 0010
 * Time: 14:00
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePositiveInt;
use app\api\validate\Theme as ThemeValidate;
use app\api\model\Theme as ThemeModel;
use app\lib\Exception\BannerMissException;
use app\lib\Exception\ThemeException;

class Theme
{
    /**
     * 获取一组主题信息表
     * @Url /theme?ids = id1,id2,id3,... http://z.cn/api/v1/theme?ids=1,2
     * @return 返回一组theme表模型
     * */
    public function getSimpleList($ids=''){
        (new ThemeValidate())->goCheck($ids);
        $result = ThemeModel::with('topicImg,headImg')->select($ids);
        if($result->isEmpty()){
            throw new ThemeException();
        }
        return $result;
    }
    /**
     *  获取单个主题下的商品信息
     * @Url /theme/:id http://z.cn/api/v1/theme/1
     * @Http GET
     * @id theme_product表ID
     * @return 一组product模型商品
     * */
    public function getComplexOne($id){
        (new IDMustBePositiveInt())->goCheck();
        $result = ThemeModel::getThemeWithProducts($id);
        if(!$result){
            throw new ThemeException();
        }
        return $result;
    }
}