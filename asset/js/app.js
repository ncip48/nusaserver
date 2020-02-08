
$(document).ready(function() {
    $('#frmLogin').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(response) {
                var data = jQuery.parseJSON(response);
                //console.log(data);
                $('#aksilogin').html(data.error);
                if (data.result=='1'){
                    var delay = 2000; 
                    var url = baseurl+"mulai";    
                    setTimeout(function(){ window.location = url; }, delay);
                }
                //console.log(data);
                //$('#reloading').html(data);
                //$('#reloadcontent').hide();
			}
		})
		return false;
    });
    
    $('#frmRegister').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            beforeSend: function(){
                $('#loadingzz').html("<img class='loading' src='"+baseurl+"asset/images/loading.gif' />");
            },
            success: function(data) {
                $('#panelregister').hide();
                $('#aksiregister').html(data);
            }
        })
        return false;
    });

    $('#btnLogout').click(function(){
        var urllogout = '<?php echo base_url() ?>members/logout';
        console.log(urllogout);
        $.ajax({
			    url: urllogout,
			    success: function(data) {
            $('#aksilogout').html(data);
            //console.log(data);
            //$('#reloading').html(data);
            //$('#reloadcontent').hide();
			    }
		    })
		    return false;
      });
})