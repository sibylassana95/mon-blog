(function($) {
	'use strict';
	$(document).ready(function() {
		/*-----------------------------------------------------------------------------------*/
		/*  Home icon in main menu
		/*-----------------------------------------------------------------------------------*/ 
			$('.main-navigation .menu-item-home:first-child > a').prepend('<i class="fa fa-lg fa-home spaceRight"></i>');
		/*-----------------------------------------------------------------------------------*/
		/*  Detect touch screen device
		/*-----------------------------------------------------------------------------------*/ 
			var mobileDetect = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		/*-----------------------------------------------------------------------------------*/
		/*  If the Tagcloud widget exist or Edit Comments Link exist
		/*-----------------------------------------------------------------------------------*/ 
			if ( $( '.comment-metadata' ).length ) {
				$('.comment-metadata').addClass('smallPart');
			}
			if ( $( '.comment-list .edit-link' ).length ) {
				$('.comment-list .edit-link').addClass('smallPart');
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Make dropdowns functional on focus
		/*-----------------------------------------------------------------------------------*/ 
			$( '.main-navigation' ).find( 'a' ).on( 'focus blur', function() {
				$( this ).parents().toggleClass( 'focus' );
			});
		/*-----------------------------------------------------------------------------------*/
		/*  Top Search Button
		/*-----------------------------------------------------------------------------------*/ 
		$('.top-search').click(function() {
			$('.topSearchForm').slideToggle('fast');
			$(this).toggleClass('active');
			return false;
		});
		/*-----------------------------------------------------------------------------------*/
		/*  Menu Widget
		/*-----------------------------------------------------------------------------------*/
			if ( $( 'aside ul.menu' ).length ) {
				$('aside ul.menu').find('li').each(function(){
					if($(this).children('ul').length > 0){
						$(this).append('<span class="indicatorBar"></span>');
					}
				});
				$('aside ul.menu > li.menu-item-has-children .indicatorBar, .aside ul.menu > li.page_item_has_children .indicatorBar').click(function() {
					$(this).parent().find('> ul.sub-menu, > ul.children').toggleClass('yesOpenBar');
					$(this).toggleClass('yesOpenBar');
					var $self = $(this).parent();
					if($self.find('> ul.sub-menu, > ul.children').hasClass('yesOpenBar')) {
						$self.find('> ul.sub-menu, > ul.children').slideDown(300);
					} else {
						$self.find('> ul.sub-menu, > ul.children').slideUp(200);
					}
				});
			}
		/*-----------------------------------------------------------------------------------*/
		/*  Mobile Menu
		/*-----------------------------------------------------------------------------------*/ 
			if ($( window ).width() <= 1025) {
				$('.main-navigation').find('li').each(function(){
					if($(this).children('ul').length > 0){
						$(this).append('<span class="indicator"></span>');
					}
				});
				$('.main-navigation ul > li.menu-item-has-children .indicator, .main-navigation ul > li.page_item_has_children .indicator').click(function() {
					$(this).parent().find('> ul.sub-menu, > ul.children').toggleClass('yesOpen');
					$(this).toggleClass('yesOpen');
					var $self = $(this).parent();
					if($self.find('> ul.sub-menu, > ul.children').hasClass('yesOpen')) {
						$self.find('> ul.sub-menu, > ul.children').slideDown(300);
					} else {
						$self.find('> ul.sub-menu, > ul.children').slideUp(200);
					}
				});
			}
			$(window).resize(function() {
				if ($( window ).width() > 1025) {
					$('.main-navigation ul > li.menu-item-has-children, .main-navigation ul > li.page_item_has_children').find('> ul.sub-menu, > ul.children').slideDown(300);
				}
			});
		/*-----------------------------------------------------------------------------------*/
		/*  Detect Mobile Browser
		/*-----------------------------------------------------------------------------------*/ 
		if (!mobileDetect) {
			/*-----------------------------------------------------------------------------------*/
			/*  Scroll To Top
			/*-----------------------------------------------------------------------------------*/ 
				$(window).scroll(function(){
					if ($(this).scrollTop() > 700) {
						$('#toTop').fadeIn();
					} 
					else {
						$('#toTop').fadeOut();
					}
				}); 
				$('#toTop').click(function(){
					$('html, body').animate({ scrollTop: 0 }, 1000);
					return false;
				});
		}
	});
})(jQuery);