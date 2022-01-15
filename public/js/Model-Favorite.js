$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var url = $('meta[name=reg_url]').attr('content');

$('.model_favorite').on('click', function () {
  $this = $(this);
  var status = $(this).attr('status');
  var page = $(this).attr('page');
  var video_id = $(this).attr('video_id');
  var model_id = $(this).attr('id');
  var id = model_id.split('-');

  var image_to_unfavorite = $('#image-' + id[2] + video_id);
  var video_to_unfavorite = $('#video-user-' + video_id);

  if (page == 'true') {
    image_to_unfavorite.remove();
    video_to_unfavorite.remove();
  }

  if (status == 0 || status == 1) {

    if (page == 'false') {
      status = status == 1 ? 0 : 1;
    }
    
    $.ajax({
      type: 'POST',
      url: url + '/add_favorites',
      data: {
        'model_id': id[2],
        'type': id[1],
        'status': status,
        'page': page,
        'video_id': video_id
      },
      success: function (data) {
        if (data.message !== 'anonymous') {
          if (status == 1) {
            $this.find('img').attr('src', url + '/images/icons/heart-full.svg');
            $this.attr('status', 1);
          }
          else {
            $this.find('img').attr('src', url + '/images/icons/heart-outline.svg');
            $this.attr('status', 0);
          }
        }
      }
    });
  }
  else {
    alert('Something went wrong.');
  }
});
