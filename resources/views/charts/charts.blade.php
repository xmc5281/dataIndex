
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/3--}}
 {{--* Time: 15:41--}}
 {{--*/--}}
@extends('layouts.app')
@section('content')
    {{--@if(is_array($analyticsData))--}}
        {{--@foreach($analyticsData as $datum)--}}
           {{--{{ $datum['date'] }} || {{ $datum['pageTitle'] }} || {{ $datum['visitors'] }} || {{ $datum['pageViews'] }}<br/>--}}
        {{--@endforeach--}}
    {{--@endif--}}

    <div class="container">
        @include('charts.showCharts')
    </div>
@endsection