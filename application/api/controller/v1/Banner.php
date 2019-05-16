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
    /**
     * 根据指定id的banenr信息
     * @Url /banner/:id http://z.cn/api/v1/banner/1
     * @http GET
     * @id banner的id
     * @return 返回一条banner模型对象
     * */
    public function getBanner($id){
        $data = [
            'products' => [
                'productID' => 1,
                'count' => 2
            ],
            [
                'productID' => 2,
                'count' => 3
            ]
        ];
        halt(json_encode($data));
        (new \app\api\validate\Banner())->goCheck();
        $result = BannerModel::getBannerInfo($id);
        if(!$result){
            throw new BannerMissException();
        }
        return ($result);
    }
}