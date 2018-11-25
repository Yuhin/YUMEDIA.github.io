jQuery.noConflict();
jQuery(function($) {
    $(document).ready( function() {
        $('ul.sf-menu').superfish({
            autoArrows:  false
        });
        
        $("#s").attr("placeholder","ПОИСК");
        
        resizeDiv();
        var setsmallwidth = "25%";
        var setsidebarwidth = "5%";

        vpw = $(window).width();
        vph = $(document).height();

        if(vpw<648) {
            setsmallwidth = "100%";
            setsidebarwidth = "10%";
        }
        $('.small_menu').click(function(){
            $( ".main-sidebar" ).addClass("opened");
            $(".main-sidebar").addClass("display_assets");
             $( ".main-sidebar" ).animate({
                 width: setsmallwidth,
                 maxWidth: "none",
                 display:"block",
                 right: "0"
              }, 500,function(){
                 resizeDiv();
             });

        });
        $('.close_sidebar').click(function(){
            $(".main-sidebar").removeClass("display_assets");
             $( ".main-sidebar" ).animate({
                 width: setsidebarwidth,
                 display:"block"
              }, 500,function() {
                $(this).removeClass("opened");    
             });
        });
        
        if($("body").hasClass("home")) {
            $('.grid-item').hover(function() {
                $(this).find('img').removeClass("desaturate");
            },
            function() {
                $(this).find('img').addClass("desaturate");
            });
        }
    
      });    
    
    function resizeDiv() {
        vpw = $(document).width();
        vph = $(document).height();
        $('.mobile-sidebar').css({'height': vph + 'px'});
    }
    
    /********** jQuery Isotope Filterable Portfolio  **********/
    
    if($("body").hasClass("home")) { gutterWidth = 0;  columnWidth = 300; }
    else { gutterWidth = 10;  columnWidth = 300;}
    
    $('.grid').isotope({
      itemSelector: '.grid-item',
      isOriginLeft: false,
      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: columnWidth,
        gutter: gutterWidth
      }
    })

	/********** jQuery Isotope Filterable Portfolio  **********/
    
    /********** sticky Header  **********/
      $(window).scroll(function() {
      if ($(this).scrollTop() > $(window).height() - $('header').height()){
          $('header').addClass("sticky");
        }
        else{
          $('header').removeClass("sticky");
        }
      });
});

