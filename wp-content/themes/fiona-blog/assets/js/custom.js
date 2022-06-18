(function($) {
  'use strict';

    $( document ).ready(function() {

        $(window).on('load', function () {
          if ( $('.post-items .wp-block-gallery').length || $('.post-weekend .blocks-gallery-grid').length ) {
            let postGallery = document.querySelectorAll('.post-items .blocks-gallery-grid, .post-weekend .blocks-gallery-grid');
            for (var i = 0; i < postGallery.length; i++) {
              let postGalleries = tns({
                    container: postGallery[i],
                    ltr: $("html").attr("dir") == 'ltr' ? true : false,
                    items: 1,
                    loop: true,
                    nav: false,
                    controlsText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
                    mouseDrag: true,
                    rewind: false,
                    swipeAngle: false,
                    autoHeight: true,
                    lazyload: true,
                    lazyloadSelector: ".tns-lazy",
                    speed: 400,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayButtonOutput: false                
              });
            }
          }
        });
        $(document).on('click', '.post-video', function(e) {
            var postID = $(this).data('id');
            //console.log(postID);
            e.preventDefault();
            $('[data-id^= '+postID+'] iframe')[0].src += "?autoplay=1";
            $('[data-id^= '+postID+']').contents().find("iframe").attr('src', function(i, oldSrc) {
              return oldSrc.replace('autoplay=0', 'autoplay=1');
            });
            $('[data-id^= '+postID+'] iframe').show();
            $('[data-id^= '+postID+'] .play-mode').hide();
        });
		
        // ScrollUp
        $(window).on('scroll', function () {
          if ($(this).scrollTop() > 200) {
            $('.scrollup').addClass('is-active');
          } else {
            $('.scrollup').removeClass('is-active');
          }
        });
        $('.scrollup').on('click', function () {
          $("html, body").animate({
            scrollTop: 0
          }, 600);
          return false;
        });

        // Sticky Header
        $(window).on('scroll', function() {
          if ($(window).scrollTop() >= 250) {
              $('.sticky-nav').addClass('sticky-menu');
          }
          else {
              $('.sticky-nav').removeClass('sticky-menu');
          }
        });

        // Header Widget
        if( !$('.header-widget').children().length > 0 ) {
          $(".header-widget").hide();
          $(".headtop-mobi").hide();
        }
        else {
          $(".headtop-mobi").show();
          $(".header-widget").clone().appendTo(".mobi-head-top");
            var $mob_h_top = $("#mob-h-top");
            $('.header-above-toggle').on('click', function(e) {
              $mob_h_top.toggleClass("active");
              $('.header-above-toggle').toggleClass("active");
              e.preventDefault();
              if ( $mob_h_top.hasClass( 'active' ) ) {
                var links,i,len,menu=document.querySelector('.headtop-mobi'),iconToggle=document.querySelector('.header-above-toggle');let focusableElements='button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';let firstFocusableElement=iconToggle;let focusableContent=menu.querySelectorAll(focusableElements);let lastFocusableElement=focusableContent[focusableContent.length-1];if(!menu){return!1}
                links=menu.getElementsByTagName('a');for(i=0,len=links.length;i<len;i++){links[i].addEventListener('focus',toggleFocus,!0);links[i].addEventListener('blur',toggleFocus,!0)}
                function toggleFocus(){var self=this;while(-1===self.className.indexOf('mobi-head-top')){if('li'===self.tagName.toLowerCase()){if(-1!==self.className.indexOf('focus')){self.className=self.className.replace(' focus','')}else{self.className+=' focus'}}
                self=self.parentElement}}
                document.addEventListener('keydown',function(e){let isTabPressed=e.key==='Tab'||e.keyCode===9;if(!isTabPressed){return}
                if(e.shiftKey){if(document.activeElement===firstFocusableElement){lastFocusableElement.focus();e.preventDefault()}}else{if(document.activeElement===lastFocusableElement){firstFocusableElement.focus();e.preventDefault()}}})
              }
            });
        }

        $('.flash-hover').on('click', function () {
          $(this).toggleClass('active');
          if ($('body').hasClass('style-light')) {
              $('body').removeClass('style-light');
              $('body').addClass('style-dark');
          } else {
              $('body').removeClass('style-dark');
              $('body').addClass('style-light');
          }
          return false;
        });


        // Toggle-Comments
        $('.fiona-blog-toggle-btn').on('click', function () {
          $(".comments-area").slideToggle('slow');
          $(".comments-area").toggleClass('comments-visible');  
          if(! $(".comments-area").hasClass('comments-visible')) {
            $('.fiona-blog-toggle-btn').text('Hide Comments');
          } else {
            $('.fiona-blog-toggle-btn').text('Show Comments');
          }
          return false;
        });
		
        // Animated Typing Text
        var typingText = function (el, toRotate, period) {
          this.toRotate = toRotate;
          this.el = el;
          this.loopNum = 0;
          this.period = parseInt(period, 10) || 2000;
          this.txt = "";
          this.tick();
          this.isDeleting = false;
        };
        typingText.prototype.tick = function () {
          var i = this.loopNum % this.toRotate.length;
          var fullTxt = this.toRotate[i];

          if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
          } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
          }

          this.el.innerHTML = '<span class="wrap">' + this.txt + "</span>";

          var that = this;
          var delta = 200 - Math.random() * 100;

          if (this.isDeleting) {
            delta /= 2;
          }

          if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
          } else if (this.isDeleting && this.txt === "") {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
          }

          setTimeout(function () {
            that.tick();
          }, delta);
        };
        window.onload = function () {
          var elements = document.getElementsByClassName("typewrite");
          for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute("data-type");
            var period = elements[i].getAttribute("data-period");
            if (toRotate) {
              new typingText(elements[i], JSON.parse(toRotate), period);
            }
          }
          // INJECT CSS
          var css = document.createElement("style");
          css.type = "text/css";
          css.innerHTML = ".typewrite > .wrap{position:relative;}.typewrite > .wrap:after{content:'_';margin-left:2px}";
          document.body.appendChild(css);
          //0.08em solid #ffffff
        };

        $('.breadcrumb-area').ripples({
          resolution: 500,
          dropRadius: 20,
          perturbance: 0.04
        });
		
        if ( $('.slider-wrapper').hasClass("section-9") ) {
            var section09 = tns({
                container: '.main-slider',
                ltr: $("html").attr("dir") == 'ltr' ? true : false,
                items: 1,
                controlsContainer: "#customize-controls",
                navContainer: "#customize-thumbnails",
                navAsThumbnails: true,
                loop: true,
                mouseDrag: true,
                rewind: false,
                swipeAngle: false,
                autoHeight: true,
                lazyload: true,
                lazyloadSelector: ".tns-lazy",
                speed: 1000,
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayTimeout: 9000,
            });
        }
    });

}(jQuery));