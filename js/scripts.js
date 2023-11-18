jQuery( document ).ready( function ( $ ) {

    // --------------------------------------------------------------------------------------
    // Add class to body tag when page is scrolled ------------------------------------------
    // --------------------------------------------------------------------------------------
    function scrolledNav(){
        var scroll = $(window).scrollTop();

        if (scroll >= 150) {
            $("body").addClass("scrolled-page");
        } else {
            $("body").removeClass("scrolled-page");
        }
    } scrolledNav();

    $(window).scroll(function() { 
        scrolledNav();
    });


    // --------------------------------------------------------------------------------------
    // Mobile Navigation --------------------------------------------------------------------
    // --------------------------------------------------------------------------------------
    // Detect when to put up mobile nav -----------------------------------------------------
    function responsiveNav(){
        var logoWidth = 288;
        var screenWidth = $(window).width();
        var safeWidth = screenWidth - logoWidth;
        var navWidth = $('header nav').outerWidth();
        var navButtonsWidth = $('.mobile-nav-buttons').outerWidth();
        var changeWidth = navWidth+navButtonsWidth;

        $('header nav').css('margin-right', navButtonsWidth+'px');

        if ( changeWidth < safeWidth ) {
            $("body").addClass("desktop-site");
            $("body").removeClass("mobile-site");
        } else {
            $("body").removeClass("desktop-site");
            $("body").addClass("mobile-site");
        }
    }
    responsiveNav();

    $(window).on('resize', function(){
        responsiveNav();
    });


    // --------------------------------------------------------------------------------------
    // Mobile Navigation --------------------------------------------------------------------
    // --------------------------------------------------------------------------------------
    $('.hamburger, .close-nav').click(function() {
        $('.responsive-menu').toggleClass('responsive-menu-show');
        $('.mobile-overlay').toggleClass('mobile-overlay-on');
        $('.close-nav').toggleClass('close-nav-show');
        $('.mobile-caution-tape').toggleClass('mobile-caution-tape-show');
    });

    $('.responsive-menu .menu-item-has-children a').click(function() {
        $('.responsive-menu').addClass('mobile-submenu-active');
        $(this).siblings('ul').addClass('active-submenu');
        $('.back-nav').addClass('back-nav-show');
        $('.close-nav').removeClass('close-nav-show');
    });

    $('.mobile-overlay').click(function() {
        if ( $('.responsive-menu').hasClass('mobile-submenu-active') ) {
            $('.responsive-menu').removeClass('mobile-submenu-active');
            $('.sub-menu').removeClass('active-submenu');
            $('.back-nav').removeClass('back-nav-show');
            $('.close-nav').addClass('close-nav-show');
        }
        else {
            $('.responsive-menu').removeClass('responsive-menu-show');
            $('.mobile-overlay').removeClass('mobile-overlay-on');
            $('.close-nav').removeClass('close-nav-show');
            $('.mobile-caution-tape').removeClass('mobile-caution-tape-show');
        }
    });

    $('.back-nav').click(function() {
        $('.mobile-menu').removeClass('mobile-submenu-active');
        $('.sub-menu').removeClass('active-submenu');
        $('.back-nav').removeClass('back-nav-show');
        $('.close-nav').addClass('close-nav-show');
    });
    
    
    // Mobile sub nav --------------------------------------------------------------------
    $('.responsive-menu .menu-item-has-children li a').addClass('sub-anchor')
    $(function () {
        $('.responsive-menu .menu-item-has-children a:not(.sub-anchor)').on("click", function (e) {
            e.preventDefault();
        });
    });



    // --------------------------------------------------------------------------------------
    // Clear Whitespace ------------------------------------------------------
    // --------------------------------------------------------------------------------------
    jQuery.fn.cleanWhitespace = function() {
        this.contents().filter(
            function() { return (this.nodeType == 3 && !/\S/.test(this.nodeValue)); })
            .remove();
        return this;
    }
    // Elements to clear whitespace (select parent element)
    $('ul#main-menu, .mobile-nav').cleanWhitespace();



    // --------------------------------------------------------------------------------------
    // Smooth scroll any anchor tags that stay on same page ---------------------------------
    // --------------------------------------------------------------------------------------
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });


    // --------------------------------------------------------------------------------------
    // Detect sections on screen ------------------------------------------
    // --------------------------------------------------------------------------------------
    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };

    $(window).on('resize scroll', function() {
        $('section').each(function() {
            if ($(this).isInViewport()) {
                $(this).addClass('in-viewport');
            } else {
                $(this).removeClass('in-viewport');
            }

            if ( $(this).hasClass('section-title-banner') ) {
                var elementTop = $(this).offset().top;
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();
                var bottomDistance = viewportBottom - elementTop;
                var triangleMove = $(this).children('.title-banner-triangle');
                $(triangleMove).css('transform', 'translate3d('+(bottomDistance/3)+'px,-50%,0)');
            }

            if ( $(this).hasClass('section-contact-form') ) {
                var elementTop = $(this).offset().top;
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();
                var bottomDistance = viewportBottom - elementTop;

                var blueTriangle = $(this).find('.triangle-blue');
                var redTriangle = $(this).find('.triangle-red');
                var whiteTriangle = $(this).find('.triangle-white');

                $(blueTriangle).css('transform', 'translate3d('+(bottomDistance/40)+'vw,0,0)');
                $(redTriangle).css('transform', 'translate3d('+(bottomDistance/100)+'vw,0,0)');
                $(whiteTriangle).css('transform', 'translate3d('+(bottomDistance/70)+'vw,0,0)');
            }
        });
    });


    // --------------------------------------------------------------------------------------
    // Hero and title banner triangles ------------------------------------------
    // --------------------------------------------------------------------------------------
    $('section#hero').addClass('load-content').delay(2000).queue(function(){
        $(this).addClass("loaded-content").dequeue();
    });
    
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        $('section#hero .title-banner-triangle').css({
            "transform": 'translate3d('+(0.1*scroll)+'px,-50%,0)', 
            "opacity": 1-(0.001*scroll)
        });
    });


    // --------------------------------------------------------------------------------------
    // Console Credits ------------------------------------------------------
    // --------------------------------------------------------------------------------------
    console.log("%c ----------------------------------------------------------------------------------------------","color: #000000;");
    console.log("%c Website by 2900 Creative Media","font-weight: bold; color: #000000;");
    console.log("%c ----------------------------------------------------------------------------------------------","color: #000000;");

    
});



