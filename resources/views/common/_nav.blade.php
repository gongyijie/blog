<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>音乐后台@yield('title')</title>
    <!-- Bootstrap CSS 文件 -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    @section('style')

    @show
</head>
<body>

<!-- 头部 -->
@section('header')
    <div class="jumbotron">
        <div class="container">
            <h2>用户</h2>

            <p> - 添加音乐信息</p>
        </div>
    </div>
@show

<!-- 中间内容区局 -->
<div class="container">
    <div class="row">
        <!-- 左侧菜单区域   -->
        <div class="col-md-3">
            @section('leftmenu')
                <div class="list-group">
                    <a href="{{url('/index/add')}}" class="list-group-item
                        {{ Request::getPathInfo()!='/user/create'?'active':'' }}">添加音乐</a>
                </div>
            @show
        </div>

        <!-- 右侧内容区域 -->
        <div class="col-md-9">


            @yield('content')


        </div>
    </div>
</div>

<!-- 尾部 -->
@section('footer')
    <div class="jumbotron" style="margin:0;">
        <div class="container">
            <span>  @2018 gongyijie</span>
        </div>
    </div>
@show

<!-- jQuery 文件 -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap JavaScript 文件 -->
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

@section('javascript')
@show
</body>
</html>