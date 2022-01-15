const express = require('express');
const app = express();
//const server = require('http').createServer(app);
const fs = require ('fs');

var https = require('https');
// const https = require('https').Server(app);

var https_options = {

  key: fs.readFileSync('/home/thexxx/gs-ssl/gs.key'),
  cert: fs.readFileSync('/home/thexxx/gs-ssl/gs.crt'),
  ca: [
        fs.readFileSync('/home/thexxx/gs-ssl/gs.ca')

       ]
};

const server = https.createServer(https_options, function (req, res) {

 res.writeHead(200);

 res.end("Welcome to Node.js HTTPS Servern");

});

const io = require('socket.io')(server, {
    cors: { origin: "*"}
});

server.listen(5379);

var users = [];
var groups=[];


// https.listen(5379, function () {
//     console.log('Listening to port 5379');
// });

io.on('connection', function (socket) {

    console.log("connection");

    socket.on("connect_error", (err) => {
        console.log(`connect_error due to ${err.message}`);
      });

    // create room
  
    socket.on('create_room', function(data) {
  // socket.handshake.session.room.push(data.username);
      console.log(socket.id);
      data['socket.id'] = socket.id;
    //    var user_in_room_id=data.user_id;
      socket.join(data.room);
      console.log("room name:",data.room);
      io.sockets.in(data.room).emit('list_users',data);
      io.emit('datawithSocketId', data);

      });
      socket.on('update_username', function(data_user) {
         console.log("heyy");
         data_user['socket.id'] = socket.id;
       socket.join(data_user.room);
    
      io.sockets.in(data_user.room).emit('list_update_username',data_user);
      io.emit('datawithSocketId', data_user);

      });
      socket.on('sendMessage', function(message,room,user_id,auth_username) {

  
        console.log("send message event:",message);
        console.log("send message event room name:","group"+room);
        console.log("user id:",user_id);

      io.sockets.in("group"+room).emit('pass_message',message,user_id,auth_username);
    
 
      });

    socket.on('disconnect', function() {
        console.log("disconnet");
        var i = users.indexOf(socket.id);
        users.splice(i, 1, 0);
        io.emit('deleteuser', socket.id);
        console.log(users)
    });

});





// var https = require('https');

// var fs = require('fs');

// var https_options = {

//   key: fs.readFileSync('/home/thexxx/ssl/keys/d2672_03613_cd8d7e566bff1e8cdb10fb3c62ca01c1.key'),

//   cert: fs.readFileSync('/home/thexxx/ssl/certs/thexxx_club_d2672_03613_1638193600_71d23fe724d94d833180c3c8dfb9b80e.crt'),

//   ca: [
//         fs.readFileSync('/home/thexxx/ssl/ca-bundle')

//       ]
// };

// https.createServer(https_options, function (req, res) {

//  res.writeHead(200);

//  res.end("Welcome to Node.js HTTPS Servern");

// }).listen(5379)

