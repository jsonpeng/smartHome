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
		dd(app('common')->DevSceneRepo()->startMutiControlRequest(1));
		dd(curl_post("https://api.ilifesmart.com/app/auth.RegisterUser",[]));
		dd(time());
		return app('common')->downloadImage('http://newnews.book.kaimusoft.xyz/uploads/logo.png');
});


//自动生成api文档
Route::group(['prefix' => 'swagger'], function () {
    Route::get('json', 'SwaggerController@getJSON');

});

Route::group(['prefix'=>'smart_data','namespace'=>'Smart'],function(){
	//前端路由
	Route::get('/', 'MainController@index');

});

//前端路由
Route::get('/', function(){
	return redirect('/smart');
});

/**
 * 基础api
 */
Route::group(['prefix'=>'api','namespace'=>"Smart\API"],function(){

	/**
	 * 设备相关api
	 */
	Route::group(['prefix'=>'device'],function(){
		//获取所有设备
		Route::get('all','DeviceApiController@getAllDevices');
		//获取指定区域内的设备
		Route::get('get_region/{region_name}','DeviceApiController@getRegionDevices');
	});

	/**
	 * 情景相关api
	 */
	Route::group(['prefix'=>'scene'],function(){
		//获取所有情景
		Route::get('all','SceneApiControlller@getSceneAll');
		//获取指定区域的情景模式
		Route::get('get/{region_name}','SceneApiControlller@getSceneByRegionName');
	});
});


/**
 *后台
 */
//刷新缓存
Route::post('/clearCache','AppBaseController@clearCache');

Route::group(['prefix'=>'smart','namespace'=>"Smart"],function(){
	//说明文档
	Route::get('/doc', 'SettingController@settingDoc');
	//后台首页
	Route::get('/', 'SettingController@setting');
	 //系统设置
    Route::get('settings/setting', 'SettingController@setting')->name('settings.setting');
    Route::post('settings/setting', 'SettingController@update')->name('settings.setting.update');
	//灯泡管理
	Route::resource('devLights', 'DevLightController');
	//地区管理
	Route::resource('regions', 'RegionController');
	//场景管理
	Route::resource('devScenes', 'DevSceneController');
	//场景关联的控制命令管理
	Route::resource('devCommands', 'DevCommandController');
	//传感器管理
	Route::resource('devSensors', 'DevSensorController');
});





