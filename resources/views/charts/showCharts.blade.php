@extends('layouts.app');
@section('content')
    <div class="container">
        @include('layouts.header')
        <div class="row">
        @if($charts)
            @foreach($charts as $chart)
                {{--<!-- 16:9 aspect ratio -->--}}
                    {{--<div class="embed-responsive embed-responsive-16by9">--}}
                        {{--{!! $chart->google_src !!}--}}
                    {{--</div>--}}
                {{--{!! $chart->google_src !!}--}}
                    {{--<!-- 4:3 aspect ratio -->--}}
                    {{--<div class="embed-responsive embed-responsive-4by3">--}}
                        {{--<iframe class="embed-responsive-item" src="{!! $chart->google_src !!}"></iframe>--}}
                    {{--</div>--}}

                    <div class="google-charts col-md-6 col-lg-6" id="chart{{ $chart->id }}">
                        <span class="google-charts chartDescribe"><font>描述：</font>{!! $chart->describe ? $chart->describe: '此视图暂时无法被描述' !!} </span>
                        {!! $chart->google_src !!}
                        <div class="google-charts chartName">
                            <h3 data-toggle="modal" data-target="#editModal-{{$chart->id}}" > {!! $chart->name !!}</h3>
                            {!! Form::open(['route'=>['google_charts.destroy',$chart->id],'method'=>'delete']) !!}
                            <button type="submit" class="btn btn-sm">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @include('charts.editChart')
                @endforeach
        @endif
            @include('charts.createNewChart')
        </div>
    </div>
@endsection