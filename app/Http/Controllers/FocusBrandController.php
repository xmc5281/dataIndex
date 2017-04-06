<?php

namespace App\Http\Controllers;

use App\Models\Users\FocusBrand;
use Illuminate\Http\Request;
use Redirect;
use App\Reply\Focus\FocusBrandReply;
class FocusBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        FocusBrandReply::addFocusBrands($request);
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $month =  FocusBrandReply::ThisMonthVSLastMonth($id);
       $showMonth = FocusBrandReply::showMonth($id);
       $showQuarter = FocusBrandReply::showQuarter($id);
       $showBigSales = FocusBrandReply::showBigSales($id);
       return view('focus.showBrandChart',compact('month','showMonth','showQuarter','showBigSales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        FocusBrandReply::updateFocus($request);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        FocusBrand::where('id',$id)
            ->update(['is_show' => 0]);
        return Redirect::back();
    }
}
