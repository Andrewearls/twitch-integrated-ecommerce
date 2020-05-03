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
            alert(data);

        },
        error: function (e) {
            alert(e.response);
        }
    });
}
