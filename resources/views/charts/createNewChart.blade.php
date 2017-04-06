{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/9--}}
 {{--* Time: 10:29--}}
 {{--*/--}}


<div class="google-charts col-md-6 col-lg-6">
    <div class="thumbnail">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-default modal-trigger" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
        </button>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="myModalLabel">新建图表</h3>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'google_charts.store','method'=>'POST','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('name','图表名称   ：',['class'=>'control-label']) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name','图表连接   ：',['class'=>'control-label']) !!}
                    {!! Form::text('google_src',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name','图表描述   ：',['class'=>'control-label']) !!}
                    {!! Form::text('describe',null,['class'=>'form-control']) !!}
                </div>
                    {!! Form::hidden('pet_column_id',$id) !!}
                @include('errors.errors')
                <div class="modal-footer">
                    {!! Form::submit('新建图表',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>