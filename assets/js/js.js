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

function display_view_main_page() {
    $.ajax({
        url: $("#src").val() + '/controllers/home/home_controller.php', type: 'POST',
        data: {operation: 'display_view_main_page'}
    }).done(function (result) {
        $("#loader_collections").hide('slow');
        $("#display_view_main_page").html(result);
        $("#display_view_main_page").find(".home-container").addClass("container");
        $(".home-container").children(".pdf").find(".row").addClass("container");
    });
}