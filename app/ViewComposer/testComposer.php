<?php
/**
 * Created by PhpStorm.
 * User: 76683
 * Date: 2017/1/19
 * Time: 14:19
 */

namespace app\ViewComposer;

use  View;
class testComposer
{
    function __construct()
    {
    }
    public function compose(View $view){
        $view->with([

        ]);
    }
}