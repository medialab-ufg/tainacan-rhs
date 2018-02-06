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

    checkBreadcrumb();
    
});

function checkBreadcrumb () {
    var element_to_check = '#tainacan-breadcrumbs a';
    if($(element_to_check).is(':visible')){ 
        $(element_to_check).first().text('Acervo');
    } else {
      setTimeout(checkBreadcrumb, 50); //wait 50 ms, then try again
    }
  }

function display_view_main_page() {
    $.ajax({
        url: $("#src").val() + '/controllers/home/home_controller.php', type: 'POST',
        data: {operation: 'display_view_main_page'}
    }).done(function (result) {
        $("#loader_collections").hide('slow');
        $("#display_view_main_page").html(result);
        $(".home-container").children(".pdf").find(".row").removeClass("row");
    });
}