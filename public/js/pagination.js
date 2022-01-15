$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var url = $('meta[name=reg_url]').attr('content');

$(document).ready(function() {

  $('.pagination').on('click', function() {
    var page_no = $(this).attr('data-page');
    var path = '';
    if ($('.video-shop-section').length > 0) {
      path = '/video_page=';
    }
    else if ($('.category_section').length > 0) {
      var type = $('.category_section').attr('data-type');
      path = '/category=' + type + '/page=';
    }
    else {
      path = '/page=';
    }
    window.location = url + path + page_no;
  });
});
