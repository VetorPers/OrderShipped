@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">orders</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">Order</label>
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    Echo.channel('order')
        .listen('OrderChannel', function (data) {
            console.log(data.user, data.chatMessage);
        });
</script>
@endpush
