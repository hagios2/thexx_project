$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var url = $('meta[name=reg_url]').attr('content');

function likeStatus($this,video_type,video_id) {

  var user_id = $($this).attr('id');
  var status = $($this).attr('status');
  
  var id = user_id.split('-');
 // alert(id[1] + " "+ video_type + " "+video_id);
  var count=$('#like_count_change-' + id[1]).text();
 
  if (status == 0 || status == 1) {

    status = status == 1 ? 0 : 1;
    $.ajax({
      type: 'POST',
      url: url + '/model_like',
      data: {
        'model_id': id[1],
        'status':status,
        'video_type':video_type,
        'video_id':video_id

      },

      success: function (data) {
        if (data.message !== 'anonymous') {
          if (status == 1) {
            $('#path1' + id[1]).css('fill', '#0040ff');
            $('#path2' + id[1]).css('fill', '#0040ff');
            $($this).attr('status', 1);
            count++;
            $('#like_count_change-' + id[1]).text(count);
          }
          else {
            $('#path1' + id[1]).css('fill', '#818183');
            $('#path2' + id[1]).css('fill', '#818183');
            $($this).attr('status', 0);
            count--;
            $('#like_count_change-' + id[1]).text(count);
          }
        }
      }
    });
  }
  else {
    alert('Something went wrong.');
  }
}


