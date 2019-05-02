<?php

namespace App\Http\Controllers\Smart\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class DeviceApiController extends AppBaseController
{
	/**
	 * 获取当前所有设备列表
	 * @return [type] [description]
	 */
	public function getAllDevices()
	{
		return zcjy_callback_data(\Smart::getAllDevicesAndByRegionName());
	}

	/**
	 * 获取指定区域内的设备列表
	 * @return [type] [description]
	 */
	public function getRegionDevices($region_name)
	{
		return zcjy_callback_data(\Smart::getAllDevicesAndByRegionName($region_name));
	}
}