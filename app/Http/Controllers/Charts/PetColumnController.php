<?php

namespace App\Http\Controllers\Charts;


use  Redirect;
use App\Models\PetColumn;
use App\Http\Controllers\Controller;
use App\Reply\Charts\PetColumnReply;
use App\Http\Requests\Charts\CreatePetColumnRequest;
use  Auth;
use App\Reply\Focus\FocusReply;
use App\Reply\Focus\FocusBrandReply;
class PetColumnController extends Controller
{
    protected $func;
    protected $res;
    public function __construct(PetColumnReply $petColumnReply)
    {
        $this->func = $petColumnReply;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示用户所有栏目 使用变量$projects  模板变量
        $projects =  Auth::user()->petColumn()->get();
        //添加关注
        $category = FocusReply::ShowCategoryModal();
        $brands = FocusBrandReply::showBrandsModal();
        //显示所有关注过的类目
        $dogs = FocusReply::showPetsCategory('dog');
        $cats = FocusReply::showPetsCategory('cat');
        //显示所有关注过的品牌
        $focusBrands = FocusBrandReply::showFocusBrands();
        return view('petColumn.Column',compact('projects','category','dogs','cats','brands','focusBrands'));
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
    public function store(CreatePetColumnRequest $request)
    {
        //
        $msg =  $this->func->newPetColumn($request);
        return redirect('/column');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //显示所有chart
        $charts =Auth::user()->googleCharts()->where([['pet_column_id',$id],['is_show',1]])->get();
        $position =Auth::user()->petColumn()->where([['id',$id],['is_public',0]])->pluck('name')->toArray();
        return view('charts.charts',compact('charts','id','position','category'));
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
         $this->func->updateColumn($request,$id);
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
        PetColumn::find($id)->delete();
        return Redirect::back();
    }
}
