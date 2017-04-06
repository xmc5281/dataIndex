<?php

namespace App\Http\Controllers;

use App\Models\Users\FocusCategory;
use Illuminate\Http\Request;
use Redirect;
use App\Reply\Focus\FocusReply;
use Auth;
class FocusController extends Controller
{
    protected $repo;
    public function __construct( )
    {

    }
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
//       $msg = $request->user()->focusCategory();
//        dd($msg);
        FocusReply::addFocusCategory($request);

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cateid)
    {
        //
        $lastYear = FocusReply::showLastyear($cateid);
        $thisMonth = FocusReply::showThisMonth($cateid);
        $month = FocusReply::showMonth($cateid);
        $quarter =FocusReply::showQuarter($cateid);
        $year = FocusReply::showYear($cateid);
        $charts = FocusReply::showYesterday($cateid);
        $yesterday = $charts[0];
        $position =Auth::user()
            ->focusCategory()
            ->join('jz_category','jz_category.cateid','=','focus_categories.cateid')
            ->where([['jz_category.cateid',$cateid]])
            ->pluck('jz_category.name')->toArray();
        $children = $charts[1];
        return view('focus.showChildrenCategory',compact('yesterday','thisMonth','month','year','quarter','position','children','lastYear'));
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
    public function update(Request $request)
    {
        //
        FocusReply::updateFocus($request);
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
        FocusCategory::where('id',$id)
            ->update(['is_show' => 0]);
        return Redirect::back();
    }
}
