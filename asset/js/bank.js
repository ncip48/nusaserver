

$( document ).ready(function() {
    
    var form = new FormData();
    var settings = {
        "url": "https://mutasibank.co.id/api/v1/accounts",
        "method": "GET",
        "timeout": 0,
        "headers": {
            "Authorization": "NFBIZGhtcnhCUUNqRkcyVG1GbjNWcDdWblAxcndBcGdmUjhkU1k4TFVtbDduUjlFTHYxZWw2S0YzdVJ05e2aea6a2cde5"
        },
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
    });
});