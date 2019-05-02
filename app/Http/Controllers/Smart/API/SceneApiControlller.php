<?php

namespace App\Http\Controllers\Smart\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class SceneApiControlller extends AppBaseController
{
	
	public function getSceneAll()
	{
		return zcjy_callback_data(\Smart::getSceneAll());
	}

	public function getSceneByRegionName($region_name)
	{
		return zcjy_callback_data(\Smart::getScenesByRegionName($region_name));
	}
}