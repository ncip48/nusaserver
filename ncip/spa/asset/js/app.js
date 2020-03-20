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
                    //$('#bulan').html("<p class='text-center'><a href='#' id='prevmo'><<</a><b> Bulan  "+data.getBulan+ "</b> <a href='#' id='nextmo'>>></a></p>");
                    //$('#periode').html("<p class='text-center'><a href='#' id='prev'>< Prev Week </a>"+data.tglawal + ' - ' + data.tglakhir + "<a href='#' id='next'> Next Week ></a></p>");
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
                    //$('#bulan').html("<p class='text-center'><a href='#' id='prevmo'><<</a><b> Bulan  "+data.getBulan+ "</b> <a href='#' id='nextmo'>>></a></p>");
                    //$('#periode').html("<p class='text-center'><a href='#' id='prev'>< Prev Week </a>"+data.tglawal + ' - ' + data.tglakhir + "<a href='#' id='next'> Next Week ></a></p>");
                    compute();
                }, 1000);
            }
        });
    });

    $("body").delegate("#nextmo", "click", function(){
        var hari = '30';
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
                    //$('#bulan').html("<p class='text-center'><a href='#' id='prevmo'><<</a><b> Bulan  "+data.getBulan+ "</b> <a href='#' id='nextmo'>>></a></p>");
                    //$('#periode').html("<p class='text-center'><a href='#' id='prev'>< Prev Week </a>"+data.tglawal + ' - ' + data.tglakhir + "<a href='#' id='next'> Next Week ></a></p>");
                    compute();
                }, 1000);
            }
        });
    });

    $("body").delegate("#prevmo", "click", function(){
        var hari = '30';
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
                    //$('#bulan').html("<p class='text-center'><a href='#' id='prevmo'><<</a><b> Bulan  "+data.getBulan+ "</b> <a href='#' id='nextmo'>>></a></p>");
                    //$('#periode').html("<p class='text-center'><a href='#' id='prev'>< Prev Week </a>"+data.tglawal + ' - ' + data.tglakhir + "<a href='#' id='next'> Next Week ></a></p>");
                    compute();
                }, 1000);
            }
        });
    });

    function compute() {
        var first = $('#tglnow').val();
        var idbook = $('#idbook').val();
        //alert (first);
        $.ajax({
            type: 'POST',
            url: baseurl+"main/validasi_tgl",
            data: {
                tgl: first,
                idbook: idbook
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

    $(function(){
        var replacePage = function(url) {
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'html',
                beforeSend: function() {
                    NProgress.set(0.4);
                },
                success: function(data){
                    setTimeout(function() {
                        NProgress.done();
                        var dom = $(data);
                        var html = dom.filter('.isi').html();
                        var header = dom.filter('header').html();
                        $('.isi').html(html);
                        $('header').html(header);
                        $('footer').hide();
                    }, 1000);
                }
            });
        }
    
        $(document.body).on('click', "a[rel='tab']" ,function(e){
            history.pushState(null, null, this.href);
            replacePage(this.href);
            e.preventDefault();
        });
    
        $(window).bind('ss', function(){
            replacePage(location.pathname);
        });

        $("body").delegate("#btnjam", "click", function(e){
            value = $(this).val();
            split = value.split(" ");
            var tgl = split[0];
            var jam = split[1];
            var curul = $('#cururl').val();
            var url = curul + "/date/" + tgl + "/" + jam;
            $('#jambooking').val(value+":00");
            history.pushState(null, null, url);
            replacePage(url);
            e.preventDefault();
        });
    });

});
