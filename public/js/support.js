$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var url = $("meta[name=reg_url]").attr("content");

function Support() {
    
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var comment = document.getElementById("comment").value;
    

    

    var mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!email.match(mailFormat)) {
        alert("You have entered an invalid email address!");
        return;
    }

    if (name == "" || comment == "") {
        alert("Fields can't be empty");
        return;
    }

    $.ajax({
        type: "POST",
        url: url + "/support-user",
        data: {
            name: name,
            email: email,
            comment: comment,
        },
        success: function (response) {
            alert("Submited Successfully");
            // if (response.success == "yes") {
            //     window.location = url;
            // }
        },
    });
}