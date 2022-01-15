$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var url = $('meta[name=reg_url]').attr('content');


function toggleCheckbox(element)
 {
    
    if(element.checked)
    {
        //alert("yes"); 
          $('#back_button').removeAttr('href');
      
    }
    else{
       //alert("un checked"); 
        $('#back_button').attr('href',"javascript: history.go(-1)");
    }
  // element.checked = !element.checked;
 
 }
function SavePage2() {

  var email = document.getElementById('emailModel').value;
  var password = document.getElementById('passwordModel').value;
  var password_confirmation = document.getElementById('passwordConfirmationModel').value;
  var terms_condition_check = document.getElementById('termsConditionCheck');

  var mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (!email.match(mailFormat)) {
      alert("You have entered an invalid email address!");
      return;
  }

  if (password !== password_confirmation) {
    alert("Password do not match");
  }
  else if (password.length < 6) {
    alert("Password must be of minimum 6 characters");
  }
  else {
    if (email != '' && password !== '') {
      if (terms_condition_check.checked) {
        $.ajax({
          type: 'POST',
          url: url + '/save-be-a-model-2',
          data: {
            'email': email,
            'password': password,
          },

          success: function (data) {
            if (data.success == 'yes') {
              window.location = url + '/be-a-model-3';
            }
           $('#termsConditionCheck').prop('checked', false); // Unchecks it
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
}

function SavePage3_1() {
  
  var camera_name = document.getElementById('modelCameraName').value;
  var name = document.getElementById('modelFullName').value;
  var birthday = document.getElementById('modelDOB').value;
  var gender = document.getElementById('gender').value;
  var country = document.getElementById('country').value;
  var nationality = document.getElementById('nationality').value;
  var ethnicy = document.getElementById('ethnicy').value;
  var terms_condition_check = document.getElementById('termsConditionCheck');

  if (name && camera_name && birthday && gender!= '0' && country != '0' && nationality != '0' && ethnicy != '0') {
    if (terms_condition_check.checked) {
      
      $.ajax({
        type: 'POST',
        url: url + '/save-be-a-model-3-1',
        data: {
          'name': name,
          'camera_name': camera_name,
          'birthday': birthday,
          'gender': gender,
          'country': country,
          'nationality': nationality,
          'ethnicy': ethnicy,
        },
        success: function (data) {
          if (data.success == 'yes') {
            window.location = url + '/be-a-model-3-2';
          }
           $('#termsConditionCheck').prop('checked', false);
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

function SavePage3_2() {
  
  var eyeColor = document.getElementById('eyeColor').value;
  var hairColor = document.getElementById('hairColor').value;
  var hairLength = document.getElementById('hairLength').value;
  var figure = document.getElementById('modelFigure').value;
  var sexualPreference = document.getElementById('sexualPreference').value;
  var chestSize = document.getElementById('chestSize').value;
  var terms_condition_check = document.getElementById('termsConditionCheck');

  if (eyeColor != '0' && hairColor != '0' && hairLength!= '0' && figure != '0' && sexualPreference != '0' && chestSize != '0') {
    if (terms_condition_check.checked) {
      
      $.ajax({
        type: 'POST',
        url: url + '/save-be-a-model-3-2',
        data: {
          'eyeColor': eyeColor,
          'hairColor': hairColor,
          'hairLength': hairLength,
          'figure': figure,
          'sexualPreference': sexualPreference,
          'chestSize': chestSize,
        },
        success: function (data) {
          if (data.success == 'yes') {
            window.location = url + '/be-a-model-4';
          }
           $('#termsConditionCheck').prop('checked', false);
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

function readURL(event, input) {
  var output = document.getElementById(input);
  output.innerHTML = event.target.files[0].name;
}

function id_document(event, id) {
  readURL(event, id + 's');
}

function SavePage4() {

  var type_of_document = document.getElementById('type_of_document').value;
  var id_number = document.getElementById('id_number').value;
  var expiry_date = document.getElementById('expiry_date').value;
  var document_file = document.getElementById('document_file').value;
  var terms_condition_check = document.getElementById('termsConditionCheck');

  var form_data = new FormData();
  form_data.append("document_file", document.getElementById('document_file').files[0]);
  form_data.append("type_of_document", type_of_document);
  form_data.append("id_number", id_number);
  form_data.append("expiry_date", expiry_date);

  if (type_of_document && id_number && expiry_date && document_file != '') {
    if (terms_condition_check.checked) {

      $.ajax({
        url: url + '/save-be-a-model-4',
        method:"POST",
        data: form_data,
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,

        success: function (data) {
          if(data.message) {
            alert(data.message);
          }
          if (data.success == 'yes') {
            alert("Successfully Registered");
            window.location = url + '/be-a-model-5';
          }
           $('#termsConditionCheck').prop('checked', false);
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

$(document).ready(function () {
  expiryDate();
  dateOfBirth();
});

function expiryDate() {
  var today = new Date();
  var date = today.getDate();
  var month = today.getMonth() + 1;
  var year = today.getFullYear();

  if (date < 10) {
    date = '0' + date
  }
  if (month < 10) {
    month = '0' + month
  }

  today = year + '-' + month + '-' + date;
  $('#expiry_date').attr('min', today);
}

function dateOfBirth() {
  var today = new Date();
  var date = today.getDate() - 1;
  var month = today.getMonth() + 1;
  var year = today.getFullYear();

  if (date < 10) {
    date = '0' + date;
  }
  if (month < 10) {
    month = '0' + month;
  }

  maxDate = (year - 18) + '-' + month + '-' + date;
  minDate = (year - 100) + '-' + month + '-' + date;
  
  $('#modelDOB').attr('max', maxDate);
  $('#modelDOB').attr('min', minDate);
}
