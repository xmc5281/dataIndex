
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/12--}}
 {{--* Time: 15:57--}}
 {{--*/--}}

<div class="project-modal col-md-4 col-lg-3">
    <div class="thumbnail">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-default modal-trigger" data-toggle="modal" data-target="#myModal-focus">
            添加关注
        </button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal-focus" tabindex="-1" role="dialog" aria-labelledby="myModal-focusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="myModal-focusLabel">添加关注栏目</h3>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'focus.store','method'=>'POST','files'=>'true']) !!}
                @if($category)
                    <ul class="list-group">
                        <li class="list-group-item"><span>狗</span></li>
                        @if(count($category[0])==0)
                            <div class="form-group">你已经关注了狗的全部类目</div>
                        @endif
                        @foreach($category[0] as $cate)
                            <li class="list-group-item">
                                <div class="form-group">
                                    {!! Form::input('checkbox','dog[]',$cate->cateid,['class'=>'checkbox-inline','id'=>'box'.$cate->cateid]) !!}
                                    {!! Form::label('box'.$cate->cateid,$cate->name,['class'=>'form-control-static']) !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item"><span>猫</span></li>
                        @if(count($category[1])==0)
                            <div class="form-group">你已经关注了猫的全部类目</div>
                        @endif
                        @foreach($category[1] as $cate)
                            <li class="list-group-item">
                                <div class="form-group">
                                    {!! Form::input('checkbox','cat[]',$cate->cateid,['class'=>'checkbox-inline','id'=>'box'.$cate->cateid]) !!}
                                    {!! Form::label('box'.$cate->cateid,$cate->name,['class'=>'form-control-static']) !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @include('errors.errors')
                <div class="modal-footer">
                    {!! Form::submit('添加关注',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>