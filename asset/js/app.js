
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
                $('.panelregister').hide();
                $('#aksiregister').html(data);
            }
        })
        return false;
    });

    $('#btnLogout').click(function(){
        var urllogout = baseurl+'members/logout';
        $.ajax({
			url: urllogout,
			success: function(data) {
                $('#aksilogout').html(data);
			}
		})
		return false;
    });

    $('#frmKonfirmasi').submit(function() {
        var form = $('form')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
          data: formData,
          contentType: false,
          processData: false,
                success: function(response) {
                    var data = jQuery.parseJSON(response);
                    //var data = jQuery.parseJSON(response);
                    //console.log(data);
                    $('#konfirmasi').html(data.error);
                    
                }
            })
            return false;
        });

    
    
})
