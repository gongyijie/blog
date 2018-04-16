@extends('common._nav')
@section('content')
    @include('common.validator')
    <div class="panel panel-default">
        <div class="panel-heading">新增歌曲</div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="{{ url('index/uploads') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">歌曲名</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="请输入歌曲名" name="Music[name]" id="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="author" class="col-sm-2 control-label">作者</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="请输入作者" name="Music[author]" id="author">
                    </div>
                </div>
                <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">类型</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="请输入类型" name="Music[type]" id="type">
                    </div>
                </div>
                <div class="form-group">
                    <label for="language" class="col-sm-2 control-label">语言</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="请输入语言" name="Music[language]" id="language">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">歌词</label>
                    <div class="col-sm-5">
                        <textarea type="text" class="form-control" placeholder="请输入歌词" name="Music[content]" id="content"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="file" class="col-sm-2 control-label">请选择图片</label>
                    <div class="col-md-6">
                        <input type="file" id="file" name="Music[file]">
                    </div>
                </div>
                <div class="form-group">
                    <label for="file" class="col-sm-2 control-label">请选择音频文件</label>
                    <div class="col-md-6">
                        <input type="file" id="files" name="Music[files]">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            确认上传
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop