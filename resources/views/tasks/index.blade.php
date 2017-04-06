
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2016/12/27--}}
 {{--* Time: 16:36--}}
 {{--*/--}}
@extends('layouts.app')
@section('content')
    <div class="container tasks-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#toDo" role="tab" data-toggle="tab">待处理</a></li>
            <li role="presentation"><a href="#Done" role="tab" data-toggle="tab">已完成</a></li>
            <li role="presentation"><a href="#Later" role="tab" data-toggle="tab">延后</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="toDo">
                @if($toDo)
                    <table class="table table-striped">
                        @foreach($toDo as $task)
                            <tr>
                                <td class="date-cell"> {{ $task -> updated_at->diffForHumans()}}</td>
                                <td class="firs-cell"> {{ $task -> title }}</td>
                                <td class="icon-cell">@include('tasks._checkForm')</td>
                                <td class="icon-cell">@include('tasks._editForm')</td>
                                <td class="icon-cell">@include('tasks._deleteForm')</td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $toDo->links() }}
                @endif
            </div>
            <div role="tabpanel" class="tab-pane" id="Done">
                @if($Done)
                    <table class="table table-striped">
                        @foreach($Done as $task)
                            <tr>
                                <td> {{ $task -> title }}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $Done->links() }}
                @endif
            </div>
            <div role="tabpanel" class="tab-pane" id="Later">
            </div>
        </div>
    </div>
@endsection