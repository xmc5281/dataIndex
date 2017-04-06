<?php

namespace App\Http\Controllers;
use App\Http\Requests\EditProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\CreatProjectsRequest;
use Redirect;
use App\Reply\ProjectsReply;
use Auth;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repo;
    public function __construct(ProjectsReply $projectsReply)
    {
        $this->repo = $projectsReply;
    }

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

    public function store(CreatProjectsRequest $request)
    {
        //
          $msg = $this->repo->newProject($request);
          return redirect('/home');
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
            $project = Auth::user()->projects()->where('id',$id)->first();
            $toDo = Auth::user()->tasks()->where([['project_id',$id],['completed',0]])->paginate(15);
            $Done = Auth::user()->tasks()->where([['project_id',$id],['completed',1]])->paginate(15);
            $Later = Auth::user()->tasks()->where([['project_id',$id],['completed',2]])->paginate(15);
            //列出该用户所有项目 5.2 lists()
            // 5.3 pluk();
            $projects =Auth::user()->projects()->pluck('name','id');
        // $tasks = Project::findOrFail($id)->tasks();
        return view('tasks.showTask',compact('project','toDo','Done','Later','projects'));
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
    public function update(EditProjectRequest $request, $id)
    {
        //
        $this->repo->updateProject($request,$id);
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
        Project::find($id)->delete();
        return Redirect::back();
    }
}
