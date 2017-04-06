<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class DataCategory extends Model
{
    //
    protected $table = 'dataCategory';
    protected $fillable = [
        'cateid','date_key','sales','buyer_num','avg_order_price','avg_buyer_price'
    ];
}
