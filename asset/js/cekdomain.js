$(document).ready(function() {

    $('#domain').change(function() {
        var subdomain = $('#subdomain').val();
        var domain = $(this).val();
        var apikey = "at_nKmpnsfhkVRMUbGUuUiAJvqIajf2J";
        var dom = subdomain+"."+domain;
        //var baseurl = "<?php echo base_url(); ?>";

        console.log(baseurl);

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

    $('#domain2').change(function() {
        var subdomain2 = $('#subdomain2').val();
        var domain = $(this).val();
        var apikey = "at_nKmpnsfhkVRMUbGUuUiAJvqIajf2J";
        var dom = subdomain2+"."+domain;
        //var baseurl = "<?php echo base_url(); ?>";

        console.log(baseurl);

        if(subdomain2=='' || domain=='none'){
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
                        $("#domainsukses2").html("<h5 class='pb-0 mb-0'>Domain Anda Tersedia</h4> <p class='mb-1'> "+dom+" masih tersedia");
                        $("#tomboldomain").fadeIn();
                        $('#ringkasan').val(ringkasan);
                        $('#loaderdomain').empty();
                    }else{
                        //console.log("DOMAIN TIDAK ADA");
                        $("#domainsukses2").html("<h5 class='pb-0 mb-0'>Yah :( Domain Anda Tidak Tersedia</h4> <p> "+dom+" tidak tersedia, pilih domain lain?</p>");
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