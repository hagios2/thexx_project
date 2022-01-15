var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var redisPort = process.env.REDIS_PORT;
var redisHost = process.env.REDIS_HOST;
var Redis = require('ioredis');
var redis = new Redis();
var redis = new Redis(redisPort, redisHost);
// io.adapter(Redis({ host: 'localhost', port: 6379 }));

var users = [];
var groups=[];


// const socket = require("socket.io-client")("https://example.com");

// socket.on("connect_error", (err) => {
//   console.log(`connect_error due to ${err.message}`);
// });

http.listen(8005, function () {
    console.log('Listening to port 8005');
});

redis.subscribe('private-channel', function() {
    console.log('subscribed to private channel');
});

redis.subscribe('group-channel', function() {
    console.log('subscribed to group channel');
});


redis.on('message', function(channel, message) {

    // redis.on('message', function(message) {
    message = JSON.parse(message);
    console.log("message:",message);
    console.log("channel:",channel);
    if (channel == 'private-channel') {
        let data = message.data.data;
        let receiver_id = data.receiver_id;
        let event = message.event;

        io.to(`${users[receiver_id]}`).emit(channel + ':' + message.event, data);
    }
    if (channel == 'group-channel') {
    let data=message.data.data;
            if(data.type == 2)
            {
                console.log("message event:",message.event);
            console.log("message:",data);


           let socket_id=getSocketIdofUserInGroup(data.sender_id,data.group_id);
           console.log("Sockets Id",socket_id)
           let socket=`io.sockets.connected[socket_id];`
        //   let socket=io.sockets.sockets[socket_id];
        io.sockets.sockets[senserID].broadcast.emit
        //    socket.broadcast.to('group'+data.group_id).emit('groupMessage',data);
            
        //    io.to('group'+data.group_id).emit('groupMessage',data);
        // console.log("Line 55",data.group_id+" Channel  - "+data);
            //  io.to('group'+data.group_id).emit(channel + ':' + message.event, data);
            console.log("Sockets connected",io.sockets.connected)
            console.log("Sockets",socket)
          socket.broadcast.to('harshit').emit(channel + ':' + message.event, data);
        //   io.to('group'+data.group_id).emit(channel + ':' + message.event, data);
           }

    }
});




io.on('connection', function (socket) {


    socket.on("connect_error", (err) => {
        console.log(`connect_error due to ${err.message}`);
      });


    var livestream_model_id_global = 0;
    var users = [];
    socket.on("connect_to _room", function (auth_user_id,livestream_model_id) {
       // users[user_id] = socket.id;
         users.push(auth_user_id); //all the users ID in the chat 
         livestream_model_id_global = livestream_model_id;
         console.log("Live Stream Model ID - "+livestream_model_id_global);
         socket.on("group"+livestream_model_id_global, function (message,sender_id,sender_indentity) {
            // users[user_id] = socket.id;
            console.log("sender identity - "+sender_indentity);
          
             console.log("got message:",message);
             io.emit('sendMessageToclientSide', message,sender_id,sender_indentity);
             //console.log("user connected "+ user_id);
         });
     
        io.emit('sendToclientSide', users);
        //console.log("user connected "+ user_id);
    });

    

   

    socket.on('disconnect', function() {
        var i = users.indexOf(socket.id);
        users.splice(i, 1, 0);
        io.emit('updateUserStatus', users);
        console.log(users);
    });


    socket.on("joinGroup", function (data) {
        console.log("data:",data);
        data['socket.id'] = socket.id;
        if(groups[data.group_id])
        {
            console.log("groups already exists");
        var userExist=checkIfUserExistInGroup(data.user_id,data.group_id)
            if(!userExist)
            {
                console.log("groups exists");
                groups[data.group_id].push(data); 
                console.log("groups:",groups);
                socket.join('harshit');
                //console.log(socket.id + " now in rooms ", getRoomsByUser(socket.id));
            }
            else{
                // console.log("user exists exists");
                // socket.join(data.room);
            }
        }
        else{
            console.log("new groups");
          groups[data.group_id]=[data];
          io.emit('checkroomjoined', data.user_id);
          socket.join(data.room);
          //console.log(socket.id + " now in rooms ", getRoomsByUser(socket.id));
        }
    });

});

function getRoomsByUser(id)
{
    let usersRooms = [];
    let rooms = io.sockets.adapter.rooms;

    for(let room in rooms){
        if(rooms.hasOwnProperty(room)){
            let sockets = rooms[room].sockets;
            if(id in sockets)
                usersRooms.push(room);          
        }
    }

    return usersRooms;
}

function checkIfUserExistInGroup(user_id,group_id)
{
    var group=groups[group_id];
    var exist=false;

    if(groups.length > 0)
    {
        for(var i=0;i< group.length;i++)
        {
            if(group[i]['user_id']==user_id)
            {
                exist=true;
                break;
            }
        }
    }
    return exist;
}
function getSocketIdofUserInGroup(user_id,group_id)
{
    console.log("user id:",user_id);
    console.log("groups:",groups);
    var group=groups[group_id];
    console.log("after groups:",group);
    if(groups.length > 0)
    {
        for(var i=0;i< group.length;i++)
        {
            if(group[i]['user_id']==user_id)
            {
                console.log("yes it returns:", group[i]['socket.id']);
               return group[i]['socket.id'];
            }
        }
    }
}
