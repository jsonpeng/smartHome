@extends('layouts.app')

@section('css')
<style type="text/css">
    .dp_upload img{
        max-width: 200px;
        height: auto;
    }
</style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            编辑文章
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <!--div class="box box-primary">
           <div class="box-body"-->
               <div class="row">
                   {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'patch']) !!}

                        @include('admin.posts.fields', ['categories' => $categories, 'selectedCategories' => $selectedCategories, 'post' => $post])

                   {!! Form::close() !!}
               </div>
           <!--/div>
       </div-->
       @include('admin.partial.imagemodel')
   </div>
@endsection

@include('admin.posts.js')
