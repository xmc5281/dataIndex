
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2016/12/23--}}
 {{--* Time: 16:03--}}
 {{--*/--}}
{{--展示已有项目--}}
<div class="row">
    @if($projects)
        @foreach($projects as $project)
            <div class="project-modal col-md-4 col-lg-3">
                <div class="thumbnail">
                    @include('projects.editProject')
                    <ul class="icon-bar">
                        <li>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editModal-{{$project->id}}">
                                <i class="glyphicon glyphicon-cog"></i>
                            </button>
                        </li>
                        {{-- 删除项目--}}
                        <li>
                            {!! Form::open(['route'=>['projects.destroy',$project->id],'method'=>'delete']) !!}
                            <button type="submit" class="btn">
                            <i class="glyphicon glyphicon-remove"></i>
                            </button>
                            {!! Form::close() !!}</li>
                    </ul>
                    <a href="{{ URL::route('projects.show',$project->id) }}">
                    <img src="thumbnails/{{ $project->thumbnail }}" alt="{{ $project->name }}">
                    </a>
                    <div class="caption">
                        <a href="{{ URL::route('projects.show',$project->id) }}">
                        <h4 class="text-center">{{ $project->name }}</h4>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
        @include('projects.createProject')
</div>

@section('customJS')
<script>
    $(function () {
       $('.icon-bar').hide();
       $('.thumbnail').hover(function () {
          $(this).find('.icon-bar').toggle();
       });
    });
</script>
    @endsection