import $ from 'jquery';
import "./bootstrap";
import 'slick-carousel';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

'use strict';

$(document).ready(function () {
    // menu
    menuMobileControl();
    menuDropdown();
    searchAnimation();
    // footer
    getCurrentYear();
    // home
    homeBannerSlider();
    homeFeaturedSlider();

    // product detail
    productImageSlider();

    // checkout
    checkoutAddrEffect();
});

/**
 * Display currect year for footer
 */
function getCurrentYear() {
    $('#footer_year').text(new Date().getFullYear());
}

/**
 * Mobile menu slide animation
 */
function menuMobileControl() {
    $('.nav_bar .hamburger a').click(function (e) {
        e.preventDefault();
        $('.nav_bar .menu').animate({ left: 0 }, 500);
        $('.nav_bar .black_layer').fadeIn();
    });

    $('.nav_bar .menu .mobile_close_btn, .nav_bar .black_layer').click(function (e) {
        e.preventDefault();
        $('.nav_bar .menu').animate({ left: -420 }, 500);
        $('.nav_bar .black_layer').fadeOut();
    })


}

/**
 * Menu animation control
 */
function menuDropdown() {
    $('.icon.profile a, .profile_dropdown').mouseover(function (e) {
        e.preventDefault();
        $('.profile_dropdown').stop().fadeIn(200);
    });

    $('.icon.profile a, .profile_dropdown').mouseleave(function (e) {
        e.preventDefault();
        $('.profile_dropdown').stop().fadeOut(200);
    });

    $('nav ul li a, .nav_dropdown').mouseover(function (e) {
        e.preventDefault();
        $('.nav_dropdown').stop().fadeIn(200);
    });

    $('nav ul li a, .nav_dropdown').mouseleave(function (e) {
        e.preventDefault();
        $('.nav_dropdown').stop().fadeOut(200);
    });
}

/**
 * Apply animation to the search box on menu bar
 * return void
 */
function searchAnimation() {
    $(".nav_bar .utils .search > a").click(function (e) {
        e.preventDefault();

        $(".search .search_bar")
            .css({
                "z-index": 999,
                visibility: "visible",
            })
            .animate(
                {
                    // show
                    opacity: 1,
                },
                150
            )
            .animate(300, function () {
                setTimeout(function () {
                    $(".search .search_bar .search").focus();
                }, 600);
            })
            .css("pointer-events", "auto");
    });
}

/**
 * Home page banner slider animation control
 */
function homeBannerSlider() {
    $(".home .banner").slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: "linear",
        draggable: true,
    });
}

/**
 * Home page featured products slider animation control
 */
function homeFeaturedSlider() {
    $(".featured_slider").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        centerMode: true,
        focusOnSelect: true,
        lazyLoad: "ondemand",
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true,
                },
            },
        ],
    });

    // add class name to the first tabs item when page loaded
    $(".featured .tabs ul li:first").addClass("active");
    $(".featured .content .row:first").addClass("show");

    $(".featured .tabs ul li").each(function (tabIdx) {
        $(this).click(function (e) {
            e.preventDefault();
            // add class to selected tab
            $(".featured .tabs ul li").removeClass("active");
            $(this).addClass("active");
            $(".featured .content .row").removeClass("show");
            // add class to selected slider
            $(".featured .content .row").each(function (itemIdx) {
                var item = $(this);
                if (tabIdx == itemIdx) {
                    item.addClass("show");
                }
            });
        });
    });
}


/**
 * Product Detail page product images
 */
function productImageSlider() {
    //slider
    $('.product-media-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product-media-slider-nav'
    });
    // slider navigation
    $('.product-media-slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.product-media-slider',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: false,

                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: false,

                }
            }
        ]
    });
}

/**
 * Checkout page shipping address information effects
 */
function checkoutAddrEffect() {
    $('.cart #select_addr_btn').click(function (e) {
        e.preventDefault();
        $('.cart .address_form').slideUp();

        if ($('.cart .address_list').css('display') == 'block') {
            $('.cart .address_list').slideUp();
        } else {
            $('.cart .address_list').slideDown();
        }
    });

    $('.cart #create_addr_btn').click(function (e) {
        e.preventDefault();

        $('.cart .address_list').slideUp();

        if ($('.cart .address_form').css('display') == 'block') {
            $('.cart .address_form').slideUp();
        } else {
            $('.cart .address_form').slideDown();
        }
    });
}