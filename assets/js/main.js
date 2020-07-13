!(function($){
	"use strict";
	
	/* Toggle menu mobile */
	function AsataToggleMenuMobile() {
		$('.bt-header .bt-header-mobile .bt-menu-toggle').on('click', function() {
			$(this).toggleClass('active');
			$('.bt-header .bt-menu-mobile').toggle('slow');
		});
	}
	
	/* Toggle sub menu vertical */
	function AsataToggleSubMenuVertical() {
		var hasChildren = $('.bt-header .bt-header-mobile ul li.menu-item-has-children, .bt-header-popup .bt-menu-desktop ul li.menu-item-has-children, .bt-header-vertical .bt-vertical-menu-wrap ul li.menu-item-has-children');
		
		hasChildren.each( function() {
			var $btnToggle = $('<div class="menu-toggle"></div>');
			$( this ).append($btnToggle);
			$btnToggle.on( 'click', function(e) {
				e.preventDefault();
				$( this ).toggleClass('active');
				$( this ).parent().children('ul').toggle('slow'); 
				$( this ).parent().children('div.mega-menu').toggle('slow'); 
			} );
		} );
	}
	
	/* Toggle Header Popup */
	function AsataToggleHeaderPopup() {
		$('.header-popup .bt-menu-popup-toggle').on('click', function() {
			$('.header-popup  .bt-header-popup').toggleClass('bt-popup-active');
		});
	}
	
	/* Header Stick */
	function AsataHeaderStick() {
		if($( '.bt-header' ).hasClass( 'bt-stick' )) {
			var h_menu = $('.bt-header .bt-header-desktop .bt-subheader.bt-bottom'),
				h_menu_info = {top: h_menu.offset().top, height: h_menu.innerHeight()},
				position = $(window).scrollTop(); 

			$(window).scroll(function() {
				var scroll = $(window).scrollTop();
				if(scroll > position && scroll > 300) {
					//console.log('scrollDown');
					if (scroll > (h_menu_info.top + h_menu_info.height)){
						$( '.bt-header .bt-header-stick' ).addClass('active');
					}
				} else {
					//console.log('scrollUp');
					$( '.bt-header .bt-header-stick' ).removeClass('active');
				}
				position = scroll;
			});
		}
	}
	
	/* Header Vertical */
	function AsataHeaderVertical() {
		var w_screen = parseInt(window.innerWidth) - 17,
			w_main,
			e_hvertical = $('.header-vertical .bt-header-vertical'),
			e_main = $('.header-vertical .bt-titlebar, .header-vertical .bt-main-content, .header-vertical .bt-footer'),
			h_screen = parseInt(window.innerHeight),
			h_menu,
			e_menu = $('.bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap');
		
		/* width header */
		if(w_screen > option_ob.enable_mobile){
			if(w_screen > option_ob.hvertical_width){
				w_main = w_screen - parseInt(option_ob.hvertical_width);
				e_hvertical.css("width", option_ob.hvertical_width);
				e_main.css("width", w_main);
			}else{
				w_main = w_screen - 320;
				e_hvertical.css("width", "320px");
				e_main.css("width", w_main);
			}
		}
		
		/* height menu */
		if(option_ob.hvertical_full_height){
			if(h_screen > 900){
				h_menu = parseInt(option_ob.hvertical_menu_height) + (h_screen - 900);
				e_menu.css("height", h_menu);
			}else{
				h_menu = parseInt(option_ob.hvertical_menu_height) - (900 - h_screen);
				e_menu.css("height", h_menu);
			}
		}
	}
	
	/* Toggle Header Vertical Mobile */
	function AsataToggleHeaderVerticalMobile() {
		$('.header-vertical .bt-menu-toggle').on('click', function() {
			$('.header-vertical  .bt-header-vertical').toggleClass('active');
			$(this).toggleClass('active');
		});
	}
	
	/* Header Mini Vertical */
	function AsataHeaderMiniVertical() {
		$('.header-minivertical .bt-header-minivertical .bt-header-desktop .bt-menu-toggle').on('click', function() {
			$('.header-minivertical .bt-header-minivertical').toggleClass('active');
			$(this).toggleClass('active');
		});
	}
	
	/* Mega Menu Auto Align */
	function AsataMegaMenuAutoAlign() {
		$('.bt-header .bt-menu-desktop > ul > li.menu-item-has-mega-menu').on('hover', function() {
			var w_screen = parseInt(window.innerWidth),
				sub_mega = $(this).children('div.mega-menu'),
				pos_mega = sub_mega.offset(),
				l_mega = pos_mega.left,
				r_mega = w_screen - (l_mega + parseInt(sub_mega.outerWidth()));
			
			if(l_mega < 0){
				sub_mega.css("margin-left", l_mega * (-1) + 'px');
			}
			
			if(r_mega < 0){
				sub_mega.css("margin-left", r_mega + 'px');
			}
			
		});
	}
	
	/* Menu Canvas */
	function AsataMenuCanvas() {
		$('.bt-header .bt-menu-canvas-toggle').on('click', function(e) {
			e.preventDefault();
			$('#bt_menu_canvas').toggleClass('active');
		});
		$('#bt_menu_canvas .bt-overlay').on('click', function(e) {
			e.preventDefault();
			$('#bt_menu_canvas').toggleClass('active');
		});
	}
	
	/* Open the hide mini search */
	function AsataOpenMiniSearchSidebar() {
		$('.bt-mini-search > a').on('click', function(e) {
			e.preventDefault();
			if($('.bt-mini-cart .bt-cart-content, .bt-mini-cart > a').hasClass('active')){
				$('.bt-mini-cart .bt-cart-content, .bt-mini-cart > a').removeClass('active');
			}
			if($('.bt-mini-search').hasClass('mini')){
				$(this).toggleClass('active');
				$('.bt-mini-search .bt-search-form').toggleClass('active');
			}else{
				$('#bt_search_popup').toggleClass('active');
			}
		});
		$('#bt_search_popup > a.bt-close').on('click', function(e) {
			e.preventDefault();
			$('#bt_search_popup').removeClass('active');
		});
	}
	
	/* Open the hide mini cart */
	function AsataOpenMiniCartSidebar() {
		$('.bt-mini-cart > a').on('click', function(e) {
			e.preventDefault();
			if($('.bt-mini-search .bt-search-form, .bt-mini-search > a').hasClass('active')){
				$('.bt-mini-search .bt-search-form, .bt-mini-search > a').removeClass('active');
			}
			if($('.bt-mini-cart').hasClass('mini')){
				$(this).toggleClass('active');
				$('.bt-mini-cart .bt-cart-content').toggleClass('active');
			}else{
				$('#bt_cart_popup').toggleClass('active');
			}
		});
		$('#bt_cart_popup > a.bt-close').on('click', function(e) {
			e.preventDefault();
			$('#bt_cart_popup').removeClass('active');
		});
	}
	
	/* Open the hide menu canvas */
	function AsataOpenMenuSidebar() {
		$('.bt-menu-sidebar > a').on('click', function() {
			$('body').toggleClass('bt-menu-canvas-open');
		});
		$('.bt-menu-canvas-overlay').on('click', function() {
			$('body').toggleClass('bt-menu-canvas-open');
		});
	}
	
	/* Easy Scroll */
	function AsataEasingScroll() {
		var $root = $('html, body');
		$('.bt-easing-scroll ul.menu > li > a').on('click', function(e) {
			e.preventDefault();
			var href = $.attr(this, 'href');
			$root.animate({
				scrollTop: $(href).offset().top
			}, 700, function() {
				window.location.hash = href;
			});
			return false;
		});
	}
	
	/* Active Menu Item Scroll  */
	function AsataActiveMenuItemScroll() {
		var scroll_pos = $(window).scrollTop() + 1;
		var sec_attr = [];

		$('.header-onepage .vc_section, .header-onepagescroll .vc_section').each(function(){
			sec_attr.push([$(this).attr('id'), $(this).offset().top]);
		});

		$.each(sec_attr, function( index, value ) {
			if(scroll_pos >= value[1] && scroll_pos < value[1] + $('#' + value[0]).innerHeight()){
				$('.bt-easing-scroll ul.menu > li').removeClass('current-menu-item');
				$('.bt-easing-scroll ul.menu > li > a[href="#' + value[0] +'"]').parent().addClass('current-menu-item');
			}
		});
	}
	
	/* Footer Stick */
	function AsataFooterStick() {
		if($( '.bt-footer' ).hasClass( 'bt-stick' )) {
			var f_height = parseInt($('.bt-footer').innerHeight()),
				f_space = parseInt($('.bt-footer').data('space'));
				
			$('#bt-main .bt-header').css({"position": "relative", "z-index": "999"});
			$('#bt-main .bt-titlebar').css({"position": "relative", "z-index": "3"});
			$('#bt-main .bt-main-content').css({"position": "relative", "background": "#ffffff", "z-index": "3", "margin-bottom": f_height + f_space});
		}
	}
	
	/* Back Top */
	function AsataBackTop() {
		if ($('#site_backtop').length) {
			$('#site_backtop').on('click', function() {
				$('html,body').animate({
					scrollTop: 0
				}, 400);
				return false;
			});

			if ($(window).scrollTop() > 300) {
				$('#site_backtop').addClass('active');
			} else {
				$('#site_backtop').removeClass('active');
			}
			
			$(window).on('scroll', function() {

				if ($(window).scrollTop() > 300) {
					$('#site_backtop').addClass('active');
				} else {
					$('#site_backtop').removeClass('active');
				}
			});
		}
	}
	
	/* Nice Scroll Bar */
	function AsataNiceScrollBar() {
		if(option_ob.nice_scroll_bar && option_ob.nice_scroll_bar_element){
			$(option_ob.nice_scroll_bar_element).niceScroll({
				cursorcolor:"#4d4d4d",
				cursorborder:"0px",
				cursorwidth:"7px",
			});
		}
	}
	
	/* Masonry */
	function AsataMasonry() {
		if($('.bt-grid-masonry').length > 0) {
			$('.bt-grid-masonry .row').isotope({
				// options
			});
		}
	}
	
	/*CountDown*/
	function AsataCountDownClock() {
		$('.bt-countdown-clock').each(function() {
			var countdownTime = $(this).attr('data-countdown');
			var countdownFormat = $(this).attr('data-format');
			var countdownLabels = $(this).attr('data-labels').split(',');
			var countdownLabels1 = $(this).attr('data-labels1').split(',');
			$(this).countdown({
				until: countdownTime,
				format: countdownFormat,
				labels: countdownLabels,
				labels1: countdownLabels1,
				padZeroes: true
			});
		});
	}
	
	/*Fllow Effect*/
	function AsataFllowEffect() {
		if($('.bt-follow-effect').length > 0) {
			$('body').append('<div class="bt-follow-info-holder"></div>');
			$('.bt-follow-effect').each(function(){
				$(this).mouseover(function(){
					var _content = $(this).find('.bt-content');
					$('.bt-follow-info-holder').html(_content.clone());
					$('.bt-follow-info-holder').addClass('bt-active');
				});
				
				$(this).mouseout(function(){
					$('.bt-follow-info-holder').removeClass('bt-active');
				});
			});
			$('body').mousemove(function(e){
				$('.bt-follow-info-holder').css({'top': e.clientY + 20, 'left': e.clientX + 20});
				if(e.clientX + 20 + $('.bt-follow-info-holder').width() > $('body').width()){
					$('.bt-follow-info-holder').addClass('bt-right');
				}else{
					$('.bt-follow-info-holder').removeClass('bt-right');
				}
			});
		}
	}
	
	jQuery(window).load(function() {
		if ($('#site_loading').length) {
			$('#site_loading').fadeOut();
		}
	});
	
	jQuery(document).ready(function($) {
		AsataToggleMenuMobile();
		AsataToggleSubMenuVertical();
		AsataToggleHeaderPopup();
		AsataHeaderStick();
		AsataHeaderVertical();
		AsataToggleHeaderVerticalMobile();
		AsataHeaderMiniVertical();
		AsataMegaMenuAutoAlign();
		AsataMenuCanvas();
		AsataOpenMiniSearchSidebar();
		AsataOpenMiniCartSidebar();
		AsataOpenMenuSidebar();
		AsataEasingScroll();
		AsataActiveMenuItemScroll();
		AsataFooterStick();
		AsataBackTop();
		AsataNiceScrollBar()
		AsataMasonry();
		AsataCountDownClock();
		AsataFllowEffect();
		
		$('.single-post .bt-desc p').each( function() {
			var $this = $( this );
			if ( $this.html().replace( /\s|&nbsp;/g, '' ).length === 0 ) {
				$this.remove();
			}
		});
		
		if($('[data-toggle="tooltip"]').length > 0) {
			$('[data-toggle="tooltip"]').tooltip();
		}
		
		if($('.bt-counter-element .bt-number').length > 0) {
			$('.bt-counter-element .bt-number').counterUp({
				delay: 10,
				time: 1000
			});
		}
		
        /* Plus Qty */
        $(document).on('click', '.qty-plus', function() {
            var parent = $(this).parent();
            $('input.qty', parent).val( parseInt($('input.qty', parent).val()) + 1);
			$('input.qty', parent).trigger('change');
        });
        /* Minus Qty */
        $(document).on('click', '.qty-minus', function() {
            var parent = $(this).parent();
            if( parseInt($('input.qty', parent).val()) > 1) {
                $('input.qty', parent).val( parseInt($('input.qty', parent).val()) - 1);
				$('input.qty', parent).trigger('change');
            }
        });
		
	});
	
	jQuery(window).on('resize', function() {
		
		AsataActiveMenuItemScroll();
		AsataMasonry();
		AsataHeaderVertical();
		AsataMegaMenuAutoAlign();
	});

	jQuery(window).on('scroll', function() {
		AsataHeaderStick();
		AsataActiveMenuItemScroll();
		AsataMasonry();
	});
	
})(jQuery);
