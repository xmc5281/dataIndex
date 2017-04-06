{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2016/12/26--}}
 {{--* Time: 13:36--}}
 {{--*/--}}
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="editModal-{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{ $project->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="editModalLabel-{{ $project->id }}">编辑栏目</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($project,['route'=>['projects.update',$project->id],'method'=>'PATCH','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('name','栏目名称：',['class'=>'control-label']) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name','栏目缩略图',['class'=>'control-label']) !!}
                    {!! Form::file('thumbnail',['class'=>'btn btn-default']) !!}
                </div>
                @include('errors.errors')
                <div class="modal-footer">
                    {!! Form::submit('编辑栏目',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>