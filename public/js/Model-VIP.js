$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var url = $('meta[name=reg_url]').attr('content');

function downloadVideo($this) {

  var video_id =  $($this).attr('data-video');
  var model_id =  $($this).attr('data-model');
  var tokens =  $($this).attr('data-token');

  if (model_id && video_id) {
    $.ajax({
      url: url + '/check-logged-user',
      method: "POST",
      data: {
        'model_id': model_id,
        'video_id': video_id,
      },
      success: function (data) {
        if (data.status == 'yes') {
          if (data.vip_status == 'vip') {

          }
          else {
            $('.download_video-modal').find('.title-model').find('h1').text('You are not a VIP member. Send tokens to download the video.');
            $('.download_video-modal').find('.options.tips').show();

            if (data.total_tokens >= tokens) {
              $('.options.tips.download ul li:first').show();
              $('.options.tips.download ul li:eq(1)').hide();
            }
            else {
              $('.download_video-modal').find('.title-model').find('h1').text('You are not a VIP member. And you don\'t have tokens in wallet to download the video. Please buy tokens');
              $('.options.tips.download ul li:first').hide();
              $('.options.tips.download ul li:eq(1)').show();
            }
          }
        }
        else if (data.status == 'no') {
          $('.download_video-modal').find('.title-model').find('h1').text('Please Login to Download the Video');
          $('.download_video-modal').find('.options.tips').hide();
        }
      }
    });
  }
  else {
    alert("No Comment Entered");
  }
}

$(document).ready(function() {
  $('.download_video_token').on('click', function() {
    var model_id = $(this).attr('data-model');
    var tokens = $(this).attr('data-token');
    var video_id = $(this).attr('data-video');
    
    if(model_id && tokens && video_id) {
      $.ajax({
        url: url + '/download-access',
        method: "POST",
        data: {
          'tokens': tokens,
          'model_id': model_id,
          'video_id': video_id
        },
        success: function (data) {
          if (data.status == 'yes') {
            console.log('Token sent!!');
            window.location = url + '/page-stream-model-product/video_id=' + video_id + '/id=' + model_id;
          }
          else if (data.status == 'no') {
            alert('You need to Login first to buy the tokens.');
          }
          else if (data.status == 'no_token') {
            alert('You don\'t have enough token to send. Please buy token first');
          }
        }
      });
    }
    else {
      alert('Something went wrong. Please try again or refresh the page');
    }
  });
});
