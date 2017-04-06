<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Task extends Model
{
    //
    public function project(){
        return $this->belongsTo('App\Project');
    }
    protected $fillable = [
        'title','project_id','completed'
    ];
    public function getProjectListAttribute(){
        return $this->project->id;
    }
}
