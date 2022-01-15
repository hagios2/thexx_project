$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var url = $("meta[name=reg_url]").attr("content");

function UserRegistration() {
    var userName = document.getElementById("userName").value;
    var userEmail = document.getElementById("userEmail").value;
    var userPassword = document.getElementById("userPassword").value;
    var userPassword_confirmation = document.getElementById(
        "userPasswordConfirmation"
    ).value;
    var terms_condition_check = document.getElementById("checkTermsConditions");

    var mailFormat =
        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!userEmail.match(mailFormat)) {
        alert("You have entered an invalid email address!");
        return;
    }

    if (userPassword !== userPassword_confirmation) {
        alert("Password do not match");
    } else if (userPassword.length < 6) {
        alert("Password must be of minimum 6 characters");
    } else {
        if (userEmail != "" && userPassword !== "") {
            if (terms_condition_check.checked) {
                $.ajax({
                    type: "POST",
                    url: url + "/save-be-a-user-1",
                    data: {
                        userName: userName,
                        userEmail: userEmail,
                        userPassword: userPassword,
                    },

                    success: function (data) {
                        if (data.message) {
                            alert(data.message);
                        }
                        if (data.success == "yes") {
                            alert("registered succesfully");
                            window.location = url + "/be-a-user-2";
                        } else {
                            alert("email already exists");
                        }
                    },
                });
            } else {
                alert(
                    "Accept the terms and conditions by clicking on checkbox"
                );
            }
        } else {
            alert("All fields are required");
        }
    }
}

function UserUpdation() {
    var userEditName = document.getElementById("userEditName").value;
    var userEditEmail = document.getElementById("userEditEmail").value;
    var userEditPassword = document.getElementById("userEditPassword").value;
    var userEditConfirmPassword = document.getElementById(
        "userEditConfirmPassword"
    ).value;

    if (userEditPassword == "0" || userEditConfirmPassword == "0") {
        alert("Fields can't be empty");
        return;
    }
    if (userEditPassword !== userEditConfirmPassword) {
        alert("Password do not match");
        return;
    } else if (userEditPassword.length < 6) {
        alert("Password must be of minimum 6 characters");
        return;
    }

    $.ajax({
        type: "POST",
        url: url + "/account-user-update",
        data: {
            password: userEditPassword,
        },
        success: function (response) {
            if (response.success == "yes") {
                alert("Password Updated Successfully");
                window.location = url;
            }
        },
    });
}
