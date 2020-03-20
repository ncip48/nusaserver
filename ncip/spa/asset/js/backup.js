$(function(){
    $(document.body).on('click', "a[rel='tab']" ,function(e){
        //e.preventDefault(); 
        /*	
        if uncomment the above line, html5 nonsupported browers won't change the url but will display the ajax content;
        if commented, html5 nonsupported browers will reload the page to the specified link. 
        */
        
        //get the link location that was clicked
        pageurl = $(this).attr('href');
        
        //to get the ajax content and display in div with id 'content'
        $.ajax({url:pageurl+'?rel=tab',beforeSend: function() {
            NProgress.set(0.4);
            //$('#content').empty();
            //$('header').hide();
        },
        success: function(data){
            setTimeout(function() {
                NProgress.done()
                var dom = $(data);
                var html = dom.filter('.isi').html();
                $('.isi').html(html);
                //console.log(data);
                //$('#content').empty().html(data);
                //$('header').show();
            }, 1000);
        }});
        
        //to change the browser URL to 'pageurl'
        if(pageurl!=window.location){
            window.history.pushState({path:pageurl},'',pageurl);	
        }
        return false;  
    });
});

/* the below code is to override back button to get the ajax content without reload*/
$(window).bind('popstate', function() {
    //NProgress.start();
    $.ajax({url:location.pathname+'?rel=tab',beforeSend: function() {
        NProgress.set(0.4);
        //$('#content').empty();
        //$('header').hide();
    },
    success: function(data){
        setTimeout(function() {
            NProgress.done()
            var dom = $(data);
            var html = dom.filter('.isi').html();
            $('.isi').html(html);
            //console.log(data);
            //$('#content').empty().html(data);
            //$('header').show();
        }, 1000);
    }});
});