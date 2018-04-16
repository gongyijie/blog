<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <title>后台</title>
</head>
<body>

    <div id="app"></div>
</body>
<script src="{{ url('js/manifest.js') }}"></script>
<script src="{{ url('js/vendor.js') }}"></script>
<script src="{{ url('js/app.js') }}"></script>

<!-- jQuery 文件 -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap JavaScript 文件 -->
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</html>