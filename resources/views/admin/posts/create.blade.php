@extends('layouts.app')

@section('css')
<style type="text/css">
    .dp_upload img{
        max-width: 100px;
        height: auto;
    }
</style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            创建文章
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <!--div class="box box-primary">

            <div class="box-body"-->
                <div class="row">
                    {!! Form::open(['route' => 'posts.store']) !!}

                        @include('admin.posts.fields', ['categories' => $categories, 'selectedCategories' => [], 'post' => null,'attach'=>''])

                    {!! Form::close() !!}
                </div>
            <!--/div>
        </div-->
        @include('admin.partial.imagemodel')
    </div>
@endsection

@include('admin.posts.js')

