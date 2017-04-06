
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2016/12/27--}}
 {{--* Time: 15:40--}}
 {{--*/--}}
{!! Form::open(['route'=>['tasks.destroy',$task->id],'method'=>'DELETE']) !!}
    <button type="submit" class="btn btn-danger btn-sm">
       <i class="glyphicon glyphicon-remove"></i>
    </button>
{!! Form::close() !!}