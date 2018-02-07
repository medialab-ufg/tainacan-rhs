$(document).ready(function () {
    $("#btn-toggle-menu").on('click',function(){
        var element_to_collapse = '.user-actions';

        if($(element_to_collapse).hasClass('in')) {
            $(element_to_collapse).hide();
            $(element_to_collapse).removeClass('in');
        } else {
            $(element_to_collapse).collapse('show');
            $(element_to_collapse).addClass('in');
            $(element_to_collapse).show();
        }
    });

    checkBreadcrumb();
    
});

function checkBreadcrumb() {
    var element_to_check = '#tainacan-breadcrumbs a';
    if($(element_to_check).is(':visible')){ 
        $(element_to_check).first().text('Acervo');
    } else {
        setTimeout(checkBreadcrumb, 50);
    }
}

function remove_share() {
    $('.row .tainacan-museum-clear').hide();
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