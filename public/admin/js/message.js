function sendMessage(message) {
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: {
            message: message
        },
        success: function (data) {
            alert('Success');

        },
        error: function () {
            alert('Error');
        }
    });
}
