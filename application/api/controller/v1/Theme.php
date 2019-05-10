<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/10 0010
 * Time: 14:00
 */

namespace app\api\controller\v1;

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
        $model = new ThemeModel;
        $result = $model::with('topicImg,headImg')->select($ids);
//        halt(count($result));

        if(count($result) ==0){
            throw new ThemeException();
        }
        return $result;
    }
}