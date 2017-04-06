
{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: 76683--}}
{{--* Date: 2017/1/13--}}
{{--* Time: 16:52--}}
{{--*/--}}



<div class="modal fade" id="editDogModal-{{ $dog->id }}" tabindex="-1" role="dialog" aria-labelledby="editDogModalLabel-{{ $dog->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="editDogModalLabel-{{ $dog->id }}">修改展示图</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($dog,['route'=>['focus.update',$dog->id],'method'=>'PATCH','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('name','栏目名称：',['class'=>'control-label']) !!}
                    {!! Form::label('name',$dog->name,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name','类目展示图',['class'=>'control-label']) !!}
                    {!! Form::file('thumbnail',['class'=>'btn btn-default']) !!}
                </div>
                {!! Form::hidden('cateid',$dog->cateid) !!}
                @include('errors.errors')
                <div class="modal-footer">
                    {!! Form::submit('修改展示图',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>