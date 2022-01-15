$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var url = $("meta[name=reg_url]").attr("content");

function AccountModelUpdatePart1() {

    var password = document.getElementById("pwd_Account").value;
    var email = document.getElementById("email_Account").value;
    var password_confirmation = document.getElementById("password_Confirmation_Account").value;
    var gender = document.getElementById("gender_Account").value;
    var country = document.getElementById("country_Account").value;
    var birthday = document.getElementById("birthday_Account").value;

    if (password_confirmation != "" && password == "") {
        alert("Password field is empty");
        return;
    }
    if (password != "" && password != password_confirmation) {
        alert("Passwords fields are not matched.");
        return;
    }
    if (password != "" && password.length < 6) {
        alert("Password must be of minimum 6 characters");
        return;
    }

    var mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!email.match(mailFormat)) {
        alert("You have entered an invalid email address!");
        return;
    }

    if (gender == "0" || country == "0") {
        alert("Fields can't be empty");
        return;
    }

    $.ajax({
        type: "POST",
        url: url + "/account-model-update-1",
        data: {
            password: password,
            gender: gender,
            country: country,
        },
        success: function (response) {
            alert("Account Details Updated Successfully");
            if (response.success == "yes") {
                window.location = url;
            }
        },
    });
}

function AccountModelUpdatePart2() {

    var categories = document.getElementById("categories").value;
    var camera_name = document.getElementById("camera_name_Acc").value;
    var performs = document.getElementById("performs").value;
    var languages = document.getElementById("languages").value;
    var tags = document.getElementById("tags").value;
    var eye_color = document.getElementById("eye_color").value;
    var hair_length = document.getElementById("hair_length").value;
    var hair_color = document.getElementById("hair_color").value;
    var figure = document.getElementById("figure").value;
    var sexual_preference = document.getElementById("sexual_preference").value;
    var chest_size = document.getElementById("chest_size").value;

    if (tags.length <= 5) {
        alert("Tags are too short");
        return;
    }
    if (camera_name.length < 2) {
        alert("Camera name is too short");
        return;
    }

    if (categories == "0" || performs == "0" || languages == "0" || eye_color == "0" || hair_length == "0" || hair_color == "0" ||
        figure == "0" || sexual_preference == "0" || chest_size == "0") {
        
        alert("Fields can't be empty");
        return;
    }

    $.ajax({
        type: "POST",
        url: url + "/account-model-update-2",
        data: {
            categories: categories,
            camera_name: camera_name,
            performs: performs,
            languages: languages,
            tags: tags,
            eye_color: eye_color,
            hair_length: hair_length,
            hair_color: hair_color,
            figure: figure,
            sexual_preference: sexual_preference,
            chest_size: chest_size,
        },
        success: function (response) {
            if (response.success == "yes") {
                alert("Account Details Updated Successfully");
            }
        },
    });
}

function AccountModelUpdatePart3() {

    var sex_toy_id = document.getElementById("sex_toy_id").value;
    var model_description = document.getElementById("model_description").value;

    if (sex_toy_id.length <= 6) {
        alert("Id is too short");
        return;
    }
    if (model_description.length < 20) {
        alert("Model description should be more than 20 words");
        return;
    }
    if (model_description.length > 100) {
        alert("Model description can't be more than 100 words");
        return;
    }

    $.ajax({
        type: "POST",
        url: url + "/account-model-update-3",
        data: {
            sex_toy_id: sex_toy_id,
            model_description: model_description,
        },
        success: function (response) {
            if (response.success == "yes") {
                alert("Account Details Updated Successfully");
            }
        },
    });
}

$(document).ready(function () {
    //gender_Account
    var gender_Account_value = $("#gender_Account_temp").val();
    if (gender_Account_value != "") {
        $("#gender_Account").val(gender_Account_value);
    }

    //country_Account
    var country_Account_value = $("#country_Account_temp").val();
    if (country_Account_value != "") {
        $("#country_Account").val(country_Account_value);
    }
    //categories
    var categories_value = $("#categories_temp").val();
    if (categories_value != "") {
        $("#categories").val(categories_value);
    }

    //performs
    var performs_value = $("#performs_temp").val();
    if (performs_value != "") {
        $("#performs").val(performs_value);
    }
    //languages
    var languages_value = $("#languages_temp").val();
    if (languages_value != "") {
        $("#languages").val(languages_value);
    }

    //eye_color
    var eye_color_value = $("#eye_color_temp").val();
    if (eye_color_value != "") {
        $("#eye_color").val(eye_color_value);
    }
    //hair_length
    var hair_length_value = $("#hair_length_temp").val();
    if (hair_length_value != "") {
        $("#hair_length").val(hair_length_value);
    }

    //hair_color
    var hair_color_value = $("#hair_color_temp").val();
    if (hair_color_value != "") {
        $("#hair_color").val(hair_color_value);
    }
    //figure
    var figure_value = $("#figure_temp").val();
    if (figure_value != "") {
        $("#figure").val(figure_value);
    }
    //sexual_preference
    var sexual_preference_value = $("#sexual_preference_temp").val();
    if (sexual_preference_value != "") {
        $("#sexual_preference").val(sexual_preference_value);
    }
    //chest_size
    var chest_size_value = $("#chest_size_temp").val();
    if (chest_size_value != "") {
        $("#chest_size").val(chest_size_value);
    }
});

