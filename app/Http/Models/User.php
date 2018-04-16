<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

    const SEX_UN = 10;//未知
    const SEX_BOY = 20;//男
    const SEX_GIRL = 30;//女



    protected $table = 'user';

    protected $fillable = ['name', 'password', 'sex', 'age', 'work'];

    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }

    public function get_sex($ind = null) {
        $arr = [
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女'
        ];
        if ($ind !== null){
            return array_key_exists($ind, $arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }

        return $arr;
    }

}
