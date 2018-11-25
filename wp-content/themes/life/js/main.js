/*
	Name: TheBlogger
	Description: Shape-Shifter Blog Theme
	Version: 1.0
	Author: pixelwars
*/

(function($) { "use strict"; 
	
	/* global variables */
	var $masonry_container;
	

	// DOCUMENT READY
	$(function() {
		
		
		// FIX SIDEBAR INSTAGRAM
		$('.sidebar .instagram-pics').wrap('<div class="instagram-pics-wrap"></div>');
		$('.sidebar .null-instagram-feed > p').appendTo($('.instagram-pics-wrap'));
		
		
		// FORMS
		$('input:not([type=submit]):not([type=button]):not([type=file]):not([type=radio]):not([type=checkbox])').addClass('input-text');
		
				

		// ------------------------------
		// STICKY MENU
		if($('html').hasClass('is-menu-sticky')) {
			
			// the element to be sticky
			var theElement = $('html').hasClass('is-menu-bar') ? $('.site-navigation') : $('.site-header');
			
			// variables
			var smart,
				$orgElement,
				$clonedElement,
				orgElementTop,
				currentScroll,
				previousScroll = 0,
				scrollDifference,
				detachPoint = 650, // point of detach (after scroll passed it, menu is fixed)
				hideShowOffset = 6, // scrolling value after which triggers hide/show menu
				$html = $('html');

				
			// Create a clone of the menu, right next to original.
			theElement.addClass('original').clone().insertAfter(theElement).addClass('cloned').removeClass('original');
			
			$orgElement = $('.original'); 
			$clonedElement = $('.cloned'); 
			
			
			smart = $('html').hasClass('is-menu-smart-sticky');
			
			// fix css max-width issue for the fixed positioned clone element
			$clonedElement.width($orgElement.width());
			$( window ).on( "resize", function() {
				$clonedElement.width($orgElement.width());
			});
			
			$( window ).on( "scroll", function() {
				
				currentScroll = $(this).scrollTop(), // gets current scroll position
				scrollDifference = Math.abs(currentScroll - previousScroll); // calculates how fast user is scrolling
				
				// fix css max-width issue for the fixed positioned clone element
				$clonedElement.width($orgElement.width());
							
				if (window.matchMedia("(min-width: 992px)").matches) {
					
					  orgElementTop = $orgElement.offset().top;  
								   
					  // Scrolled past the original position; now only show the cloned, sticky element.
					  if (currentScroll >= (orgElementTop)) {
						  
						
						// if : SMART STICKY 
						if(smart) {
							
								// if scrolled past detach point add class to fix menu
								if (currentScroll > detachPoint) 
								{
									if (!$html.hasClass('menu-detached')) {
										$html.addClass('menu-detached');
										}
								}
								  
								// if scrolling faster than hideShowOffset hide/show menu
								if (scrollDifference >= hideShowOffset) 
								{
									// scrolling down; hide menu  
									if (currentScroll > previousScroll) 
									{
										if (!$html.hasClass('menu-invisible'))
											$html.addClass('menu-invisible');
									} 
									// scrolling up; show menu
									else 
									{
										if ($html.hasClass('menu-invisible'))
											$html.removeClass('menu-invisible');
									}
								}
						} // if : smart
						
						
						// else : NORMAL STICKY
						else {
							$clonedElement.addClass('is-visible');
							$orgElement.addClass('is-hidden');
						}
						
					  }
					  // Scrolled past the original position; now only show the cloned, sticky element.
					  
					  
					  // NOT scrolled past the menu; only show the original menu.
					  else 
					  {
						$clonedElement.removeClass('is-visible');
						$orgElement.removeClass('is-hidden');
						
						if(smart) {
							$html.removeClass('menu-detached').removeClass('menu-invisible');
						} // if : smart
						
					  } 
					  // NOT scrolled past the menu; only show the original menu.
					  
					  
					  // replace previous scroll position with new one
					  previousScroll = currentScroll;
					  
					
					
				} // > 991
			  
			}); // window on scroll
			
		} // STICKY MENU 
		// ------------------------------	
		
		// ------------------------------
		// STICKY: HEADER ROW & HEADER SMALL
		window.addEventListener('scroll', function(e){
			var distanceY = window.pageYOffset || document.documentElement.scrollTop,
				shrinkOn = 300,
				header = $('.is-header-row.is-menu-sticky .site-header.cloned, .is-header-small.is-menu-sticky .site-header.cloned');
			if (distanceY > shrinkOn) {
				header.addClass("smaller");
			} else {
				if (header.hasClass("smaller")) {
					header.removeClass("smaller");
				}
			}
		});
		// ------------------------------



		// ------------------------------	
        // SEARCH TOGGLE
        $('.search-toggle').on("click", function(e) {
            e.stopPropagation();
			var search_input = $(this).parent().find('.search-container input[type="search"]');
            $('html').toggleClass('is-search-toggled-on');
			if($('html').hasClass('is-search-toggled-on')) {
				setTimeout(function() { search_input.trigger('focus'); },400);
			}
        });
        // ------------------------------
		


		// ------------------------------	
        // HEADER MENU TOGGLE
        $('.menu-toggle').on("click", function(e) {
            e.stopPropagation();
            $('html').toggleClass('is-menu-toggled-on');
        });
        // ------------------------------
		
		
		// ------------------------------
		// MOBILE MENU
		var $menu = $('.nav-menu');
		
		// add classes
		$menu.find('li').each(function(index, element) {
			if($(this).children('ul').length) {
				$(this).addClass('has-submenu');
				$(this).find('>a').after('<span class="submenu-toggle"></span>');
			}
		});
		
		var $submenuTrigger = $('.has-submenu > .submenu-toggle');
		// submenu link click event
		$submenuTrigger.on( "click", function() {
			$(this).parent().toggleClass('active');
			$(this).siblings('ul').toggleClass('active');
		});
		// ------------------------------
		
		
		
		/* Slider more-link clone */
		$('.post-thumbnail .entry-header .more-link').each(function(index, element) {
            $(this).clone().appendTo($(this).parents('.post-wrap')).addClass('outside');
        });
		
		
		// ------------------------------
        // OWL-CAROUSEL
		var owl = $('.owl-carousel');
		if(owl.length) {
			owl.each(function(index, element) {
				//wait for images
				$(element).imagesLoaded( function() {
					
					//remove loading
					$(element).find('.loading').remove();
					
					var items = $(element).data('items');
					$(element).owlCarousel({
						mouseDrag : 		$(element).data('mouse-drag'),
						pagination : 		$(element).data('dots'),
						navigation : 		$(element).data('nav'),
						autoPlay : 			$(element).data('autoplay') ? $(element).data('autoplay-timeout') : false,
						stopOnHover :		true,
						navigationText : 	false,
						slideSpeed : 300,
						rewindSpeed : 400,
						autoHeight : true,
						transitionStyle : $(element).data('animation'), // default = false(slide) / fade - backSlide - goDown - fadeUp 
						itemsCustom : 		[[0, 1], [700, items <= 2 ? items : 2], [960, items <= 3 ? items : 3], [1260, items <= 4 ? items : 4]],
						afterInit : function() {
							
							
							// ------------------------------
							// PARALLAX
							var $container = $('.post-slider');
							$('.post-slider .post-thumbnail').each(function() {
								if($(this).data('parallax-video')) { //parallax video
									$(this).jarallax({
										speed: 0,
										zIndex: 1,
										elementInViewport: $container,
										videoSrc: $(this).data('parallax-video')
									});	
								} else if($('html').hasClass('is-slider-parallax')) { //parallax image
								   $(this).jarallax({
									  elementInViewport: $container,
									  zIndex : 1,
									  speed: 0.6
								   });
								} // else if
							}); // each
							// ------------------------------
							
							
						} // afterInit
					}); // owlCarousel()

				}); // wait for images
			});	// owl.each()
		}
		// ------------------------------
		
		
		
		
		// ------------------------------
		// Fitvids.js : fluid width video embeds
		$("body").fitVids({ customSelector: 'iframe[src*="facebook.com/plugins/video"], iframe[src*="facebook.com/video/embed"]' });
		// preserve 16:9 aspect ratio for soundcloud embeds
		$('iframe[src*="soundcloud.com"]').wrap('<div class="fluid-audio fluid-width-video-wrapper"></div>');
		$('.fluid-width-video-wrapper').wrap('<div class="media-wrap"></div>');
		// ------------------------------
			
		
		// ------------------------------
		// FluidBox : Zoomable Images
		setupFluidbox();
        // ------------------------------
		
		
		// ------------------------------
		// remove click delay on touch devices
		FastClick.attach(document.body);
		// ------------------------------
		
		
		
		// ------------------------------
		// FORM VALIDATION
		// comment form validation fix
		$('#commentform, .post-password-form, .mc4wp-form form, .mc4wp-form').addClass('validate-form');
		$('#commentform').find('input,textarea').each(function(index, element) {
            if($(this).attr('aria-required') == "true") {
				$(this).addClass('required');
			}
			if($(this).attr('name') == "email") {
				$(this).addClass('email');
			}
		});
		
		// validate form
		if($('.validate-form').length) {
			$('.validate-form').each(function() {
					$(this).validate();
				});
		}
		// ------------------------------
        
        
        
		// ------------------------------
		/* SOCIAL FEED WIDGET */
		var socialFeed = $('.social-feed');
		if(socialFeed.length) {
			socialFeed.each(function() {
				$(this).socialstream({
					socialnetwork: $(this).data("social-network"),
					limit: $(this).data("limit"),
					username: $(this).data("username")
				});
			});	
		}
		// ------------------------------
		
		
		// ------------------------------
		// GALLERY COLLAGE LAYOUT
		collage();
		
		var resizeTimer = null;
		$(window).bind('resize', function() {
			
			// hide all the images until we resize them
			// set the element you are scaling i.e. the first child nodes of ```.Collage``` to opacity 0
			$('.gallery figure').css("opacity", 0);
			// set a timer to re-apply the plugin
			if (resizeTimer) clearTimeout(resizeTimer);
			resizeTimer = setTimeout(collage, 1200);
			collage();
		});
		// ------------------------------
		
		
		// ------------------------------
		// LIGHTBOX - applied to gallery post format  a[href*=".jpg"]
		if($('.lightbox, .gallery, .portfolio-grid .hentry-middle, .portfolio-grid .featured-image').length) {
			$('.lightbox, .gallery,  .portfolio-grid .hentry-middle, .portfolio-grid .featured-image').each(function(index, element) {
				var $media_box = $(this);
				$media_box.magnificPopup({
				  delegate: '.lightbox, .gallery-item a, .portfolio-grid .lightbox',
				  type: 'image',
				  image: {
					  markup: '<div class="mfp-figure">'+
								'<div class="mfp-close"></div>'+
								'<div class="mfp-img"></div>'+
							  '</div>' +
							  '<div class="mfp-bottom-bar">'+
								'<div class="mfp-title"></div>'+
								'<div class="mfp-counter"></div>'+
							  '</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button
					
					  cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor. 
					  verticalFit: true, // Fits image in area vertically
					  tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
					},
					gallery: {
					  enabled:true,
					  tCounter: '<span class="mfp-counter">%curr% / %total%</span>' // markup of counter
					},
				  iframe: {
					 markup: '<div class="mfp-iframe-scaler">'+
								'<div class="mfp-close"></div>'+
								'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
								'<div class="mfp-title">Some caption</div>'+
							  '</div>'
				  },
				  mainClass: 'mfp-zoom-in',
				  tLoading: '',
				  removalDelay: 300, //delay removal by X to allow out-animation
				  callbacks: {
					markupParse: function(template, values, item) {
						  var title = "";
						  if(item.el.parents('.gallery-item').length) {
							  title = item.el.parents('.gallery-item').find('.gallery-caption').text();	  
						  } else {
							  title = item.el.attr('title') == undefined ? "" : item.el.attr('title');
							  }
						  //return title;
					 	values.title = title;
					},
					imageLoadComplete: function() {
					  var self = this;
					  setTimeout(function() {
						self.wrap.addClass('mfp-image-loaded');
					  }, 16);
					},
					close: function() {
					  this.wrap.removeClass('mfp-image-loaded');
					},
					beforeAppend: function() {
						var self = this;
						this.content.find('iframe').on('load', function() {
						  setTimeout(function() {
							self.wrap.addClass('mfp-image-loaded');
						  }, 16);
						});
					 }
				  },
				  closeBtnInside: false,
				  closeOnContentClick: true,
				  midClick: true
				});
			});	
		}
		// ------------------------------
		
		
		
		// ------------------------------
		// MASONRY - ISOTOPE
		$masonry_container = $('.masonry');
		if($masonry_container.length) {
			$masonry_container.imagesLoaded(function() {
				$masonry_container.width($masonry_container.parent().width());
				// initialize isotope
				$masonry_container.isotope({
				  itemSelector : '.hentry',
				  layoutMode : $masonry_container.data('layout'),
				  //transitionDuration: 0
				});
				
				
				// filters
				if ($masonry_container.data('isotope')) {
					var filters = $('.filters');
					if(filters.length) {
						filters.find('a').on("click", function() {
							//alert('hoyt');
							var selector = $(this).attr('data-filter');
							  $masonry_container.isotope({ filter: selector });
							  $(this).parent().addClass('current').siblings().removeClass('current');
							  return false;
						});
					}
				}
				
				setMasonry();
				setTimeout(function() { $masonry_container.isotope(); }, 20);	
				$(window).resize(function() {
					// hack : make container width fixed
					$masonry_container.width($masonry_container.parent().width());
					setMasonry();					
				});
			});
		}
		// ------------------------------
		
        
		
		// ------------------------------
		// POST THUMBNAILS
        if($('.post-thumbnail').length) {
					
			var fixWaitTime;
			$(window).on('resize', function () { 
				clearTimeout(fixWaitTime);
				fixWaitTime = setTimeout(function() { 
					fixText(); 
				} , 500);
			});	
			
		  setTimeout(function() { 
		  	fixText();
			} , 300);
        }
		// ------------------------------
		
		
		
	
		// ------------------------------
        // FULL WIDTH IMAGES
		fullWidthImages();
		// ------------------------------
		
		
		// ------------------------------
		// HOME LANDING FULLSCREEN VIDEO
		var fs_video = $('.intro-vid');
		if(fs_video.length) {
			//fs_video.wrap( "<div class='fs-video'></div>" );
			//fs_video = $('.fs-video');
			bgVideo(fs_video);
			$( window ).resize(function() {
				bgVideo(fs_video);
				//setTimeout(bgVideo(fs_video), 1500);
			});
		}
		
		var resizeTimerVideo = null;
		$(window).bind('resize', function() {
			if(resizeTimerVideo) { 
				clearTimeout(resizeTimerVideo);
			}
			resizeTimerVideo = setTimeout(bgVideo(fs_video), 200);
		});
		// ------------------------------
		
		
		
		
		// ------------------------------
		// PARALLAX VIDEO
		var video_parallax = $(".header-wrap, .intro, .post-thumbnail");
		video_parallax.each(function() {
			if($(this).data('parallax-video')) {
				$(this).jarallax({
					speed: 0,
					zIndex: 1,
					videoSrc: $(this).data('parallax-video')
				});	
			}
        });
		
		// PARALLAX HEADER BG IMAGE
		$('.is-header-parallax .header-wrap').jarallax({
			zIndex: 1,
			speed: 0.6
		});
		
		// PARALLAX INTRO BG IMAGE
		$('.is-intro-parallax .intro').jarallax({ 
			zIndex: 1,
			speed: -0.2	//from -1.0 to 2.0
		});		
		
		// PARALLAX OVERLAY POST OVERLAY MEDIUM
		$('.is-top-content-single-medium .post-thumbnail').jarallax({
			zIndex: 1,
			speed: 0.6
		});	
		
		// PARALLAX OVERLAY POST OVERLAY FULL/FULL MARGINS
		$('.is-top-content-single-full .post-thumbnail, .is-top-content-single-full-margins .post-thumbnail').jarallax({
			zIndex: 1,
			speed: -0.2
		});	
		
		// PARALLAX OVERLAY POST OVERLAY INLINE
		$('.post-header-overlay-inline .post-thumbnail').jarallax({
			zIndex: 1,
			speed: 0.7
		});
		
		// PARALLAX INTRO BOXES
		$('.is-link-box-parallax .link-box .post-thumbnail').jarallax({
			zIndex : 1,
			speed: 0.7
		});
		// PARALLAX RELATED POSTS
		$('.is-related-posts-parallax .related-posts .post-thumbnail').jarallax({
			zIndex : 1,
			speed: 0.8
		});
		
		// PARALLAX IMAGE IN POST
		parallaxImages();
		// ------------------------------
		
		
		
		// ------------------------------
		// STICKY REGIONS
		sticky_regions();
		// ------------------------------
		
		
		

		
		
    });
    // DOCUMENT READY
	
	
	
	
	// WINDOW ONLOAD
	window.onload = function() {
		
		// html addclass : loaded
		$('html').addClass('loaded');
	
		
		// STICKY REGIONS
		sticky_regions();
		
		
		// ------------------------------
		// POST THUMBNAILS
        if($('.post-thumbnail').length) {
		  setTimeout(function() { 
		  	fixText();
			} , 300);
        }
		// ------------------------------
				
		// fix full-width-image
		resizeFullWidthImage();
		
		// intro video bg
		bgVideo($('.intro-vid'));
		
	};
	// WINDOW ONLOAD
	
	
	
	
	// -------------------------------------------------
	// FUNCTIONS
	
	
	
	// ------------------------------
	// STICKY REGIONS
	function sticky_regions() {
		jQuery.support.touch = 'ontouchend' in document;
		if (window.matchMedia("(min-width: 992px)").matches && !(jQuery.support.touch)) {
			$(".is-sidebar-sticky .sidebar-content").stick_in_parent({ 
				offset_top: 80, 
				parent: '.site-main > div',
				spacer: '.sidebar-wrap'
				});
		}
	}
	// ------------------------------
	
	
	// ------------------------------
	// FULL SCREEN BG VIDEO
	function bgVideo(fs_video) {
		
		var videoW = fs_video.find('iframe, video').width(),
			videoH = fs_video.find('iframe, video').height(),
			screenW = $('.intro').outerWidth(),
			screenH = $('.intro').outerHeight();
			
		var video_ratio =  videoW / videoH;
		var screen_ratio = screenW / screenH;
		
		if(video_ratio > screen_ratio) {
			var diffW = screenH / videoH;
			var newWidth = videoW  * diffW;				
			fs_video.css( {'width' : newWidth, 'margin-left' : -((newWidth-screenW)/2), 'margin-top' : 0 });	
		} else {
			var diffH = screenH / videoH;
			var newHeight = screenH  * diffH;	
			fs_video.css( {'width' : "100%", 'margin-left' : 0, 'margin-top' : -((videoH-screenH)/2) });		
		}
	}
	// ------------------------------
	
	
	
	// ------------------------------
	// FULL WIDTH IMAGES
	function parallaxImages() { 
		$('img.parallax').each(function(index, element) {
			var img = $(element);
			img.imagesLoaded(function() {
				
				$('<div class="parallax-image"><div class="parallax-image-holder"></div</div>').insertBefore(img);
				
				var wrapper = img.prev('.parallax-image');
				var holder = wrapper.find('.parallax-image-holder');
				
				holder.css('background-image', 'url(' + img.attr('src') + ')');
				img.hide();
				wrapper.append(img);
				setParallaxImageHeight();
							
				// PARALLAX EFFECT
				var aspect_ratio = img.width() / img.height();
				var speed = aspect_ratio > 1.2 ? 0.2 : -0.9;
				speed = $('.content-area').hasClass('with-sidebar') ? 0.2 : speed;
				holder.jarallax({
					zIndex: 1,
					speed: speed
				});	
				
			});
        });
		// adapt screen on resize
		$( window ).resize(function() {
			setParallaxImageHeight();
		});
	}
	function setParallaxImageHeight() {
		$('.parallax-image').each(function(index, element) {
			
			var windowH = $(window).height();
			var minH = $(this).find('img').hasClass('half') ? windowH / 2 : windowH;
			var minH = $('.content-area').hasClass('with-sidebar') ? $(this).width() : minH;
			var minH = ( $('.content-area').hasClass('with-sidebar') && $(this).find('img').hasClass('half') ) ? $(this).width() / 2 : minH;

			$(this).css("min-height", minH);
			$(this).find('.parallax-image-holder').css("height", minH);  
			
		});	
	}
	// ------------------------------
	
	
	
	// ------------------------------
	// FULL WIDTH IMAGES
	function fullWidthImages() { 
		var isFullable = window.matchMedia("(max-width: 991px)").matches || !($('.content-area').hasClass('with-sidebar'));
		if(isFullable) {
			$('.content-area img.full').each(function(index, element) {
				var full_img = element;
				$(full_img).imagesLoaded(function() {
					$('<div class="full-width-image"></div>').insertBefore(full_img);
					var wrapper = $(full_img).prev('.full-width-image');
					wrapper.append(full_img);
					var minH = $(full_img).height() !== 0 ? $(full_img).height() : $(full_img).find('img').height();
					wrapper.css("min-height", minH);
				});
			});
			// adapt screen on resize
			$( window ).resize(function() {
				resizeFullWidthImage();
			});
			
		}
	}
	function resizeFullWidthImage() {
		$('.full-width-image').each(function(index, element) {
			$(this).css("min-height", $(this).find('img').height());    
		});	
	}
	// ------------------------------
	
	// ------------------------------
	// FluidBox : Zoomable Images
	// $('.entry-content > p a, .wp-caption a, [data-rel="prettyPhoto[product-gallery]"]').each(function(index, element) {
	window.setupFluidbox = function() { 
		$('.entry-content > p a, .wp-caption a, a.zoom').each(function(index, element) {
			
			// prevent conflict with the woocommerce lightbox - both have zoom class
			if($('body').hasClass('woocommerce')) {
				return;	
			}
			if($(this).attr('href').match(/\.(jpeg|jpg|gif|png)$/) != null) {
				$(this).fluidbox();
				}
		});
	}
	// ------------------------------
	

	
	
	// ------------------------------
	// POST THUMBNAILS FIX TEXT	
	function fixText() {
		$('.slider-box .entry-title').fitText($('html').data('title-ratio') , { minFontSize: '12px', maxFontSize: '220px' });
		$('.link-box .entry-title').fitText($('html').data('link-box-title-ratio') , { minFontSize: '12px' });
		$('.post-thumbnail .entry-header').addClass('ready');
	}
	// ------------------------------
	
	
	
	// ------------------------------
	// GALLERY COLLAGE LAYOUT
	function collage() {
		var collage = $('.gallery');
		if(collage.length) {
			
			collage.each(function(index, el) {
				
				// wait for images to be loaded
				$(el).imagesLoaded(function() {
					
					$(el).removeClass('pw-collage-loading');
					$(el).collagePlus({
						
						//'targetHeight' : collage.data('row-height'),
						'targetHeight' : 360,
						'effect' : 'effect-4',
						'allowPartialLastRow' : false
						
					}); //collagePlus()
					
				}); //imagesLoaded()
				
			}); //each
		}
	}
	// ------------------------------
	
	
	
	// ------------------------------
	// MASONRY LAYOUT : changes the number of masonry columns based on the current container's width
	function setMasonry() {
		
		var itemW = $masonry_container.data('item-width');
		var containerW = $masonry_container.width();
		var items = $masonry_container.children('.hentry');
		var columns = Math.round(containerW/itemW);
		$masonry_container.removeClass('col-1 col-2 col-3 col-4- col-5 col-6 col-7- col-8').addClass('col-' + columns);
	
		// set the widths (%) for each of item
		items.each(function(index, element) {
			var multiplier = ($masonry_container.hasClass('first-full') && index == 0) && columns > 1 ? 2 : 1;
			var itemRealWidth = (Math.floor( containerW / columns ) * 100 / containerW) * multiplier ;
			itemRealWidth = itemRealWidth > 100 ? 100 : itemRealWidth;
			$(this).css( 'width', itemRealWidth + '%' );
		});
	
		var columnWidth = Math.floor( containerW / columns );
		$masonry_container.isotope( 'option', { masonry: { columnWidth: columnWidth } } );
	}
	// ------------------------------
	
	
	
})(jQuery);