
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/2/3--}}
 {{--* Time: 15:40--}}
 {{--*/--}}
<div class="modal fade" id="editBrandModal-{{ $dog->id }}" tabindex="-1" role="dialog" aria-labelledby="editBrandModalLabel-{{ $dog->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="editBrandModalLabel-{{ $dog->brandid }}">品牌LOGO</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($dog,['route'=>['focusBrand.update',$dog->brandid],'method'=>'PATCH','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('name','品牌名称：',['class'=>'control-label']) !!}
                    {!! Form::label('name',$dog->name,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name','品牌LOGO',['class'=>'control-label']) !!}
                    {!! Form::file('thumbnail',['class'=>'btn btn-default']) !!}
                </div>
                {!! Form::hidden('brandid',$dog->brandid) !!}
                @include('errors.errors')
                <div class="modal-footer">
                    {!! Form::submit('修改品牌LOGO',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>