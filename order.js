var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis();
var pub = new Redis();

redis.subscribe('order');

redis.on('message', function (channel, message) {
    message = JSON.parse(message);
    console.log('Data is %s', message.data.order.body);
    io.emit(channel + ':' + message.event, message.data.order.body);
});
server.listen(3000);
