<?php

namespace App\Http\Controllers;

use App\Http\Models\Music;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Log;
use Validator;

class MusicController extends Model{

        public function getMusicView(){
            return view('music.index');
        }

        public function getMusicInfor() {
            $Music = Music::all();
//            $Music = Music::paginate(10);
            return responseToJson(0,'请求成功',$Music);
        }

//    public function uploads(Request $request) {
//
//        if ($request->isMethod('POST')){
//            $file = $request->file('source');
//
//            dd($file);
//
//            if ($file->isValid()){
//
//                //取原文件名
//                $originalName = $file->getClientOriginalName();
//                //扩展名
//                $ext = $file->getClientOriginalExtension();
//                //MimeType
//                $type = $file->getMimeType();
//                //临时绝对路径
//                $realPath = $file->getRealPath();
//
//                $file = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
//            }
//
//        }
//        return view('music.add');
//
//    }

        public function add(){

            return view('music.add');

        }

        //文件上传处理
        public function uploads(Request $request){
            //判断请求中是否包含name=file的上传文件

            //validator类验证

            $validator = Validator::make($request->input("Music"), [

                'name' => 'required|min:2|max:20',
                'author' => 'required',
                'type' =>'required',
                'language' => 'required',
                'content' => 'required',

            ],[

                'required' => ':attribute为必填项',
                'min' => '长度不符合',
                'max' => '长度不符合',

            ], [
                'name' => '歌曲名',
                'author' => '作者',
                'type' => '类型',
                'language' => '语言',
                'content' => '歌词',

            ]);

            if ($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if(!$request->hasFile('Music.file')){
                exit('上传图片为空！');
            }
            if(!$request->hasFile('Music.files')){
                exit('上传音频为空！');
            }
            $file = $request->file('Music.file');
            //判断文件上传过程中是否出错
            if(!$file->isValid()){
                exit('图片上传出错！');
            }
            $files = $request->file('Music.files');
            //判断文件上传过程中是否出错
            if(!$files->isValid()){
                exit('音频上传出错！');
            }
            if ($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $picturePath = realpath(storage_path('picture'));
            $musicPath = realpath(storage_path('music'));
            if(!file_exists($picturePath))
                mkdir($picturePath,0755,true);
            if(!file_exists($musicPath))
                mkdir($musicPath,0755,true);
            $filename = $file->getClientOriginalName();
            if(!$file->move($picturePath,$filename)){
                exit('保存图片失败！');
            }
            $filesname=$files->getClientOriginalName();
            if(!$files->move($musicPath,$filesname)){
                exit('保存音频失败！');
            }

            $input_music = $request->input('Music');
            $Music = [
                'name' => $input_music['name'],
                'author' => $input_music['author'],
                'type' => $input_music['type'],
                'language' => $input_music['language'],
                'content' => $input_music['content'],
                'PicturePath' => $picturePath.'\\'.$filename,
                'MusicPath' => $musicPath.'\\'.$filesname
            ];

            if(Music::create($Music)!=null){
                return redirect('/index')->with('success', '添加成功');
            }else{
                return redirect()->back()->with('error', '添加失败');
            }
        }

        public function deleteMusic(Request $request)
        {
            $id = $request->input('id');
            $music = Music::find($id);
            if ($music->delete()){
                return responseToJson(0,'请求成功');
            }else{
                return responseToJson(1,'请求失败');
            }
        }
}