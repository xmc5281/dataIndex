<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data\DataCategoryDay;
class TestController extends Controller
{
    //
    public function test(){
        return DataCategoryDay::first();
    }
}
