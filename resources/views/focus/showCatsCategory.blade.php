
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/13--}}
 {{--* Time: 16:32--}}
 {{--*/--}}

<div class="row">
    @if(hasItems($cats))
        <h4>猫类目</h4>
        @foreach($cats as $cat)
            <div class="project-modal col-md-4 col-lg-3">
                <div class="thumbnail">
                    {{--编辑栏目--}}
                    @include('focus.editCatCategory')
                    <ul class="icon-bar">
                        <li>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editCatModal-{{$cat->id}}">
                                <i class="glyphicon glyphicon-cog"></i>
                            </button>
                        </li>
                        {{-- 删除项目--}}
                        <li>
                            {!! Form::open(['route'=>['focus.destroy',$cat->id],'method'=>'delete']) !!}
                            <button type="submit" class="btn">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                            {!! Form::close() !!}</li>
                    </ul>
                    <a href="{{ URL::route('focus.show',$cat->cateid) }}">
                        <img src="thumbnails/{{ $cat->thumbnail ? $cat->thumbnail : 'chart.jpg'  }}" alt="{{ $cat->name }}">
                    </a>
                    <div class="caption">
                        <a href="{{ URL::route('focus.show',$cat->cateid) }}">
                            <h4 class="text-center">{{ $cat->name }}</h4>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
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