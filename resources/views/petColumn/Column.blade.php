@extends('layouts.app')
@section('content')
    {{--@if(is_array($analyticsData))--}}
    {{--@foreach($analyticsData as $datum)--}}
    {{--{{ $datum['date'] }} || {{ $datum['pageTitle'] }} || {{ $datum['visitors'] }} || {{ $datum['pageViews'] }}<br/>--}}
    {{--@endforeach--}}
    {{--@endif--}}
    <div class="container">
        {{--模态框--}}
        @include('petColumn.showColumn')
        {{--显示关注--}}
        @include('focus.focus')
    </div>
@endsection