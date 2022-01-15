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
// let $messageWrapper = $(".messageWrapper");


let user_id = "{{ auth()->user()->id }}";
let ip_address = '127.0.0.1';
let socket_port = '8005';


let socket = io(ip_address + ':' + socket_port);
// let friendId = "{{ $chat_data['friendInfo']->id }}";

// let ip_address_redis = '127.0.0.1';
// let socket_port_redis = '6379';
// let redis = io(ip_address_redis + ':' + socket_port_redis);
// var io = require('socket.io-client');
// var socket = io.connect(ip_address, {reconnect: true});

socket.on('connect', function() {
    // alert("connected");
    var auth_user_id=  document.getElementById("auth").getAttribute("auth-id");
    var livestream_model_id=  document.getElementById("model").getAttribute("model-id");
   // alert(livestream_model_id);
  // console.log("sender_id:"+sender_id);
    socket.emit('connect_to _room', auth_user_id,livestream_model_id);
});

socket.on("sendToclientSide", function (users) {
    
   console.log("all users:",users);
 });




socket.on('updateUserStatus', (data) => {
    let $userStatusIcon = $('.user-status-icon');
    $userStatusIcon.removeClass('text-success');
    $userStatusIcon.attr('title', 'Away');

    $.each(data, function (key, val) {
        if (val !== null && val !== 0) {
            let $userIcon = $(".user-icon-"+key);
            $userIcon.addClass('text-success');
            $userIcon.attr('title','Online');
        }
    });
});
socket.on("sendMessageToclientSide", function (message,sender_id,sender_indentity) {
    // users[user_id] = socket.id;
    // alert(message + " "+ sender_id);
    //console.log("got all the  id:",sender_id);
     console.log("Message Recieved"+ message);
    //  alert("sender_indentity:",sender_indentity);
     //INtegrate UI
     appendMessageToReceiver(message,sender_indentity);
 });

$chatInput.keypress(function (e) {
   let message = $(this).html();
   if (e.which === 13 && !e.shiftKey) {
       $chatInput.html("");
       sendMessage(message);
       return false;
   }
});

function sendMessage(message) {
   // alert(message);
    // alert(friendId);
    // let url = "{{ route('message.send-message') }}";
    let form = $(this);
    let formData = new FormData();
    // let token = "{{ csrf_token() }}";

    formData.append('message', message);
    // formData.append('_token', token);
    // formData.append('receiver_id', friendId);

    appendMessageToSender(message);
    var livestream_model_id=  document.getElementById("model").getAttribute("model-id");
    var auth_user_id=  document.getElementById("auth").getAttribute("auth-id");
    var isindentity=  document.getElementById("indentity");
    if(isindentity=='model')
    {
     var sender_indentity='model';
    }
    else
    {
    var sender_indentity='user';   
    }


    socket.emit("group"+livestream_model_id, message,auth_user_id,sender_indentity);




   // redis.emit('message','private-channel',message);
    // socket.on('message', function(message) {
    //     $("#lst").append("<li>" + message + "</li>")
    //     });

    $.ajax({
        url: url + "/send-message",
       type: 'POST',
       data: formData,
       contentType: false,
       cache: false,
       processData: false,
        dataType: 'JSON',
       success: function (response) {
           if (response.success) {
               console.log(response.data);
           }
       }
    });
}

function appendMessageToSender(message) {
    // let name ="{{ $chat_data['myInfo']->name }}";
    let name ="";
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


  
    let messageContent = '<li class="model-chat-line">\n' + '<div class="chat-balloon">'+' <p>'+message+  '<p>\n' + '</div>\n'+' </li>';

 
   
   
                                 
       

    //     <li class="model-chat-line">
    //     <div class="user-thumb">
    //         <img src="{{ url('images/icons/gifts-stilletto.svg') }}" alt="Model Name here" />
            
    //     </div>
    //     <div class="chat-balloon">
    //         <p>
    //             It's ok to dream a little
    //         </p>
    //     </div>
    // </li>

    // let newMessage = '<div class="row message align-items-center mb-2">'
    //     +userInfo + messageContent +
    //     '</div>';

    // $messageWrapper.append(messageContent);
}

function appendMessageToReceiver(message,sender_indentity) {
    let name = "{{ $chat_data['friendInfo']->name }}";
    let image = '';

    let userInfo = '<div class="col-md-12 user-info">\n' +
        '<div class="chat-image">\n' + image +
        '</div>\n' +
        '\n' +
        '<div class="chat-name font-weight-bold">\n' +
        name +
        '<span class="small time text-gray-500" title="'+(message.created_at)+'">\n' +
        (message.created_at)+'</span>\n' +
        '</div>\n' +
        '</div>\n';

         let messageContent = '<li class="model-chat-line">\n' + '<div class="chat-balloon">'+' <p>'+message+  '<p>\n' + '</div>\n'+' </li>';
//     let messageContent = '<li class="model-chat-line">\n' +' <div class="user-thumb">\n'+
//     ' <img src="{{ url('images/icons/gifts-stilletto.svg') }}"/>\n'+' '+'<div class="chat-balloon">'+' <p>'+message+  '<p>\n' + '</div>\n'+' </li>';

//     <div class="user-thumb">
//     <img src="{{ url('images/icons/gifts-stilletto.svg') }}" alt="Model Name here" />
    
// </div>



    // let newMessage = '<div class="row message align-items-center mb-2">'
    //     + messageContent +
    //     '</div>';

    $messageWrapper.append(messageContent);
}

socket.on('private-channel:App\\Events\\PrivateMessageEvent', function (message)
{
    alert(message);
   appendMessageToReceiver(message);
});

let $addGroupModal=$("#addGroupModal");
$(document).on("click",".btn-add-group", function(){
  $addGroupModal.modal();
});

$("#selectMember").select2();

