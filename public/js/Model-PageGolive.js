$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var url = $("meta[name=reg_url]").attr("content");


   

function id_proof() {
    var url_Report = document.getElementById("url_Report").value;
    console.log(document.getElementById("url_Report").files);

    var form_data = new FormData();
    form_data.append("proof_url", document.getElementById("url_Report").files[0]);

    if (url_Report != "") {
        $('#modal-upload-video').css('display', 'block');
        $('#modal-upload-video').parent().css('display', 'block');
        $.ajax({
            url: url + "/save-incidents-document",
            method: "POST",
            data: form_data,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                if (data.doc_count_message) {
                    $('#user_Report').prop('readonly', true);
                }
                if (data.warning) {
                    alert(data.warning);
                    $('#user_Report').prop('readonly', false);
                }

                $('#modal-upload-video').css('display', 'none');
                $('#modal-upload-video').parent().css('display', 'none');
            }
        });
    }
    else {
        alert("Select file to upload.");
    }
}

function UploadReport() {
    var user_Report = document.getElementById('user_Report').value;
    var description_Report = document.getElementById('description_Report').value;

    var form_data = new FormData();
    form_data.append("user", user_Report);
    form_data.append("description", description_Report);

    if (description_Report.length < 10) {
        alert('Description is too short');
        return;
    }
    if (user_Report.trim() && description_Report.trim() != '') {
        $('#modal-upload-video').css('display', 'block');
        $('#modal-upload-video').parent().css('display', 'block');
        $.ajax({
            url: url + '/save-report-user',
            method: "POST",
            data: form_data,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                if (data.warning) {
                    alert(data.warning);
                    $("#user_Report").val("");
                    $("#description_Report").val("");
                    $("#url_Report").val("");  
                }
                if (data.failure) {
                    alert(data.failure);
                    $("#user_Report").val("");
                    $("#description_Report").val("");
                    $("#url_Report").val("");  
                }
                if (data.NoDoc) {
                    alert(data.NoDoc);
                    $("#user_Report").val("");
                    $("#description_Report").val("");
                    $("#url_Report").val("");  
                }
                if (data.success == 'yes') {
                    $('#td-temp').hide();
                    tableBody = $("table tbody");
                    tableBody.append($('<tr>')
                        .append($('<td>').append(data.sr_no))
                        .append($('<td>').append(data.incident_id))
                        .append($('<td>').append(data.user_name))
                        .append($('<td>').append(data.status))
                    )

                    $("#user_Report").val("");
                    $("#description_Report").val("");
                    $("#url_Report").val("");
                    alert('Your incident Report Successfully');
                }
                if (data.message) {
                    alert(data.message);
                }
                $('#user_Report').prop('readonly', false);
                $('#modal-upload-video').css('display', 'none');
                $('#modal-upload-video').parent().css('display', 'none');
            }
        });
    }
    else {
        alert('All fields are required');
    }
}
function clearData()
{
    $("#user_Report").val("");
    $("#description_Report").val("");
    $("#url_Report").val("");  
}
