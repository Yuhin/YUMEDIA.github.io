jQuery(document).ready(function($) {

    // Enable offcanvasMuscle()
    offcanvasMuscle();

    // Toggle Comment Form
    $(".comment-reply-title").on("click", function() {

        if ($(".comment-form").is(":hidden")) { // :visible
            $(this).toggleClass('active');
            $(".comment-form").slideDown("slow");
            $(".comment-form #comment").focus();
        }
    });

    // Toggle Search Form on Footer
    $(".search-header").on("click", function() {
        $(this).toggleClass('active');
        $("#search-header-bar").slideToggle("fast");
    });

    // Prettyphoto - for desktops only
    if ($(window).width() > 767) {

        // PrettyPhoto Without gallery
        $("a[rel^='lightbox']").prettyPhoto({
            show_title: false,
            social_tools: false,
            slideshow: false,
            autoplay_slideshow: false,
            wmode: 'opaque'
        });

        // PrettyPhoto With Gallery
        $("a[rel^='LightboxGallery']").prettyPhoto({
            show_title: false,
            social_tools: false,
            autoplay_slideshow: false,
            overlay_gallery: true,
            wmode: 'opaque'

        });

    } // END if Prettyphoto - for desktops only

    // Touch
    if (!("ontouchstart" in document.documentElement)) {
        document.documentElement.className += " no-touch";
    }

    // Enable FitVids.js
    $("#content").fitVids();

    // Scroll Up
    $("#scroll-up").hide();
	if ($(window).width() > 767) {
    		$(window).scroll(function() {
        			if ($(this).scrollTop() > 1000) {
            				$('#scroll-up').fadeIn();
        			} else {
            				$('#scroll-up').fadeOut();
        			}
    		});
    		$('a#scroll-up').click(function() {
        			jQuery('body,html').animate({
            				scrollTop: 0
        					}, 800);
        				return false;
    		});
	}

}); // END