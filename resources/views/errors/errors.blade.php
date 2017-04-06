
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2016/12/23--}}
 {{--* Time: 15:52--}}
 {{--*/--}}
{{--新建项目错误提示--}}
{{--如果存在任何错误，获得所有错误并显示出来--}}
    @if($errors->any())
        <div class="form-group">
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
