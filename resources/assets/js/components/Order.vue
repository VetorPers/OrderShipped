<template>
    <ul>
        <li v-for="order in orders">{{order}}</li>
    </ul>
</template>

<script>

    //    var socket = io('127.0.0.1:3000');
    export default{
        props: ['order'],
        data(){
            return {
                orders: []
            }
        },
        mounted(){
            var self = this;
            axios.get('/api/order/' + this.order).then(res => {
                this.orders = res.data;
            });
//            socket.on('order:App\\Events\\OrderChannel', function (data) {
//                    data = data.split(';');
//                    console.log(data)
//                    self.orders = data;
//                }
//            )

            window.Echo.private(`order.${this.order}`)
                .listen('OrderChannel', (e) => {
                    console.log(e);
                    self.orders = e.order.body.split(';');
                });
        }
    }
</script>
