
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2016/12/23--}}
 {{--* Time: 13:47--}}
 {{--*/--}}



<div class="project-modal col-md-4 col-lg-3">
    <div class="thumbnail">
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-default modal-trigger" data-toggle="modal" data-target="#myModal">
            <i class="glyphicon glyphicon-plus"></i>
        </button>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="myModalLabel">新建项目</h3>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'projects.store','method'=>'POST','files'=>'true']) !!}
             <div class="form-group">
                 {!! Form::label('name','项目名称：',['class'=>'control-label']) !!}
                 {!! Form::text('name',null,['class'=>'form-control']) !!}
             </div>
                <div class="form-group">
                    {!! Form::label('name','项目缩略图',['class'=>'control-label']) !!}
                    {!! Form::file('thumbnail',['class'=>'btn btn-default']) !!}
                </div>
                @include('errors.errors')
                <div class="modal-footer">
                    {!! Form::submit('新建项目',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>