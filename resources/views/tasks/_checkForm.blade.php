
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2016/12/27--}}
 {{--* Time: 10:44--}}
 {{--*/--}}
{!! Form::open(['route'=>['tasks.check',$task->id],'method'=>'POST']) !!}
<button type="submit" class="btn btn-success btn-sm">
       <li class="glyphicon glyphicon-ok"></li>
</button>
{!! Form::close() !!}