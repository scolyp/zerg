<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/4/8
 * Time: 22:58
 */
namespace app\api\controller\v2;
use app\api\model\Banner as BannerModel;
use app\lib\Exception\BannerMissException;
use think\Exception;

class Banner
{
    public function getBanner($id){
        (new \app\api\validate\Banner())->goCheck();
        $result = BannerModel::getBannerInfo($id);

        if(!$result){
            throw new BannerMissException();
        }
        return ($result);
    }
}