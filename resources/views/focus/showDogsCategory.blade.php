
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/13--}}
 {{--* Time: 16:32--}}
 {{--*/--}}


<div class="row">
    @if($dogs)
        <h4>狗类目</h4>
        @foreach($dogs as $dog)
            <div class="project-modal col-md-4 col-lg-3">
                <div class="thumbnail">
                    {{--编辑栏目--}}
                    @include('focus.editDogCategory')
                    <ul class="icon-bar">
                        <li>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editDogModal-{{$dog->id}}">
                                <i class="glyphicon glyphicon-cog"></i>
                            </button>
                        </li>
                        {{-- 删除项目--}}
                        <li>
                            {!! Form::open(['route'=>['focus.destroy',$dog->id],'method'=>'delete']) !!}
                            <button type="submit" class="btn">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                            {!! Form::close() !!}</li>
                    </ul>
                    <a href="{{ URL::route('focus.show',$dog->cateid) }}">
                        <img src="thumbnails/{{ $dog->thumbnail ? $dog->thumbnail : 'chart.jpg'  }}" alt="{{ $dog->name }}">
                    </a>
                    <div class="caption">
                        <a href="{{ URL::route('focus.show',$dog->cateid) }}">
                            <h4 class="text-center">{{ $dog->name }}</h4>
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