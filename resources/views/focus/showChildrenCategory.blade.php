
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/16--}}
 {{--* Time: 9:27--}}
 {{--*/--}}
@extends('layouts.app')
@section('content')
    <div class="container">
        @include('layouts.header')
        <div class="container-fluid">
            <div class="row">
                @if($children!=='')
                    @foreach($children as $child)
                        <div class="col-md-2"><a href="{{ $child->cateid }}">{{ $child->name }}</a></div>
                    @endforeach
                @endif
            </div>
        </div>
        <h3>昨日销售组成</h3>
        {!! Charts::assets() !!}
            {!! $yesterday->render() !!}
        <h3>本月销售趋势</h3>
        {!! $thisMonth->render() !!}
        <h3>最近几月情况</h3>
        {!! $month->render() !!}
        <h3>最近几年情况</h3>
        {!! $year->render() !!}
        <h3>去年情况</h3>
        {!! $lastYear->render() !!}
        <h3>最近几季度情况</h3>
        {!! $quarter->render() !!}
    </div>
@endsection
