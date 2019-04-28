@extends('layouts.app')

@section('content')
    <div class="input-append" style="display: none;">
        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" >选择图片</a>
        <img src="" style="max-width: 100%; max-height: 150px; display: block;">
    </div>
    @include('admin.partial.imagemodel')
@endsection

@section('scripts')
<script type="text/javascript">
    $("body").click(function(){
        $(this).find("a").click();
    })
    $("body").click();
</script>
@endsection
