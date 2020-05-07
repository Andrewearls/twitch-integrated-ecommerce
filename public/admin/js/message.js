function handleSuccess(data) {
    // each page will handle a success differently
    // this function should be overwritten 
    // by the the page calling message.js
}

function sendMessage(message, url) {
    // console.log(url);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token: CSRF_TOKEN,
            message: message
        },
        success: function (data) {
            handleSuccess(data);

        },
        error: function (e) {
            alert(e.response);
        }
    });
}
