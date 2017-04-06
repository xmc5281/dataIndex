
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/2/3--}}
 {{--* Time: 18:11--}}
 {{--*/--}}

@extends('layouts.app')
@section('content')
    <div class="container">
        {!! Charts::assets() !!}
       {!! $month->render() !!}
        <br>
        {!! $showMonth->render() !!}
        <br>
        {!! $showQuarter->render() !!}
        <br>
        {!! $showBigSales->render() !!}
    </div>
@endsection