{{----}}
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/9--}}
 {{--* Time: 15:48--}}
 {{--*/--}}
<div class="modal fade" id="editModal-{{ $chart->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{ $chart->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="editModalLabel-{{ $chart->id }}">编辑图表信息</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($chart,['route'=>['google_charts.update',$chart->id],'method'=>'PATCH','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('name','图表名称：',['class'=>'control-label']) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name','图表描述：',['class'=>'control-label']) !!}
                    {!! Form::text('describe',null,['class'=>'form-control','placeholder'=>'此视图暂时无法被描述']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name','图表链接：',['class'=>'control-label']) !!}
                    {!! Form::text('google_src',null,['class'=>'form-control']) !!}
                </div>
                @include('errors.errors')
                <div class="modal-footer">
                    {!! Form::submit('编辑图表',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>