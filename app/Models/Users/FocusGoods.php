<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class FocusGoods extends Model
{
    //
    protected $fillable = [
        'gid','user_id'
    ];
    public function goods(){
        //定义和goods统计表的关系  一个gid有多个统计行
        return $this->hasMany('App\Models\Epet\Goods');
    }
}
