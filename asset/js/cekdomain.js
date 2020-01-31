$(document).ready(function() {

    $('#domain').change(function() {
        var subdomain = $('#subdomain').val();
        var domain = $(this).val();
        var apikey = "at_nKmpnsfhkVRMUbGUuUiAJvqIajf2J";
        var dom = subdomain+"."+domain;
        //var baseurl = "<?php echo base_url(); ?>";

        //console.log(baseurl);

        if(subdomain==''){
            $.ajax({
                beforeSend: function() {
                    $('#domainsukses').html("<div class='text-center'><img class='img-fluid' src='"+baseurl+"asset/images/loading.gif' /></div>");
                },
                success: function(response) {
                    $("#domainsukses").html("<h5 class='pb-0 mb-0'>Bro :( Masukkan Nama Domain</h4>");
                    //var result = response["result"];
                    //console.log(result["subdistrict_id"]+';' + result["type"]);
                }
            });
            return false;
            
        }else{
            $.ajax({
                type: 'GET',
                url: 'https://domain-availability-api.whoisxmlapi.com/api/v1?apiKey='+apikey+'&domainName='+dom,
                beforeSend: function() {
                    $('#domainsukses').html("<div class='text-center'><img class='img-fluid' src='"+baseurl+"asset/images/loading.gif' /></div>");
                },
                success: function(response) {
                    var result = response["DomainInfo"]
                    if(result["domainAvailability"]=='AVAILABLE'){
                        //console.log("DOMAIN ADA");
                        $("#domainsukses").html("<h5 class='pb-0 mb-0'>Domain Anda Tersedia</h4> <p class='mb-1'> "+dom+" masih tersedia, segera gabung yuk</p> <a href='"+baseurl+"domain/"+dom+"' class='btn btn-danger btn-sm'>Gabung Yuk</a>");
                    }else{
                        //console.log("DOMAIN TIDAK ADA");
                        $("#domainsukses").html("<h5 class='pb-0 mb-0'>Yah :( Domain Anda Tidak Tersedia</h4> <p> "+dom+" tidak tersedia, pilih domain lain?</p>");
                    }
                    //console.log(result["domainAvailability"]);
                    //var result = response["result"];
                    //console.log(result["subdistrict_id"]+';' + result["type"]);
                }
            });
            return false;
        }
    });

    $('#cekdomain').click(function() {
        var subdomain2 = $('#subdomain2').val();
        var domain = $('#domain2').val();
        var apikey = "at_nKmpnsfhkVRMUbGUuUiAJvqIajf2J";
        var dom = subdomain2+"."+domain;
        //var baseurl = "<?php echo base_url(); ?>";

        //console.log(dom);

        if(subdomain2==''){
            $.ajax({
                beforeSend: function() {
                    $('#loaderdomain').html("<div class='text-center'><img class='img-fluid' src='"+baseurl+"asset/images/loading.gif' /></div>");
                },
                success: function(response) {
                    $("#resultdomain").fadeIn();
                    $("#domainsukses2").html("<h5 class='pb-0 mb-0'>Bro :( Masukkan Nama Domain</h4>");
                    $('#loaderdomain').empty();
                    $("#tomboldomain").hide();
                    //var result = response["result"];
                    //console.log(result["subdistrict_id"]+';' + result["type"]);
                }
            });
            return false;
            
        }else{
            $.ajax({
                type: 'GET',
                url: 'https://domain-availability-api.whoisxmlapi.com/api/v1?apiKey='+apikey+'&domainName='+dom,
                beforeSend: function() {
                    $('#loaderdomain').html("<div class='text-center'><img class='img-fluid' src='"+baseurl+"asset/images/loading.gif' /></div>");
                },
                success: function(response) {
                    var result = response["DomainInfo"]
                    if(result["domainAvailability"]=='AVAILABLE'){
                        //console.log("DOMAIN ADA");
                        $("#resultdomain").fadeIn();
                        var ringkasan = subdomain2+";"+domain+";155000";
                        //console.log(domain);
                        $("#domainsukses2").html("<h5 class='pb-0 mb-0'>Domain Anda Tersedia</h4> <p class='mb-1'> "+dom+" masih tersedia");
                        $("#tomboldomain").fadeIn();
                        $('#ringkasan').val(ringkasan);
                        $('#loaderdomain').empty();
                    }else{
                        //console.log("DOMAIN TIDAK ADA");
                        $("#resultdomain").fadeIn();
                        $("#domainsukses2").html("<h5 class='pb-0 mb-0'>Yah :( Domain Anda Tidak Tersedia</h4> <p> "+dom+" tidak tersedia, pilih domain lain?</p>");
                        $('#loaderdomain').empty();
                        $("#tomboldomain").hide();
                    }
                    //console.log(result["domainAvailability"]);
                    //var result = response["result"];
                    //console.log(result["subdistrict_id"]+';' + result["type"]);
                }
            });
            return false;
        }
    });

    $('#ceksubdomain').click(function() {
        var subdomain3 = $('#subdomain3').val();
        var domain = '.nusaserver.com';
        var dom = subdomain3+domain;
        //var baseurl = "<?php echo base_url(); ?>";

        //console.log(dom);

        if(subdomain3==''){
            $.ajax({
                beforeSend: function() {
                    $('#loaderdomain2').html("<div class='text-center'><img class='img-fluid' src='"+baseurl+"asset/images/loading.gif' /></div>");
                },
                success: function(response) {
                    $("#resultdomain2").fadeIn();
                    $("#domainsukses3").html("<h5 class='pb-0 mb-0'>Bro :( Masukkan Subdomain yg Valid</h4>");
                    $('#loaderdomain2').empty();
                    $("#tomboldomain2").hide();
                    //var result = response["result"];
                    //console.log(result["subdistrict_id"]+';' + result["type"]);
                }
            });
            return false;
            
        }else{
            $.ajax({
                type: 'POST',
                url: baseurl+'/mulai/ceksubdomain',
                data: {
                    subdomain: dom
                },
                beforeSend: function() {
                    $('#loaderdomain2').html("<div class='text-center'><img class='img-fluid' src='"+baseurl+"asset/images/loading.gif' /></div>");
                },
                success: function(response) {
                    var data = jQuery.parseJSON(response);
                    console.log(data.error);
                    //var result = response["DomainInfo"]
                    if(data.error=='0'){
                        //console.log("DOMAIN ADA");
                        $("#resultdomain2").fadeIn();
                        var ringkasan2 = subdomain3+";"+domain+";0";
                        //console.log(domain);
                        $("#domainsukses3").html("<h5 class='pb-0 mb-0'>Subdomain Anda Tersedia</h4> <p class='mb-1'> "+dom+" masih tersedia");
                        $("#tomboldomain2").fadeIn();
                        $('#ringkasan2').val(ringkasan2);
                        $('#loaderdomain2').empty();
                    }else{
                        //console.log("DOMAIN TIDAK ADA");
                        $("#resultdomain2").fadeIn();
                        $("#domainsukses3").html("<h5 class='pb-0 mb-0'>Yah :( Subdomain Anda Tidak Tersedia</h4> <p> "+dom+" tidak tersedia, pilih subdomain lain?</p>");
                        $('#loaderdomain2').empty();
                        $("#tomboldomain2").hide();
                    }
                    //console.log(result["domainAvailability"]);
                    //var result = response["result"];
                    //console.log(result["subdistrict_id"]+';' + result["type"]);
                }
            });
            return false;
        }
    });
})