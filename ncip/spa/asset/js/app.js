$(document).ready(function() {

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

    $("body").delegate("#next", "click", function(){
        var hari = '7';
        var tgl = $('#tglnow').val();
        $.ajax({
            type: 'POST',
            url: baseurl+"main/tgl_plus",
            data: {
                hari: hari,
                tgl: tgl
            },
            beforeSend: function() {
                $('.bungkus').block({ 
                    message: '<div class="loader"><div class="ball-grid-pulse"><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div></div></div>',
                    timeout:   1000
                }); 
            },
            success: function(response) {
                //$('#tgl').val('');
                //$('#tgl').val("");
                //console.log(response);
                //$('#hasil').append(response);
                setTimeout(function() {
                    var data = jQuery.parseJSON(response);
                    $('#tglnow').val(data.tgltuju);
                    $('#periode').html("<p class='text-center'><a href='#' id='prev'>< Prev Week </a>"+data.tglawal + ' - ' + data.tglakhir + "<a href='#' id='next'> Next Week ></a></p>");
                    compute();
                }, 1000);
            }
        });
    });

    $("body").delegate("#prev", "click", function(){
        var hari = '7';
        var tgl = $('#tglnow').val();
        $.ajax({
            type: 'POST',
            url: baseurl+"main/tgl_min",
            data: {
                hari: hari,
                tgl: tgl
            },
            beforeSend: function() {
                $('.bungkus').block({ 
                    message: '<div class="loader"><div class="ball-grid-pulse"><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div><div style="background-color: #fff;"></div></div></div>',
                    timeout:   1000
                }); 
            },
            success: function(response) {
                setTimeout(function() {
                    var data = jQuery.parseJSON(response);
                    $('#tglnow').val(data.tgltuju);
                    $('#periode').html("<p class='text-center'><a href='#' id='prev'>< Prev Week </a>"+data.tglawal + ' - ' + data.tglakhir + "<a href='#' id='next'> Next Week ></a></p>");
                    compute();
                }, 1000);
            }
        });
    });

    function compute() {
        var first = $('#tglnow').val();
        //alert (first);
        $.ajax({
            type: 'POST',
            url: baseurl+"main/validasi_tgl",
            data: {
                tgl: first
            },
            success: function(response) {
                $('#sebelum').hide();
                //console.log(response);
                $('#hasil').html(response);
                //$('#tgl').val('');
                //$('#tgl').val("");
                //console.log(response);
                //$('#hasil').append(response);
                //var data = jQuery.parseJSON(response);
                //console.log(data[0].output);
                //for (var i = 0, len = data.length; i < len; i++) {
                    //console.log(data[i].label);
                    //$('#hasil').append(data[i].nama_hari+"<input type='radio' id='tgl' name='tgl' value='"+data[i].output+"'><label for='tgl'>"+data[i].label+"</label>");
                //}
            }
        });
    }

    $("body").delegate("#btnjam", "click", function(){
        var value = $(this).val();
        console.log(value);
    });
    
});
