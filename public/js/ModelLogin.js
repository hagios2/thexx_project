$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var url = $('meta[name=reg_url]').attr('content');

function SubmitLogin() {

  $('#load').text('Loading...').show();
  var email = document.getElementById('email').value;
  var password = document.getElementById('pwd').value;

  if (email !== '' && password !== '' && password.length >= 6) {

    $.ajax({
      type: 'POST',
      url: url + '/logged_in',
      data: {
        'email': email,
        'password': password,
      },
      success: function (data) {
        if (data.success == 'yes_model') {
          window.location.href = "/page-startshow-golive";
        }
        else if(data.success == 'yes_user')
        {
          window.location.href = "/";
        }
        else {
          if (data.status == 'disabled') {
            $('#load').text('Your account is disabled. Contact to Admin');
          }
          else if (data.status == 'pending') {
            $('#load').text('Your account is pending from Admin. Please wait for sometime.');
          }
          else if (data.status == 'nomatch') {
            $('#load').text('Credentials not matched. Try again');
          }
        }
      }
    });
  }
  else {
    if (email !== '' && password.length < 6) {
      alert('Minimum 6 characters allowed in password field');
    }
    else {
      alert('All fields required');
    }
  }
}

function ResetPassword() {

  $('#load_reset').show();
  $('a').attr('data-open', '');

  var emailResetPwd = document.getElementById('Email_ResetPwd').value;

  var mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (!emailResetPwd.match(mailFormat)) {
    alert("You have entered an invalid email address!");
    return;
  }

  $.ajax({
    type: 'POST',
    url: url + '/resetPassword',
    data: {
      'emailResetPwd': emailResetPwd,
    },
    success: function (data) {
      if (data.email_success == 'yes') {
        alert("Password has been sent to your mail. Please check");
        $('#load_reset').hide();
      }
      if (data.email_success == 'no') {
        alert("Password not sent to your mail. Something went wrong. Please try again");
        $('#load_reset').hide();
      }
      if (data.error_message == 'yes') {
        alert(data.error_message);
        $('#load_reset').hide();
      }
    }
  });
}

function disabledAccount() {
  var text = $('#disabled_text').val();

  if (text !== 'DISABLE MY ACCOUNT') {
    setTimeout(function() {
      $('#modal-disable-account').hide();
      $('#modal-disable-account').parent().hide();
      alert('Type correct Text to continue.');
    }, 1000);
  }
}

$(document).ready(function() {
  $('#cancel_disabled').on('click', function() {
    $('#modal-disable-account').hide();
    $('#modal-disable-account').parent().hide();
    $('#disabled_text').val('');
  })
  $('#account_disabled').on('click', function() {
    $.ajax({
      type: 'POST',
      url: url + '/disabled_account',
      data: {
        'status': 2,
      },
      success: function (data) {
        if (data.success == 'yes') {
          window.location = '/';
        }
        else if (data.success == 'no') {
          alert('You need to login first...');
        }
      }
    });
  })
});
