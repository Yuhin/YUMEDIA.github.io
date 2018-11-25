jQuery(function($) {
    $(document).ready( function() {
        $('ul.sf-menu').superfish({
            autoArrows:  false
        });

        resizeDiv();
        var setsmallwidth = "100%";

        vpw = $(window).width();
        vph = $(document).height();

        if(vpw<648) {
            setsmallwidth = "100%";
        }
        $('.small_menu').click(function(){
             $( ".mobile-sidebar" ).animate({
                 width: setsmallwidth,
                 display:"block",
                 left: "0"
              }, 500,function(){resizeDiv();});

        });
        $('.close_sidebar').click(function(){
             $( ".mobile-sidebar" ).animate({
                 width: "0",
                 display:"block"
              }, 500);
        });


    });

function resizeDiv() {
    vpw = $(document).width();
    vph = $(document).height();
    $('.mobile-sidebar').css({'height': vph + 'px'});
}

});

