<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Epet\Dim\DimBrand;
class FocusBrand extends Model
{
    //
    protected $fillable = [
        'brandid','user_id'
    ];
    public function brand(){
        // 定义和品牌统计表的关系，一个品牌多个统计行
        return $this->hasMany('App\Models\Epet\Brand');
    }
}
