<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test',function(){
		dd(time());
		return app('common')->downloadImage('http://newnews.book.kaimusoft.xyz/uploads/logo.png');
});



Route::group(['prefix'=>'smart_data','namespace'=>'Smart'],function(){
	//前端路由
	Route::get('/', 'MainController@index');

});






Route::group(['middleware'=>['web'],'namespace'=>'Front'],function(){
	//前端路由
	Route::get('/', 'MainController@index')->name('index');

});

/**
 *后台
 */
//刷新缓存
Route::post('/clearCache','CommonApiController@clearCache');


Route::resource('devElectricityMeters', 'DevElectricityMeterController');