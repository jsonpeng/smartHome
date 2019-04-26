@extends('layouts.app')


@section('content')
<section class="content pdall0-xs pt10-xs">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li>
                <a href="javascript:;">
                    <span style="font-weight: bold;">通用设置</span>
                </a>
            </li>
            <li class="active">
                <a href="#tab_1" data-toggle="tab">网站设置</a>
            </li>
            
        {{--     <li>
                <a href="#tab_2" data-toggle="tab">小屋设置</a>
            </li> --}}

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="box box-info form">
                    <!-- form start -->
                    <div class="box-body">
                        <form class="form-horizontal" id="form1">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">网站名称</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" maxlength="60" placeholder="网站名称" value="{{ getSettingValueByKey('name') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="logo" class="col-sm-3 control-label">网站LOGO</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="image1" name="logo" placeholder="网站LOGO" value="{{ getSettingValueByKey('logo') }}">
                                    <div class="input-append">
                                        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image1')">选择图片</a>
                                        <img src="@if(getSettingValueByKey('logo')) {{ getSettingValueByKey('logo') }} @endif" style="max-width: 100%; max-height: 150px; display: block;"></div>
                                    <p class="help-block">默认网站首页LOGO,通用头部显示，最佳显示尺寸为240*60像素</p>
                                </div>
                            </div>
              
                            <div class="form-group">
                                <label for="seo_des" class="col-sm-3 control-label">网站描述</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="seo_des" maxlength="60" placeholder="网站描述" value="{{ getSettingValueByKey('seo_des') }}"></div>
                            </div>
                            <div class="form-group">
                                <label for="seo_keywords" class="col-sm-3 control-label">网站关键字</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="seo_keywords" maxlength="60" placeholder="网站关键字" value="{{ getSettingValueByKey('seo_keywords') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="company_name" class="col-sm-3 control-label">公司名称</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="company_name" maxlength="60" placeholder="公司名称" value="{{ getSettingValueByKey('company_name') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">地址</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" maxlength="60" placeholder="地址" value="{{ getSettingValueByKey('address') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="tel" class="col-sm-3 control-label">电话</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tel" maxlength="60" placeholder="电话" value="{{ getSettingValueByKey('tel') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">邮箱</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" maxlength="60" placeholder="邮箱" value="{{ getSettingValueByKey('email') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="logo" class="col-sm-3 control-label">微信扫一扫二维码</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="image2" name="weixin_erweima" placeholder="微信扫一扫二维码" value="{{ getSettingValueByKey('weixin_erweima') }}">
                                    <div class="input-append">
                                        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image2')">选择图片</a>
                                        <img src="@if(getSettingValueByKey('weixin_erweima')) {{ getSettingValueByKey('weixin_erweima') }} @endif" style="max-width: 100%; max-height: 150px; display: block;">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="footer_about_des" class="col-sm-3 control-label">底部关于我们描述</label>
                                <div class="col-sm-9">
                                    <textarea name="footer_about_des" rows="3" class="form-control">{{ getSettingValueByKey('footer_about_des') }}</textarea>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left" onclick="saveForm(1)">保存</button>
                    </div>
                    <!-- /.box-footer --> </div>
            </div>

            <!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2">
                <div class="box box-info form">
                    <!-- form start -->
                    <div class="box-body">
                        <form class="form-horizontal" id="form2">
                   

                            <div class="form-inline">
                                <label for="feie_sn" class="col-sm-3 control-label">距离结束时间</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" name="house_end_time" placeholder="不填默认是1天" value="{{ getSettingValueByKey('house_end_time') }}">天</div>
                            </div>

            
                        </form>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left" onclick="saveForm(2)">保存</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.tab-content --> </div>
</section>
@endsection

@include('admin.partial.imagemodel')

@section('scripts')
<script>
        function saveForm(index){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/zcjy/settings/setting",
                type:"POST",
                data:$("#form"+index).serialize(),
                success: function(data) {
                  if (data.code == 0) {
                    layer.msg(data.message, {icon: 1});
                  }else{
                    layer.msg(data.message, {icon: 5});
                  }
                },
                error: function(data) {
                  //提示失败消息

                },
            });  
        }

       function openMap(type=''){
            var name =type==''?'detail':'address';
            var address=$('input[name='+name+']').val();
            var url="/zcjy/settings/map?address="+address;
                if($(window).width()<479){
                        layer.open({
                            type: 2,
                            title:'请选择详细地址',
                            shadeClose: true,
                            shade: 0.8,
                            area: ['100%', '100%'],
                            content: url, 
                        });
                }else{
                     layer.open({
                        type: 2,
                        title:'请选择详细地址',
                        shadeClose: true,
                        shade: 0.8,
                        area:['60%', '680px'],
                        content: url, 
                    });
                }
        }

        function call_back_by_map(address,jindu,weidu){
            $('input[name=detail],input[name=address]').val(address);
            $('input[name=lat]').val(weidu);
            $('input[name=lon]').val(jindu);
            layer.closeAll();
        }

        $('#kecheng_list').keypress(function(e) { 
           var rows=parseInt($(this).attr('rows'));
            // 回车键事件  
           if(e.which == 13) {  
                rows +=1;
           }  
           $(this).attr('rows',rows);
      });
    </script>
@endsection