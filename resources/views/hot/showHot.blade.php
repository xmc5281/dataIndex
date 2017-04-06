
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: 76683--}}
 {{--* Date: 2017/1/18--}}
 {{--* Time: 13:34--}}
 {{--*/--}}
@extends('layouts.app')
@section('content')
    <div class="container">
                    <table class="table table-hover">
                        @if($goods)
                            @foreach($goods as $good)
                                <tr>
                                    <td>{{ $good->gid }}</td>
                                    <td>{{ $good->cateid }}</td>
                                    <td>{{ $good->brandid }}</td>
                                    <td>{{ $good->sales.'元' }}</td>
                                    <td>{{ $good->sales_num }}</td>
                                    <td>{{ $good->orders.'单' }}</td>
                                    <td>{{ $good->buyer_num }}</td>
                                    <td>{{ $good->top }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
    </div>
@endsection