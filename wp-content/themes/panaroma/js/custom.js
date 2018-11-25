jQuery(document).ready(function($) {
			"use strict";
			jQuery('.strip-item').css({'width': $('.strip-menu').attr('data-width') + '%'});
			if (jQuery(window).width() > 1024) {
				var base_width = $('.strip-menu').attr('data-width');
				var count = $('.strip-menu').attr('data-count');
				$('section.strip-item').hover(function(){
					$('.strip-item').css('width', (100-base_width*2)/(count-1)+'%');
					$(this).css('width', base_width*2+'%');
				},function(){
					$('.strip-item').css('width', base_width+'%');				
				});
			}
			if (jQuery(window).width() > 760 && jQuery(window).width() < 1025) {
				jQuery('.wrapped_link').click(function(e) {
					if (!jQuery(this).parents('.strip-item').hasClass('hovered')) {
						var base_width = $('.strip-menu').attr('data-width');
						var count = $('.strip-menu').attr('data-count');						
						e.preventDefault();
						jQuery('.strip-item').removeClass('hovered');
						jQuery(this).parents('.strip-item').addClass('hovered');
						jQuery('.strip-item').css('width', (100-base_width*2)/(count-1)+'%');
						jQuery(this).parents('.strip-item').css('width', base_width*2+'%');
					}
				});
			}
		});	