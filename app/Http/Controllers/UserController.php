<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use Validator;

//用户列表页
class UserController extends Controller {

    public function getUserInfor() {

        $users = User::paginate(6);

        return view('user.user', [
            'users' => $users,
        ]);

    }

    public function create() {

        $user = new User();

        return view('user.create', [
            'user' => $user,
        ]);

    }

    public  function save(Request $request) {
        //validator类验证
        $validator = Validator::make($request->input("User"), [

                'name' => 'required|min:2|max:20',
                'password' => 'required|min:6',
                'age' =>'required|integer',
                'work' => 'required',
                'sex' => 'required'

            ],[

                'required' => ':attribute为必填项',
                'min' => '长度不符合',
                'max' => '长度不符合',
                'integer' => ':attribute 必须为数字',

            ], [
                'name' => '姓名',
                'password' => '密码',
                'age' => '年龄',
                'work' => '工作',
                'sex' => '性别',

            ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(User::create($request->input('User'))!=null){
            return redirect('/user')->with('success', '添加成功');
        }else{
            return redirect()->back()->with('error', '添加失败');
        }

    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->input("User"),[
                'name' => 'required|min:2|max:20',
                'password' => 'required|min:6',
                'age' =>'required|integer',
                'work' => 'required',
                'sex' => 'required'

            ],[
                'required' => ':attribute为必填项',
                'min' => '长度不符合',
                'max' => '长度不符合',
                'integer' => ':attribute 必须为数字',

            ], [
                'name' => '姓名',
                'password' => '密码',
                'age' => '年龄',
                'work' => '工作',
                'sex' => '性别',
            ]);
            if ($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $request->input('User');
            if (User::where('id',$id)->update($data)) {
                return redirect('/user')->with('success', '修改成功-' . $id);
            }
        }
        return view('user.update', [
            'user' => $user
        ]);

    }

    public function detail($id) {

        $user = User::find($id);

        return view('user/detail', [
            'user' => $user
        ]);

    }

    public function delete(Request $request, $id){

        $user = User::find($id);

        if ($user->delete()){

            return redirect('/user')->with('success', '删除成功');

        }else{

            return redirect('/user')->with('error', '删除失败');

        }

    }


}