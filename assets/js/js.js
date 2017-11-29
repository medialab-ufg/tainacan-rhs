$(document).ready(function () {

    $(".navbar-toggle").on('click',function(){
        
        if($('.navbar-toggle').hasClass('active') ) {
            $('#navbar6').css({display : "none"});
            $(this).toggleClass("active");
        }
        else{
            $(this).toggleClass("active");
            $('#navbar6').css({display : "block"});
        }
    });

});