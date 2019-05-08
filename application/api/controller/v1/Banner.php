<?php
/**
 * Created by PhpStorm.
 * User: fgq
 * Date: 2019/4/8
 * Time: 22:58
 */
namespace app\api\controller\v1;
use app\api\model\Banner as BannerModel;
use app\lib\Exception\BannerMissException;
use think\Exception;

class Banner
{
    public function getBanner($id){
        $data = [
            'id' => $id,
            'age' => 18
        ];
        (new \app\api\validate\Banner())->goCheck();
        $model = new BannerModel();
//        $result = $model->getBannerInfo($id);
//        halt(1);

//        if(!$result){
//
//            throw new Exception();
//        }
//        return $result;
//        if ($result){
//            dump($validate->getError());
//        }

    }
}