$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var url = $("meta[name=reg_url]").attr("content");


let $chatInput = $(".chat-input");
let $chatInputToolbar = $(".chat-input-toolbar");
let $chatBody = $(".chat-body");
let $messageWrapper = $("#messageWrapper");
// let $modelFollowersList=$("#model-followers-list");
let $modelFollowersList_model = $("#model-followers-list-model");

let $modelFollowersList_user = $("#model-followers-list-user");
// let $messageWrapper = $(".messageWrapper");


let ip_address = 'https://thexxx.club';
let socket_port = '5379';


let socket = io(ip_address + ':' + socket_port);
// let friendId = "{{ $chat_data['friendInfo']->id }}";

// let ip_address_redis = '127.0.0.1';
// let socket_port_redis = '6379';
// let redis = io(ip_address_redis + ':' + socket_port_redis);
// var io = require('socket.io-client');
// var socket = io.connect(ip_address, {reconnect: true});

var livestream_model_id = document.getElementById("model").getAttribute("model-id");
var auth_user_id = document.getElementById("auth").getAttribute("auth-id");
var auth_username = document.getElementById("auth").getAttribute("username");

var groupId = livestream_model_id;
var user_id = auth_user_id;

let data_user = {group_id: groupId, user_id: user_id, room: "group" + groupId, username: auth_username}
socket.on('connect', function () {
    //var get_arr=sessionStorage.getItem("id");

    let data = {group_id: groupId, user_id: user_id, room: "group" + groupId, username: auth_username}
    socket.emit('create_room', data);

    // StoreUsertoSession(data);
    // alert("Group Connected");
});

//  ajax_call_username(data);
//   timeOutId = setTimeout(ajax_call_username(data), 1000);

// function ajax_call_username(data)
// {
//   socket.emit('send_username',data);

//           timeOutId = setTimeout(ajax_call_username(data), 1000); 

// }
// setTimeout(functionanme,5000) //5sec

function StoreUsertoDatabase(data) {
    // alert(data.user_id);
    $.ajax({
        type: "POST",
        url: url + "/storeUsertoDatabase",
        data: {
            userdata: data
        },
        success: function (response) {
            // alert("Account Details Updated Successfully");

        },
    });
}
// function StoreUsertoSession(data)
// {
//     // alert(data.user_id);
//     $.ajax({
//         type: "POST",
//         url: url + "/storeUsertoSession",
//         data: {
//             userdata:data
//         },
//         success: function (response) {
//             // alert("Account Details Updated Successfully");
//             // if (response.success == "yes") {
//             //     window.location = url;
//             // }
//         },
//     });
// }
var user_arr = [];
socket.on('list_update_username', function (data_user) {
    //  alert("yes");
    if (user_arr.indexOf(data_user.username) !== -1) {
        // alert("Yes, the value exists!")
    }
    else {
        // alert(data_user.username);
        user_arr.push(data_user.username);
        attachuserid(data_user.username);
        // if(user_arr.includes(data.username))
        // {return ;
        // }
        // else{
        //   attachuserid(data.username);
        // }

    }
});

socket.on('list_users', function (data) {

    // alert("here");
    //  console.log(data.username);
    // StoreUsertoDatabase(data);

    if (user_arr.indexOf(data.username) !== -1) {
        // alert("Yes, the value exists!")
    }
    else {
        // alert(data.username);
        if (data.username != "") {

        }
        user_arr.push(data.username);
        attachuserid(data.username);
        // if(user_arr.includes(data.username))
        // {return ;
        // }
        // else{
        //   attachuserid(data.username);
        // }

    }
    console.log(data_user);
    socket.emit('update_username', data_user);
});


function attachuserid(user) {


    let userlistContent1 = '<li>\n' + '<div id="gender" class="gender-icon">' + '<img src="/images/icons/type-of-users-male.svg"/>\n'
        + '</div>\n' + '<div class="username-tag">' +
        '<a href="#"  class="color-profile-photo" title="Access user profile">' + user + '<a>\n' + '</div>\n' + ' </li>';
    $modelFollowersList_model.append(userlistContent1);


    let userlistContent2 = '<li>\n' + '<div id="gender" class="gender-icon">' + '</div>\n' + '<div class="username-tag">' +
        '<a href="#"  class="color-profile-photo" title="Access user profile">' + user + '<a>\n' + '</div>\n' + ' </li>';
    $modelFollowersList_user.append(userlistContent1);
}

