<table class="table table-responsive" id="devSensors-table">
    <thead>
        <tr>
        <th>Me</th>
        <th>Model</th>
        <th>Name</th>
        <th>State</th>
        <th>Type</th>
        <th>Threshold</th>
        <th>Alarm Sound</th>
        <th>Region Id</th>
        <th>Agt</th>
        <th>Agt State</th>
        <th>Is Join</th>
        <th>Join At</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($devSensors as $devSensor)
        <tr>
            <td>{!! $devSensor->me !!}</td>
            <td>{!! $devSensor->model !!}</td>
            <td>{!! $devSensor->name !!}</td>
            <td>{!! $devSensor->state !!}</td>
            <td>{!! $devSensor->type !!}</td>
            <td>{!! $devSensor->threshold !!}</td>
            <td>{!! $devSensor->alarm_sound !!}</td>
            <td>{!! $devSensor->region_id !!}</td>
            <td>{!! $devSensor->agt !!}</td>
            <td>{!! $devSensor->agt_state !!}</td>
            <td>{!! $devSensor->is_join !!}</td>
            <td>{!! $devSensor->join_at !!}</td>
            <td>
                {!! Form::open(['route' => ['devSensors.destroy', $devSensor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                 <!--    <a href="{!! route('devSensors.show', [$devSensor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('devSensors.edit', [$devSensor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>