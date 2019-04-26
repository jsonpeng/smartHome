@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            编辑
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($heZuo, ['route' => ['heZuos.update', $heZuo->id], 'method' => 'patch']) !!}

                        @include('he_zuos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
    @include('admin.partial.imagemodel')
@endsection