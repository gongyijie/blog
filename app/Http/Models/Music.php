<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model{

    protected $table = 'music';
    public $timestamps=false;

    protected $fillable = ['name', 'author', 'type', 'language', 'content', 'MusicPath', 'PicturePath'];

    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }
}