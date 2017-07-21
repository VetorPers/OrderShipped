@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">orders</div>

                    <div class="panel-body">
                        <a href="{{url('/orders/create')}}" class="button button-blue">+ 新增订单</a>
                        @if($lists)
                            @foreach($lists as $list)
                                <table class="table">
                                    <caption>order list</caption>
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Good Name</th>
                                        <th>Good Price</th>
                                        <th>Created At</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$list->id}}</td>
                                        <td>{{$list->user->id}}: {{$list->user->name}}</td>
                                        <td>{{$list->good_name}}</td>
                                        <td>{{$list->good_price}}</td>
                                        <td>{{$list->created_at}}</td>
                                        <td><a href="{{url('/orders/'.$list->id)}}" class="button button-green">详情</a>
                                        </td>
                                        <td><a href="{{url('/orders/'.$list->id.'/edit')}}" class="button button-green">确认订单</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
