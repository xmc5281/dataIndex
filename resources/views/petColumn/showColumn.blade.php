
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/9--}}
 {{--* Time: 15:47--}}
 {{--*/--}}
{{--注：：本模板和showProject模板一样，控制器里将查询的结果用$projects 接收--}}
<div class="row">
    @if($projects)
        @foreach($projects as $project)
            <div class="project-modal col-md-4 col-lg-3">
                <div class="thumbnail">
                    {{--编辑栏目--}}
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
                            {!! Form::open(['route'=>['column.destroy',$project->id],'method'=>'delete']) !!}
                            <button type="submit" class="btn">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                            {!! Form::close() !!}</li>
                    </ul>
                    <a href="{{ URL::route('column.show',$project->id) }}">
                        <img src="thumbnails/{{ $project->thumbnail ? $project->thumbnail : 'chart.jpg'  }}" alt="{{ $project->name }}">
                    </a>
                    <div class="caption">
                        <a href="{{ URL::route('column.show',$project->id) }}">
                            <h4 class="text-center">{{ $project->name }}</h4>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    @include('petColumn.createColumn')
        {{--添加关注类目--}}
    @include('focus.addFocus')
        {{--添加关注品牌--}}
    @include('focus.addFocusBrand')
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