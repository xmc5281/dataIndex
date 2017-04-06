
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2016/12/27--}}
 {{--* Time: 13:58--}}
 {{--*/--}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $task->id }}">
    <i class="fa fa-btn fa-cog"></i>
</button>
<div class="modal fade" id="editModal-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{ $task->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="editModalLabel-{{ $task->id }}">编辑任务</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($task,['route'=>['tasks.update',$task->id],'method'=>'PATCH','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('name','任务名称：',['class'=>'control-label']) !!}
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('projectList','移动到项目：',['class'=>'control-label']) !!}
                    {!! Form::select('projectList',$projects,null,['class'=>'from-control']) !!}
                </div>

                @if($errors->has('title'))
                    <div class="form-group">
                        <ul class="alert alert-danger">
                            @foreach($errors->get('title') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-footer">
                    {!! Form::submit('编辑任务',['class'=>'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>