$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var url = $('meta[name=reg_url]').attr('content');

function liveModelComment(model_id, video_type) {

    var comment = document.getElementById('live_Model_Comment').value;
    var model_id = model_id;
    if (comment != '') {
        $.ajax({
            url: url + '/live-model-comment',
            method: "POST",
            data: {
                'comment': comment,
                'model_id': model_id,
                'video_type': video_type,
            },
            success: function (data) {
                if (data.success == 'yes') {
                    var comment_block = $('.comments-list ul li:first').clone().prop('id', 'user-' + data.user_id);
                    $('.comments-list ul').append(comment_block);
                    $('#user-' + data.user_id).css('display', 'flex');
                    $('#user-' + data.user_id).find('.comment-balloon p').text(comment);
                    $('#user-' + data.user_id).find('.stars-ratings').text('You');
                    $('#live_Model_Comment').val('');
                }
                else if (data.success == 'no') {
                    alert('Please Login to comment');
                }
            }
        });
    }
    else {
        alert("No Comment Entered");
    }
}


var showstarted = false;
function startShow() {


    // $("#main_startshow").attr("disabled", true);
//   $('#live-streaming-show').css('display', 'block');
//       $('#live-streaming-show').parent().css('display', 'block');
    var $this = $('#live-video_player');
    var user_id = $('#user_id').val();
    let btn_start = $("#btn_start_show");
    let btn_end = $("#btn_end_show");
    let btn_start_private_show = $("#btn_start_private_show");

    $.ajax({
        url: url + '/check-model-already-inShow',
        method: "POST",
        data: {
            'model_id': user_id,

        },
        success: function (data) {
            if (data.success == 'yes') {
                alert('User-ID ' + user_id);
                btn_start.prop("disabled", true);
                btn_start.css("cursor", "no-drop");
                var meeting_url = "https://web-rtc-7604e.web.app/?user=model&user_id=" + user_id;

                showstarted = true;
                $this.attr('src', meeting_url);
                loopTocheckactivity(user_id);

                btn_start.closest("li").fadeOut({
                    duration: 500,
                    complete: function(){
                        $(this).addClass("hide");
                        btn_end.closest("li.hide").fadeIn(500).removeClass("hide");
                        btn_start_private_show.closest("li.hide").fadeIn(500).removeClass("hide");
                    }
                });


            }
            // else if (data.success == 'no') {
            //   alert('Please Login to comment');
            // }
        }
    });
}

function startPrivateShow() {
    /*ToDo: Start private show stuff*/

    let btn_start_private_show = $("#btn_start_private_show");
    let btn_end_private_show = $("#btn_end_private_show");

    btn_start_private_show.closest("li").fadeOut(500, function(){
        $(this).addClass("hide");

        btn_end_private_show.closest("li.hide").fadeIn(500).removeClass("hide");
    });
}

function endPrivateShow() {
    /*ToDo: End private show stuff*/

    let btn_start_private_show = $("#btn_start_private_show");
    let btn_end_private_show = $("#btn_end_private_show");

    btn_end_private_show.closest("li").fadeOut(500, function(){
        $(this).addClass("hide");

        btn_start_private_show.closest("li.hide").fadeIn(500).removeClass("hide");
    });


}

function loopTocheckactivity(user_id) {
    var timeOutId = 0;
    ajax_call(user_id);
    timeOutId = setTimeout(ajax_call(user_id), 1000);

}

function ajax_call(user_id) {

    $.ajax({
        url: url + '/model-in-action-status',
        method: "POST",
        data: {
            'status': 'yes',
            'user_id': user_id
        },
        success: function (data) {
            if (data.success == 'yes') {
                timeOutId = setTimeout(ajax_call(user_id), 1000); //set the timeout again
            }
            else if (data.success == 'no') {
                alert('Please login first for Go-Live');
            }
        }
    });
}
function randomNumberFromRange(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}


function endShowButton() {

    if (showstarted == false) {
        alert("first start show");
        return;
    }
    $(".start_show").prop("disabled", false);
    var success = false;
    $.ajax({
        url: url + '/end-live-video',
        method: "POST",
        data: {},
        success: function (data) {
            if (data.success == 'yes') {
                success = true;
                $('#live-video_player').attr('src', ''); // this is for model only.

                console.log('End Show!!');
                alert('Your Live video is ended now!!');
                window.location.reload(true);

            }
            else if (data.success == 'no') {
                success = false;

            }
        }
    });

    return success;
}

var livestream_model_id = document.getElementById("model").getAttribute("model-id");
var auth_user_id = document.getElementById("auth").getAttribute("auth-id");


var groupId = livestream_model_id;
var user_id = auth_user_id;

window.onbeforeunload = function (e) {

    e = e || window.event;

    if (e) {

        endShow(false);
        DeleteUserfromDatabase(groupId, user_id);
    }
}
function DeleteUserfromDatabase(groupId, user_id) {
    alert(groupId);

    $.ajax({
        type: "POST",
        url: url + "/deleteUserfromDatabase",
        data: {
            groupId: groupId,
            user_id: user_id
        },
        success: function (response) {
            // alert("Account Details Updated Successfully");

        },
    });
}
