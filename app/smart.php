<?php
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use App\Models\Region;
use App\Models\DevLight;
use App\Models\DevSensor;
use App\Models\DevScene;


class Smart{

     use SmartDataShow,SmartDeviceControl,SmartContent,SmartHelper;

 }

/**
 * 常量管理
 */
trait SmartContent{

     //java 多个控制接口
    public static $smartUrl = "http://localhost:8090/api/device/";

    //传感器类型
    public static $sensorType = 
    [
        '1' => '气体感应器(甲醛)',
        '2' => '气体感应器(燃气)',
        '3' => '环境感应器(TVOC+CO2)'
    ];

    //智能设备通用状态
    public static $state = [
        '0' => '离线',
        '1' => '在线'
    ];

    //智能设备接入状态
    public static $is_join = [
        '0' => '未接入',
        '1' => '已接入'
    ];

    //传感器报警状态
    public static $alarm_sound = [
        '0' => '未报警',
        '1' => '报警'
    ];

    //设备状态对应的类型
    public static $deviceType = 
    [
        'SL_SPOT'    => '超级碗',
        'SL_LI_RGBW' => '幻彩灯泡',
        'SL_SC_CP'   => '燃气传感器',
        'SL_SC_CQ'   => '环境传感器',
        'SL_CT_RGBW' => '灯带'
    ];

    //区域配置
    public static $regionConf = 
    [
        'kt' => '客厅',
        'cf' => '厨房',
        'sf' => '书房',
        'dm' => '大门'
    ];

 }

/**
 * 智能数据显示
 */
trait SmartDataShow{

    /**
     * 获取所有场景
     * @return [type] [description]
     */
    public static function getSceneAll()
    {
        return DevScene::all();
    }

    /**
     * 获取指定区域的场景
     * @param  [type] $region_name [description]
     * @return [type]              [description]
     */
    public static function getScenesByRegionName($region_name)
    {
        return DevScene::where('region_name',$region_name)->get();
    }


    /**
     * 获取所有的设备列表
     * @return [type] [description]
     */
    public static function getAllDevicesAndByRegionName($region_name = null)
    {
        $allDevices = [];

        //智能灯光设备
        $lights = DevLight::orderBy('created_at','desc');

        if($region_name)
        {
            $lights = $lights->where('region_name',$region_name);
        }
            
        $lights = $lights->get();

        if(count($lights))
        {
            foreach ($lights as $key => $light) 
            {
               $allDevices[] = 
               [
                    'name'       => $light->name,
                    'model'      => $light->model,
                    'model_name' => self::getModelName($light->model),
                    'class'      => '智能灯光设备',
                    'image'      => $light->image,
                    'me'         => $light->me,
                    'support_switch' => 1,
                    'support_idx'=> self::getLightSupportIdx($light),
                    'region_name' => self::getRegionDescByName($light->region_name),
                    'state'      => self::getDeviceState($light),
                    'created_at' => $light->created_at
               ];
            }
        }

        //智能传感器设备
        $sensors = DevSensor::orderBy('created_at','desc');

        if($region_name)
        {
            $sensors = $sensors->where('region_name',$region_name);
        }

        $sensors = $sensors->get();

        if(count($sensors))
        {
            foreach ($sensors as $key => $sensor) 
            {
               $allDevices[] = 
               [
                    'name'       => $sensor->name,
                    'model'      => $sensor->model,
                    'model_name' => self::getModelName($sensor->model),
                    'class'      => '智能传感器设备',
                    'image'      => $sensor->image,
                    'me'         => $sensor->me,
                    'support_switch' => 0,
                    'support_idx'=> '',
                    'region_name' => self::getRegionDescByName($sensor->region_name),
                    'state'      => self::getDeviceState($sensor),
                    'created_at' => $sensor->created_at
               ];
            }
        }

        return $allDevices;
    }

    /**
     * 用于可添加的设备列表
     * @return [type] [description]
     */
    public static function getCanUseDevices()
    {
        $canUseDevices = [];

        //智能灯光设备
        $lights = DevLight::where('state',1)
        ->where('agt_state',1)
        ->get();

        if(count($lights))
        {
            foreach ($lights as $key => $light) 
            {
               $canUseDevices[] = 
               [
                    'name'       => $light->name.'(me:'.$light->me.')'.'[智能灯光设备]',
                    'me'         => $light->me,
                    'supportIdx' => self::getLightSupportIdx($light)
               ];
            }
        }
        return $canUseDevices;
    }

}

