@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
          添加
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'heZuos.store']) !!}

                        @include('he_zuos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
     @include('admin.partial.imagemodel')
@endsection
