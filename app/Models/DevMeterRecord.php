<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DevElectricityMeter
 * @package App\Models
 * @version April 26, 2019, 11:56 am CST
 *
 */
class DevMeterRecord extends Model
{
    // use SoftDeletes;

    public $table = 'dev_meter_record';
    const UPDATED_AT = null;
    const DELETED_AT = null;
    //const CREATED_AT = null;

    // protected $dates = ['deleted_at'];


    public $fillable = [
          'power_total' ,// '总充电量',
          'power_total_time' ,// '总充电量刷新时间',
          'enable_state',// '是否合闸',
          'enable_state_time' ,// '合跳闸刷新时间',
          'overdraft' ,// '透支额度',
          'overdraft_time',// '透支额度刷新时间',
          'capacity' ,// '额定功率',
          'capacity_time' ,// '额定功率刷新时间',
          'consume_amount' ,// '当前电表电量',
          'consume_amount_time',// '当前电表电量刷新时间',
          'meter_id',// '电表ID',
    ];

    public static $attribute = [
          'power_total' => '',// '总充电量',
          'power_total_time' => '',// '总充电量刷新时间',
          'enable_state'=> 1,// '是否合闸',
          'enable_state_time' => '',// '合跳闸刷新时间',
          'overdraft' => 0,// '透支额度',
          'overdraft_time'=> '',// '透支额度刷新时间',
          'capacity' => 8.36,// '额定功率',
          'capacity_time' => '',// '额定功率刷新时间',
          'consume_amount' => '',// '当前电表电量',
          'consume_amount_time'=> '',// '当前电表电量刷新时间',
          'meter_id'=> '',// '电表ID',
    ];

    //电表id 8,9,10,11

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
      
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * 获取电表电量信息
     * @return [type] [description]
     */
    public static function getMeter()
    {
        $data = [];
        for ($i=8; $i <= 11 ; $i++) 
        { 
         $data[] = self::getOne();
        }
        return $data;
    }

    /**
     * 获取单个电表的信息
     * @return [type] [description]
     */
    public static function getOne()
    {
      $attribute = self::$attribute;
      $needDealTimeArr = ['power_total_time','enable_state_time','overdraft_time','capacity_time','consume_amount_time'];
      $i = rand(1,4);
      foreach ($attribute as $key => $value) 
      {
          if(in_array($key, $needDealTimeArr))
          {
            $attribute[$key] = time()-rand(1,10)*$i;
          }
          $attribute['power_total'] = 1001;
          $attribute['consume_amount'] = 121;
      }
      return $attribute;
    }

    
}
