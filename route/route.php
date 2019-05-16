<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

//Banner
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

//Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');

//Theme
Route::group('api/:version/theme/',function(){
    Route::get('','api/:version.Theme/getSimpleList');
    Route::get(':id','api/:version.Theme/getComplexOne');
});


//Category
Route::get('api/:version/category','api/:version.Category/getAllCategories');

//Token
Route::post('api/:version/token/user','api/:version.Token/getToken');

//Product
Route::group('api/:version/product',function(){
    Route::get('/:id','api/:version.Product/getOne',[],['id' => '\d+']);
    Route::get('/recent','api/:version.Product/getRecent');
    Route::get('/by_category','api/:version.Product/getAllInCategory');
});

//Address
Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');

//Order
Route::post('api/:version/order','api/:version.Order/placeOrder');

return [

];