/**
 * 智能设备控制
 */
trait SmartDeviceControl{

    /**
     * 多个设备控制请求
     * @param  [type] $params [description]
     * @return [type]         [description]
     */
    public static function mutiControlRequest($params)
    {
        $params = ['args'=>$params];
        return self::simpleGuzzleRequest(self::$smartUrl.'set_multi_devices','POST',$params);
    }

}

/**
 * 智能帮助函数
 */
trait SmartHelper{

    /**
     * 获取设备型号名称
     * @param  [type] $model [description]
     * @return [type]        [description]
     */
    public static function getModelName($model)
    {
        return isset(self::$deviceType[$model]) ? self::$deviceType[$model] : '未知设备';
    }


    /**
     * 获取设备的状态
     * @param  [type] $device [description]
     * @return [type]         [description]
     */
    public static function getDeviceState($device)
    {
        if(isset($device->state) && (int)($device->state) === 1 && isset($device->agt_state) && (int)($device->agt_state) === 1)
        {
            return 1;
        }
        else{
            return 0;
        }
    }

    /**
     * 获取灯光可以支持的idx类型
     * @param  [type] $light [description]
     * @return [type]        [description]
     */
    public static function getLightSupportIdx($light)
    {
        $supportIdx = '';
        if(isset($light->support_rgb) && (int)$light->support_rgb === 1)
        {
            $supportIdx .= 'RGB,';
        }

        if(isset($light->support_rgbw) && (int)$light->support_rgbw === 1)
        {
            $supportIdx .= 'RGBW,';
        }

        if(isset($light->support_dyn) && (int)$light->support_dyn === 1)
        {
            $supportIdx .= 'DYN';
        }

        if(substr($supportIdx, -1) == ',')
        {
            $supportIdx = substr($supportIdx, 0,-1);
        }
        return $supportIdx;
    }

    /**
     * 获取区域描述
     * @param  [type] $region_name [description]
     * @return [type]              [description]
     */
    public static function getRegionDescByName($region_name)
    {
        return isset(self::$regionConf[$region_name]) ? self::$regionConf[$region_name] : '无';
    }

    /**
     * 获取区域名称详细
     * @param  [type] $region_id [description]
     * @return [type]            [description]
     */
    public static function getRegionName($region_id)
    {
        return optional(Region::find($region_id))->desc;
    }

    /**
     * 获取展示名称
     * @param  [type] $type  [description]
     * @param  [type] $param [description]
     * @return [type]        [description]
     */
    public static function getDisplayName($param,$type = 'sensorType')
    {   
        return isset((self::${$type})[$param]) ? (self::${$type})[$param] : '未知';
    }

    /**
     * 简单guzzle请求func
     * @param  string $url    [description]
     * @param  string $method [description]
     * @param  array  $param  [description]
     * @return [type]         [description]
     */
    public static function simpleGuzzleRequest($url= '',$method='GET',$param= [])
    {
        try{

            $client = new Client();
            $url_suffix = '?';
            if(is_array($param) && count($param))
            {
                foreach ($param as $key => $value) 
                {
                    $url_suffix .= $key.'='.$value.'&';
                }
                $url_suffix = substr($url_suffix,0,strlen($url_suffix)-1); 
            }
            $url .= $url_suffix;
            $response = $client->request($method, $url);
            return $response->getBody();
        }catch(Exception $e){
            return '请求异常';
        }
    }

    /**
     * 发起guzzel请求
     */
    public static function guzzleRequest($request_config = array('url'=>'','method'=>'GET','form'=>'','headers'=>''), $type = "api")
    {
        try{
            $client = new Client();
            $response = $client->request($request_config['method'], $request_config['url'], [
                'headers' => isset($request_config['headers']) ? $request_config['headers'] : [] ,
                'form_params' => $request_config['form']
            ]);
            // return ($response);
            #解析结果
            $data = json_decode($response->getBody(),true);
            return zcjy_callback_data($data,0,$type);
        } catch (Exception $e) {
            return zcjy_callback_data('请求异常',1,$type);
        }
       
    }

 }