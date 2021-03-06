@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            编辑客户
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'patch']) !!}

                        @include('admin.clients.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
     @include('admin.partial.imagemodel')
@endsection