
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/12--}}
 {{--* Time: 14:04--}}
 {{--*/--}}
<div class="page-header">
    <h4>您现在所在位置->
        <small><a href="{{ route('column.index') }}">图表区</a></small>
        <small>-></small>
        @if(empty(!$position))
        <small><a href="">{{ $position[0] }}</a></small>
        @endif
        <strone><a href="{{ url('/') }}">返回首页</a></strone>
    </h4>
</div>