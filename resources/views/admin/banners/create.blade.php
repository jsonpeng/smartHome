@extends('layouts.app')

@section('content')
    <div class="input-append" style="text-align: center;">
        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" >查看设计图片</a>
        <img src="" style="width: 100%; height: auto; display: block;">
    </div>
    @include('admin.partial.imagemodel')
@endsection

@section('scripts')

@endsection
