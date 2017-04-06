{{----}}
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2016/12/26--}}
 {{--* Time: 18:21--}}
 {{--*/--}}

@if($errors->has('name'))
    <div class="form-group">
        <ul class="alert alert-danger">
            @foreach($errors->get('name') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['route'=>['tasks.store','project'=>$project->id],'class'=>'form-inline'])!!}
<td class="first-cell">
{!! Form::text('name',null,['placeholder'=>'有啥子要填的？','class'=>'form-control']) !!}
</td>
    {{ Form::hidden('project_id',$project->id) }}
<td class="icon-cell">
    <button type="submit" class="btn btn-success">
        <i class="glyphicon glyphicon-plus"></i>
    </button>
</td>
{!! Form::close() !!}