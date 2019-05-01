<?php

namespace App\Repositories;

use App\Models\DevScene;
use InfyOm\Generator\Common\BaseRepository;
use App\Models\DevCommand;

/**
 * Class DevSceneRepository
 * @package App\Repositories
 * @version May 1, 2019, 10:44 am CST
 *
 * @method DevScene findWithoutFail($id, $columns = ['*'])
 * @method DevScene find($id, $columns = ['*'])
 * @method DevScene first($columns = ['*'])
*/
class DevSceneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'enabled',
        'region_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DevScene::class;
    }

    /**
     * 获取场景名称通过场景id
     * @param  [type] $scene_id [description]
     * @return [type]           [description]
     */
    public function getSceneNameById($scene_id)
    {
        return optional($this->findWithoutFail($scene_id))->name;
    }

    /**
     * 设置场景开关
     * @param [type] $swith_status [description]
     * @param [type] $scene        [description]
     */
    public function setSceneSwitch($swith_status,$scene)
    {
        /**
         * 如果开启一个场景 先把该区域关联的所有场景关闭 一个区域只能同时开启一个场景
         */
        if($swith_status)
        {
            $this->updateSceneRegionEnableStatus($scene->region_id,$scene->id);
            //执行关联的操作命令
            $this->startMutiControlRequest($scene->id);
        }
        return true;
    }

    /**
     * 开始联动控制请求
     * @param  [type] $scene_id [description]
     * @return [type]           [description]
     */
    public function startMutiControlRequest($scene_id)
    {
        $commandDatas = DevCommand::where('scene_id',$scene_id)
        ->select('me','idx','type','val','agt')
        ->get();
        $commandDatas = json_encode($commandDatas);
        //发起请求
        \Smart::mutiControlRequest($commandDatas);
    }


    /**
     * 更新场景相关区域的状态
     * @param  [type] $region_id [description]
     * @param  [type] $scene_id  [description]
     * @return [type]            [description]
     */
    public function updateSceneRegionEnableStatus($region_id,$scene_id)
    {
         DevScene::where('region_id',$region_id)
         ->where('id','<>',$scene_id)
         ->update(['enabled'=>0]);
         return true;
    }
}
