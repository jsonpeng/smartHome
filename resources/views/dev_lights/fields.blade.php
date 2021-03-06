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

<!-- Agt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agt', '智慧中心ID Agt:') !!}
    @if(isset($devLight))
         {!! Form::text('agt', null, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('agt', getSettingValueByKey('agt'), ['class' => 'form-control']) !!}
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('support_rgb', '是否支持RGB显示:') !!}
    <?php $arr = ['0'=>'不支持','1'=>'支持'];?>
    {!! Form::select('support_rgb', $arr,null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('support_dyn', '是否支持DYN显示:') !!}
    <?php $arr = ['0'=>'不支持','1'=>'支持'];?>
    {!! Form::select('support_dyn', $arr,null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('support_rgbw', '是否支持RGBW显示:') !!}
    <?php $arr = ['0'=>'不支持','1'=>'支持'];?>
    {!! Form::select('support_rgbw', $arr,null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', '灯光类型:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', '区域:') !!}
    <select name="region_id" class="form-control">
        @foreach($Regions as $item)
            <option value="{!! $item->id !!}" @if(isset($devLight) && $devLight->region_id == $item->id) selected="selected" @endif>{!! $item->desc !!}</option>
        @endforeach
    </select>
</div>

<!-- Is On Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_on', '开关:') !!}
     <?php $arr = ['0'=>'关闭','1'=>'开启'];?>
    {!! Form::select('is_on', $arr,null, ['class' => 'form-control']) !!}
</div>

<!-- Rgbw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rgbw', '颜色值:') !!}
    {!! Form::text('rgbw', null, ['class' => 'form-control']) !!}
</div>

<!-- Dyn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dyn', '动态颜色值:') !!}
    {!! Form::text('dyn', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Temp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_temp', '色温:') !!}
    {!! Form::text('color_temp', null, ['class' => 'form-control']) !!}
</div>

<!-- Bri Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bri', '亮度:') !!}
    {!! Form::text('bri', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('devLights.index') !!}" class="btn btn-default">返回</a>
</div>
