$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var url = $("meta[name=reg_url]").attr("content");








// Account Photo Gallery

function readURL(event, input) {
    var output = document.getElementById(input);
    output.innerHTML = event.target.files[0].name;
}

function id_photo(event, id) {
    readURL(event, id);
}


function calendarInterval()
{
    //   var begin_date= $('#begin').val();
    alert("oyee");
    
}



function deleteVideo(selected_id) {

    
    if (confirm('Are you sure to delete the video?')) {
      
        var video_to_delete = $('#video' + selected_id);
        var video_path = $('#' + selected_id).attr('path');
        var id = selected_id.split('-');

        $.ajax({
            type: "POST",
            url: url + "/delete-model-video",
            data: {
                video_id: id[0],
                model_id: id[1],
                video_path: video_path
            },
            success: function (response) {
                if (response.success == "yes") {    
                    video_to_delete.remove();
                    alert("Successfully deleted");
                }
            },
        });
    }
}
