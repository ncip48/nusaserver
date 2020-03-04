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

    $("input[name='select']").change(function(){
        var tipe = $(this).val();
        $('#tipe').val(tipe);
    });

    $('#cek').submit(function() {

        $.ajax({
            type: 'POST',
            dataType: "json",
            url: baseurl+"main/cek",
            data: $(this).serialize(),
            beforeSend: function() {
                $('.code-wrap').block({ 
                    message: '<div class="loader"><div class="ball-grid-pulse"><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div></div></div>',
                    timeout:   2000
                }); 
            },
            success: function(response) {
                    setTimeout(function() {
                        var formattedData = JSON.stringify(response, null, '\t');
                        $('.code-wrap').html(syntaxHighlight(formattedData));
                    }, 2000);
                //}
            }
        });
        return false;
    });

    $('#cekuser').submit(function() {

        //var username = $('.username').val();
        
        $.ajax({
            type: 'post',
            dataType: "json",
            url: baseurl+"user/login/",
            data: $(this).serialize(),
            beforeSend: function() {
                $('.code-wrap').block({ 
                    message: '<div class="loader"><div class="ball-grid-pulse"><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div></div></div>',
                    timeout:   2000
                }); 
            },
            success: function(response) {
                    setTimeout(function() {
                        var formattedData = JSON.stringify(response, null, '\t');
                        $('.code-wrap').html(syntaxHighlight(formattedData));
                        $('#c').val(response.data.key);
                    }, 2000);
                //}
            }
        });
        return false;
    });

    $('#alluser').click(function() {
        
        $.ajax({
            type: 'get',
            dataType: "json",
            url: baseurl+"user",
            data: $(this).serialize(),
            beforeSend: function() {
                $('.code-wrap').block({ 
                    message: '<div class="loader"><div class="ball-grid-pulse"><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div></div></div>',
                    timeout:   2000
                }); 
            },
            success: function(response) {
                    setTimeout(function() {
                        var formattedData = JSON.stringify(response, null, '\t');
                        $('.code-wrap').html(syntaxHighlight(formattedData));
                    }, 2000);
                //}
            }
        });
        return false;
    });
    
});
