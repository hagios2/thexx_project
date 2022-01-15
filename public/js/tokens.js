$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var url = $('meta[name=reg_url]').attr('content');

function buyToken($id) {

  var package_id = $id.split('-')[1];
  var tokens = $('#' + $id).attr('data-token');
  var package_type = $('#' + $id).attr('data-type');
  var amount = $('#' + $id).attr('data-amount');
  var bonus = $('#' + $id).attr('data-bonus');

  if (package_type == '' || package_type == null) {
    package_type = tokens + ' tokens';
  }
  if (package_id && tokens && amount) {
    var securetoken = makeSecureTokenId(30);

    $.ajax({
      url: url + '/StoreDetailsSessionPayment',
      method: "POST",
      data: {
        'package_id': package_id,
        'tokens': tokens,
        'amount': amount,
        'bonus': bonus,
        'package_type': package_type,
        'securetoken': securetoken,
        'transaction_type': 'debit'
      },
      success: function (data) {
        if (data.status == 'yes') {
          window.location = 'https://thexxx.club/TokenPaymentRazorpay/token=' + securetoken;
        }
        else if (data.status == 'no') {
          alert('You need to Login first to buy the tokens.');
        }
      }
    });
  }
  else {
    alert("Something went wrong. Please refresh the page.");
  }
}

function makeSecureTokenId(length) {
  var result = '';
  var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}

$(document).ready(function() {

  $('.stream_buy_token').on('click', function() {
    var model_id = $(this).attr('data-id');

    $.ajax({
      url: url + '/buy-token',
      method: "POST",
      data: {
        'model_id': model_id
      },
      success: function (data) {
        if (data.status == 'no') {
          alert('You need to Login first to buy the tokens.');
        }
        else {
          window.location = url + '/wallet-charge-1';
        }
      }
    });
  });

  $('[data-open="modal-offer-gift"]').on('click', function() {
       // alert("modal-offer-gift");
    sendAnother($(this));
  });

  $('[data-open="modal-tips"]').on('click', function() {
     // alert("modal-tips");
    sendAnother($(this));
  });

  $('[data-open="modal-offer-gift-confirmation"]').on('click', function() {
    
     
     var gifts = $(this).attr('data-gift');
    //  alert(gifts);
     
     
    offerToken($(this));
  });

  $('[data-open="modal-tips-confirmation"]').on('click', function() {
      // alert("modal-tips-confirmation");
    offerToken($(this));
  });
});

function offerToken($this) {
  var tokens = $this.attr('data-token');
  var gifts = $this.attr('data-gift');
  //alert(gifts);
   $("#gift_change").text(gifts+"");
    //$('#gift_change').val(gifts);
  //alert(gifts);
    var model_id = $('#gift_model_id').val();
    if( tokens && model_id ) {
      $.ajax({
        url: url + '/send-token',
        method: "POST",
        data: {
          'tokens': tokens,
          'model_id': model_id,
        },
        success: function (data) {
          if (data.status == 'yes') {
           //alert('Token sent!!');
            // $(".data-injection").text(gifts);
          }
          else if (data.status == 'no') {
            alert('You need to Login first to buy the tokens.');
          }
          else if (data.status == 'no_token') {
             alert("no_token") ;
            sendAnother($('[data-open="modal-offer-gift"]'));
        
            
            sendAnother($('[data-open="modal-tips"]'));
            alert('You don\'t have enough token to send. Please buy token first');
          }
        }
      });
    }
    else {
      alert('Something went wrong. Please try again or refresh the page');
    }
}

function sendAnother($this) {
   // alert("here");
    
  $this.parents('.reveal-overlay').hide();
  $this.parents('.reveal-overlay').find('.gamification-panels').hide();
  
}