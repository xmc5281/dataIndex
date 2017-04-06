<?php
/**
 * Created by PhpStorm.
 * User: 76683
 * Date: 2017/1/9
 * Time: 18:41
 */

namespace App\Reply\Charts;
use App\Reply\ProjectsReply;
use App\Models\PetColumn;
class PetColumnReply
{
    protected $func;
    public function __construct(ProjectsReply $projectsReply)
    {
        $this->func=$projectsReply;
    }
    public function newPetColumn($request){
        $msg = $request->user()->petColumn()->create([
            'name' => $request->name,
            'is_public' => $request->is_public,
            'thumbnail' => $this->thumbnail($request)
        ]);
        return $msg;
    }
    public function thumbnail($request){
        return $this->func->thumbnail($request);
    }
    public function updateColumn($request,$id){
        $project =  PetColumn::findOrFail($id);
        $project->name = $request->name;
        if($request->hasFile('thumbnail'))
        {
            $project->thumbnail = $this->thumbnail($request);
        }
        $msg = $project->save();
    }
    public function showFocus(){

    }
}