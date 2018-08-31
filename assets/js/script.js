$(document).ready(function(){
    
    // Expand Nav
    
    var navStatus = 0;
    
    $('#btn-nav-expand').click(function(){
        if(navStatus == 0){
            $('header').addClass('active');
            $('#btn-nav-expand').addClass('active');
            navStatus = 1;
        }
        
        else{
            $('header').removeClass('active');
            $('#btn-nav-expand').removeClass('active');
            navStatus = 0;
        }
    });
});