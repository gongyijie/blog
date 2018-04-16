@extends('common.layouts')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">用户详情</div>

        <table class="table table-bordered table-striped table-hover ">
            <tbody>
            <tr>
                <td width="50%">ID</td>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <td>姓名</td>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <td>密码</td>
                <td>{{$user->password}}</td>
            </tr>
            <tr>
                <td>性别</td>
                <td>{{$user->get_sex($user->sex)}}</td>
            </tr>
            <tr>
                <td>年龄</td>
                <td>{{$user->age}}</td>
            </tr>
            <tr>
                <td>工作</td>
                <td>{{$user->work}}</td>
            </tr>
            <tr>
                <td>添加日期</td>
                <td>{{date('Y-m-d',$user->created_at)}}</td>
            </tr>
            <tr>
                <td>最后修改</td>
                <td>{{date('Y-m-d',$user->updated_at)}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
@stop

