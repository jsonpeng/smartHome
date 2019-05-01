<!-- Me Field -->
<div class="form-group col-sm-6">
    {!! Form::label('me', 'Me:') !!}
    {!! Form::text('me', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model', 'Model:') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Threshold Field -->
<div class="form-group col-sm-6">
    {!! Form::label('threshold', 'Threshold:') !!}
    {!! Form::text('threshold', null, ['class' => 'form-control']) !!}
</div>

<!-- Alarm Sound Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alarm_sound', 'Alarm Sound:') !!}
    {!! Form::text('alarm_sound', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', 'Region Id:') !!}
    {!! Form::text('region_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Agt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agt', 'Agt:') !!}
    {!! Form::text('agt', null, ['class' => 'form-control']) !!}
</div>

<!-- Agt State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agt_state', 'Agt State:') !!}
    {!! Form::text('agt_state', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Join Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_join', 'Is Join:') !!}
    {!! Form::text('is_join', null, ['class' => 'form-control']) !!}
</div>

<!-- Join At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('join_at', 'Join At:') !!}
    {!! Form::text('join_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('devSensors.index') !!}" class="btn btn-default">Cancel</a>
</div>
