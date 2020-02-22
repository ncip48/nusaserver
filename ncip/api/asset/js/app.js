$(document).ready(function() {

    function syntaxHighlight(json) {
        json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
            var cls = 'number';
            if (/^"/.test(match)) {
                if (/:$/.test(match)) {
                    cls = 'key';
                } else {
                    cls = 'string';
                }
            } else if (/true|false/.test(match)) {
                cls = 'boolean';
            } else if (/null/.test(match)) {
                cls = 'null';
            }
            return '<span class="' + cls + '">' + match + '</span>';
        });
    }


    var obj = {a:1, 'b':'foo', c:[false,'false',null, 'null', {d:{e:1.3e5,f:'1.3e5'}}]};
    var str = JSON.stringify(obj, undefined, 4);
    //output(syntaxHighlight(str));

//$('.code-wrap2').text(syntaxHighlight(str));

    $('#cek').submit(function() {
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: baseurl+"main/cek",
            data: $(this).serialize(),
            success: function(response) {
                //console.log(response)
                //if (response.status==false) {
                    //$('#hasil').html(response.error);
                //} else {
                    //$.each(response.data, function(i, item) {
                        //console.log(item.nama_provinsi);
                        //$('#hasil').append(item.nama_provinsi+"<br>");
                    //});
                    $('#hasil').html(response);
                    var formattedData = JSON.stringify(response, null, '\t');
                    //$('.code-wrap').text(formattedData);
                    $('.code-wrap').html(syntaxHighlight(formattedData));
                    //console.log(response.data.nama_provinsi)
                //}
            }
        })
        return false;
    });
    
});