// Account Photo Gallery

function readURL(event, input) {
    var output = document.getElementById(input);
    output.innerHTML = event.target.files[0].name;
}

function id_photo(event, id) {
    readURL(event, id);
}

function UploadPhotoInGallery() {
    var photo_file = document.getElementById("photo_file").value;

    var form_data = new FormData();
    form_data.append("photo_file", document.getElementById("photo_file").files[0]);

    if (photo_file != "") {
        $('#modal-upload-video').css('display', 'block');
        $('#modal-upload-video').parent().css('display', 'block');
        $.ajax({
            url: url + "/save-photo-in-gallery",
            method: "POST",
            data: form_data,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                if (data.photo_limit_exceeded == "yes") {
                    alert("Photos limit exceeded");
                }
                if (data.success == "yes") {

                    $model_image = $('.delete_temp').clone().prop('id', 'delete_image' + data.image_id);
                    $('#model-gallery ul.grid-x').append($model_image);
                    $('#delete_image' + data.image_id).removeClass('delete_temp');
                    $('#delete_image' + data.image_id).find('button').attr('onclick', 'DeleteImage(' + data.image_id + ', this)');
                    $('#delete_image' + data.image_id).find('img').attr('src', data.image_url).attr('alt', data.name);
                    $("#photo_file").val('');
                    alert("Successfully Uploaded");
                }
                $('#modal-upload-video').css('display', 'none');
                $('#modal-upload-video').parent().css('display', 'none');
            },
        });
    } 
    else {
        alert("Select file to upload.");
    }
}

function DeleteImage(id, $this)
{
    var image_to_delete = $('#delete_image' + id);

    $.ajax({
        type: "POST",
        url: url + "/account-model-delete-image",
        data: {
            image_id: id,
        },
        success: function (response) {
            if (response.success == "yes") {    
                image_to_delete.remove();
                alert("Successfully deleted");
            }
        },
    });
}

function UploadVideo() {

  var title = document.getElementById('videoTitle').value;
  var category = document.getElementById('videoCategory').value;
  var price = document.getElementById('priceTier').value;
  var video_quality = document.getElementById('videoQuality').value;
  var description = document.getElementById('videoDescription').value;
  var terms_condition_check = document.getElementById('termsConditionCheck');

  var form_data = new FormData();
  form_data.append("video_file", document.getElementById('video_file').files[0]);
  form_data.append("title", title);
  form_data.append("category", category);
  form_data.append("price", price);
  form_data.append("video_quality", video_quality);
  form_data.append("description", description);

  if (description.length < 10) {
      alert('Description is too short');
      return;
  }

  if (title.trim() && description.trim() != '' && category != '0' && price != '0' && video_quality != '0') {
    if (terms_condition_check.checked) {
      $('#modal-upload-video').css('display', 'block');
      $('#modal-upload-video').parent().css('display', 'block');
      $.ajax({
        url: url + '/save-model-video',
        method:"POST",
        data: form_data,
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,

        success: function (data) {
          if (data.success == 'yes') {
            alert('Uploaded Successfully');
            document.getElementById('videoTitle').value = '';
            document.getElementById('videoCategory').value = '0';
            document.getElementById('priceTier').value = '0';
            document.getElementById('videoQuality').value = '0';
            document.getElementById('videoDescription').value = '';
            document.getElementById('video_files').innerHTML = '';

            window.location = url + '/page-your-videoshop-1';
          }
          if (data.message) {
              alert(data.message);
          }
          $('#modal-upload-video').css('display', 'none');
          $('#modal-upload-video').parent().css('display', 'none');
        }
      });
    }
    else {
      alert('Accept the terms and conditions by clicking on checkbox');
    }
  }
  else {
    alert('All fields are required');
  }
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
