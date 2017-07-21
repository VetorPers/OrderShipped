@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">orders</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">User ID</label>
                            <input type="text" class="form-control" value="{{$inf->user->id}}">
                        </div>
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" value="{{$inf->user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Good Name</label>
                            <input type="text" class="form-control" value="{{$inf->good_name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Good_price</label>
                            <input type="text" class="form-control" value="{{$inf->good_price}}￥">
                        </div>
                        <div class="form-group">
                            <label for="">Order</label>
                            <order order="{{$inf->id}}"></order>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.bootcss.com/vue/1.0.4/vue.min.js"></script>
<script src="https://cdn.bootcss.com/socket.io/2.0.3/socket.io.slim.js"></script>
<script>
    //    var socket = io('127.0.0.1:3000');
    //    new Vue({
    //        el: '#demo',
    //        data: {
    //            orders: [1]
    //        },
    //        ready: function () {
    //            socket.on('order:App\\Events\\OrderChannel', function (data) {
    //                data = data.split(';');
    //                console.log(data)
    //                this.orders = data;
    //            }.bind(this));
    //        }
    //    })
</script>
@endpush