// $chatInput.keypress(function (e) {
//   let message = $(this).html();
//   if (e.which === 13 && !e.shiftKey) {
//       $chatInput.html("");
//       sendMessage(message);
//       return false;
//   }
// });

socket.on('pass_message', function (message, get_user_id, auth_username) {

    if (get_user_id != user_id) {
        appendMessageToReceiver(message, auth_username);
    }
});

$('.message_chat').on('keypress', function (e) {

    if (e.which === 13 && !e.shiftKey) {
        // e.preventDefault();
        return false;
    }
});

function sendMessage(message, friend_id, live_video_id) {


    if (auth_user_id == null || auth_user_id == "") {
        alert("Please Login to chat");
        return;
    }

    let form = $(this);
    let formData = new FormData();
    let token = "{{ csrf_token() }}";

    formData.append('message', message);
    formData.append('sender_id', auth_user_id);
    formData.append('receiver_id', livestream_model_id);
    formData.append('live_video_id', live_video_id);

    socket.emit('sendMessage', message, groupId, user_id, auth_username);

    // var objDiv = document.getElementsByClassName("chat-list");
    // console.log(objDiv);
    // // let objDiv = document.getElementById("messageWrapper");
    //
    // $('.chat-list').scrollTop($('.chat-list')[0].scrollHeight);
    // //   objDiv.scrollTop = objDiv.scrollHeight;


    document.getElementById("message").value = "";

    appendMessageToSender(message);


    console.log(formData);
    $.ajax({
        url: url + "/send-message",
        type: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            if (response.success) {
                console.log(response.data);
            }
        }
    });

}

function appendMessageToSender(message) {

    if (message == "") {
        alert("Please say Something");
        return;
    }


    //  $('.chat-list').scrollTop($('.chat-list')[0].scrollHeight);
    // let name ="{{ $chat_data['myInfo']->name }}";
    let name = "Me";
    let image = '';

    let userInfo = '<div class="col-md-12 user-info">\n' +
        '<div class="chat-image">\n' + image +
        '</div>\n' +
        '\n' +
        '<div class="chat-name font-weight-bold">\n' +
        name +
        '<span class="small time text-gray-500" title="">\n' +
        +'</span>\n' +
        '</div>\n' +
        '</div>\n';

    // let messageContent = '<div class="col-md-12 message-content">\n' +
    //     '                            <div class="message-text">\n' + message +
    //     '                            </div>\n' +
    //     '                        </div>';


    let messageContent = '<li class="user-chat-line">\n' + '<div class="chat-balloon">' + '<h5>' + name + '</h5><p>' + message + '<p>\n' + '</div>\n' + ' </li>';

    // let messageContent = '<li class="model-chat-line">\n' + '<div class="chat-balloon">'+'<h5>'+name+'</h5>'+' <p>'+message+  '<p>\n' + '</div>\n'+' </li>';


    $messageWrapper.append(messageContent);
    scrollToLastMessage();
}

function appendMessageToReceiver(message, auth_username) {

    if (message == "") {
        return;
    }
    let name = auth_username;
    let image = '';

    let userInfo = '<div class="col-md-12 user-info">\n' +
        '<div class="chat-image">\n' + image +
        '</div>\n' +
        '\n' +
        '<div class="chat-name font-weight-bold">\n' +
        name +
        '<span class="small time text-gray-500" title="' + (message.created_at) + '">\n' +
        (message.created_at) + '</span>\n' +
        '</div>\n' +
        '</div>\n';

    let messageContent = '<li class="model-chat-line">\n' + '<div class="chat-balloon">' + '<h5>' + name + '</h5>' + ' <p>' + message + '<p>\n' + '</div>\n' + ' </li>';
//     let messageContent = '<li class="model-chat-line">\n' +' <div class="user-thumb">\n'+
//     ' <img src="{{ url('images/icons/gifts-stilletto.svg') }}"/>\n'+' '+'<div class="chat-balloon">'+' <p>'+message+  '<p>\n' + '</div>\n'+' </li>';

//     <div class="user-thumb">
//     <img src="{{ url('images/icons/gifts-stilletto.svg') }}" alt="Model Name here" />

// </div>


    // let newMessage = '<div class="row message align-items-center mb-2">'
    //     + messageContent +
    //     '</div>';

    $messageWrapper.append(messageContent);

    scrollToLastMessage();
}

function scrollToLastMessage() {
    $('.chat-list').animate({scrollTop: $('.chat-list').prop("scrollHeight")}, 1000);
}

$(function () {
    scrollToLastMessage();
});
  
  

