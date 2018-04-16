@extends('common.layouts')

@section('content')

    @include('common.message')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">用户列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>密码</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>工作</th>
                    <th>添加时间</th>
                    <th>修改时间</th>
                    <th width="150">操作</th>
                </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->get_sex($user->sex)}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->work}}</td>
                    <td>{{date('Y-m-d',$user->created_at)}}</td>
                    <td>{{date('Y-m-d',$user->updated_at)}}</td>
                    <td>
                        <a href="{{ url('user/detail', [$user->id]) }}">详情</a>
                        <a href="{{ url('user/update', [$user->id]) }}">修改</a>
                        <a href="{{ url('user/delete', [$user->id]) }}"
                            onclick="if (confirm('你确定要删除吗?') == false) return false;">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!--   分页   -->
    <div>
        <div class="pull-right">
            {{ $users->render() }}
        </div>
    </div>

@stop