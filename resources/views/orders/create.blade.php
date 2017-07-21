@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">orders</div>

                    <div class="panel-body">
                        <form action="{{url('/orders')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="">Good Name</label>
                                <input type="text" class="form-control" name="good_name">
                            </div>
                            <div class="form-group">
                                <label for="">Good_price</label>
                                <input type="text" class="form-control" name="good_price">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
