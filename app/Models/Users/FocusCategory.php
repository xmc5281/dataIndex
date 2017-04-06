<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class FocusCategory extends Model
{
    //
    protected  $fillable = [
        'cateid','user_id','is_show'
    ];
    public function category(){
        //定义和类目统计表的关系，一个类目多个统计行
        return $this->hasMany('App\Models\Epet\Category');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
