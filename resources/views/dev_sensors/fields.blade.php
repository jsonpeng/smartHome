<!-- Me Field -->
<div class="form-group col-sm-6">
    {!! Form::label('me', '智慧设备唯一ID:') !!}
    {!! Form::text('me', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model', '型号:') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', '名称:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', '设备状态:') !!}
    <?php $arr = ['0'=>'离线','1'=>'上线'];?>
    {!! Form::select('state', $arr,null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', '传感器类型:') !!}
    {!! Form::select('type',Smart::$sensorType,null, ['class' => 'form-control']) !!}
</div>

<!-- Threshold Field -->
<div class="form-group col-sm-6">
    {!! Form::label('threshold', '告警门限:') !!}
    {!! Form::text('threshold', null, ['class' => 'form-control']) !!}
</div>

<!-- Alarm Sound Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alarm_sound', '告警音状态:') !!}
    {!! Form::select('alarm_sound',Smart::$alarm_sound,null, ['class' => 'form-control']) !!}
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', '区域:') !!}
    <select name="region_id" class="form-control">
        @foreach($Regions as $item)
            <option value="{!! $item->id !!}" @if(isset($devSensor) && $devSensor->region_id == $item->id) selected="selected" @endif>{!! $item->desc !!}</option>
        @endforeach
    </select>
</div>

<!-- Agt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agt', '智慧中心ID:') !!}
    @if(isset($devSensor))
         {!! Form::text('agt', null, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('agt', getSettingValueByKey('agt'), ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Agt State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agt_state', '智慧中心状态:') !!}
    <?php $arr = ['0'=>'离线','1'=>'上线'];?>
    {!! Form::select('agt_state', $arr,null, ['class' => 'form-control']) !!}
</div>

<!-- Is Join Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_join', '是否已接入:') !!}
    <?php $arr = ['0'=>'未接入','1'=>'已接入'];?>
    {!! Form::select('is_join', $arr,null, ['class' => 'form-control']) !!}
</div>

<!-- Join At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('join_at', '接入时间:') !!}
    {!! Form::text('join_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('devSensors.index') !!}" class="btn btn-default">返回</a>
</div>
