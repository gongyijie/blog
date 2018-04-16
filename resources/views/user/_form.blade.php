<form class="form-horizontal" method="post" action="{{ isset($user->id) ? url('user/update', [$user->id]) : url('user/save')}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>

        <div class="col-sm-5">
            <input type="text" name="User[name]" class="form-control" id="name"
                   value="{{old('User')['name']?old('User')['name']:$user->name}}"
                   placeholder="请输入用户姓名">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('User.name')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">密码</label>

        <div class="col-sm-5">
            <input type="text" name="User[password]" class="form-control" id="password"
                   value="{{old('User')['password']?old('User')['password']:$user->password}}"
                   placeholder="请输入用户密码">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('User.password')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">年龄</label>
        <div class="col-sm-5">
            <input type="text" name='User[age]' class="form-control" id="age"
                   value="{{old('User')['age']?old('User')['age']:$user->age}}"
                   placeholder="请输入年龄">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('User.age')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="work" class="col-sm-2 control-label">工作</label>
        <div class="col-sm-5">
            <input type="text" name='User[work]' class="form-control" id="work"
                   value="{{old('User')['work']?old('User')['work']:$user->work}}"
                   placeholder="请输入工作">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('User.work')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">性别</label>
        <div class="col-sm-5">
            @foreach($user->get_sex() as $ind=>$val)
                <label class="radio-inline">
                    <input type="radio" name='User[sex]'
                       {{isset($user->sex) && $user->sex==$ind ? ' checked=checked':''}} value="{{$ind}}"> {{$val}}
                </label>
            @endforeach
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('User.sex')}}</p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>