<?php
/**
 * Created by PhpStorm.
 * User: 76683
 * Date: 2016/12/23
 * Time: 15:33
 */

namespace App\Reply;
use App\Project;
use Image;

class ProjectsReply
{
    public function newProject($request){
        $msg = $request->user()->projects()->create([
            'name'=>$request->name,
            'thumbnail'=>$this->thumbnail($request)
        ]);
        return $msg;
    }
    public function thumbnail($request){
        if($request->hasFile('thumbnail')){
            $file = $request->thumbnail;
            $name = str_random(20).'.jpg';
            $path = public_path().'/thumbnails/'.$name;
            $meg = Image::make($file)->resize(261,98)->encode('jpg')->save($path);
            return $name;
        }
    }
    public function updateProject($request,$id){
        $project =  Project::findOrFail($id);
        $project->name = $request->name;
        if($request->hasFile('thumbnail'))
        {
            $project->thumbnail = $this->thumbnail($request);
        }
        $msg = $project->save();
    }
}