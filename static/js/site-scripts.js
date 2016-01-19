$(function () {
    //site tooltips init
    $('[data-toggle="tooltip"]').tooltip();

    //show properties detail
    var details = $(".details");
    details.hide();
    $(".detail-trigger").on("click", function (e) {
        e.preventDefault();
        $(this).siblings(".details").stop(true, true).slideToggle(300);
    });

    //set columns to same height
    var row = $('.equalize');
    if ($(window).width() > 768) {
        $.each(row, function() {
            var maxh=0;
            $.each($(this).find('div[class^="col-"]'), function() {
                if($(this).height() > maxh)
                    maxh=$(this).height();
            });
            $.each($(this).find('div[class^="col-"]'), function() {
                $(this).height(maxh);
            });
        });
    }

    //animate scroll to selector
    var scrollToSelector = function (selector, vOffSet) {
        $("html, body").animate({
            scrollTop: selector.offset().top - vOffSet
        }, 1000);
    };
    $(".section-anchor").on("click", function (e) {
        e.preventDefault();
        if ($(window).width() > 768) {
            scrollToSelector($(this).next(), 121)
        } else {
            scrollToSelector($(this).next(), 139)
        }
    });

    //search input
    $("#search-trigger").on("click", function (e) {
        e.preventDefault();
        var searchBox = $("#search-input");
        searchBox.stop(true, true).slideToggle(200, function () {
            var searchIcon = $(this).prev().find("i");
            if (searchIcon.hasClass("fa-search-plus")) {
                searchIcon.removeClass("fa-search-plus").addClass("fa-search-minus")
            } else if (searchIcon.hasClass("fa-search-minus")) {
                searchIcon.removeClass("fa-search-minus").addClass("fa-search-plus")
            }
        });
    });

    //carousels
    $("#main-carousel").slick({
        dots: true,
        arrows: false,
        fade: true,
        speed: 800,
        slidesToShow: 1,
        slidesToScroll: 1
    });
    var aLeft = $(".arrow-left");
    var aRight = $(".arrow-right");
    $(".properties-carousel").slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: aLeft,
        nextArrow: aRight,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    dots: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    prevArrow: aLeft,
                    nextArrow: aRight
                }
            },
            {
                breakpoint: 768,
                settings: {
                    dots: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    prevArrow: aLeft,
                    nextArrow: aRight
                }
            }
        ]
    });
    $("#main-image").slick({
        dots: false,
        arrows: false,
        slidesToScroll: 1,
        slidesToShow: 1,
        fade: true,
        asNavFor: '#nav-images'
    });
    var navLeft = $("#nav-left");
    var navRight = $("#nav-right");
    $("#nav-images").slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: navLeft,
        nextArrow: navRight,
        asNavFor: '#main-image',
        focusOnSelect: true,
        centerMode: true
    });
    var tLeft = $("#tLeft");
    var tRight = $("#tRight");
    $("#testimonials").slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: tLeft,
        nextArrow: tRight,
        asNavFor: '#testimonials-nav',
        onAfterChange: function () {
            var slideIndex = $("#testimonials").slickCurrentSlide();
            var items = $("#testimonials-nav").find(".nav-item");
            items.removeClass("active");
            $.each(items, function(){
                if ($(this).attr("index") == slideIndex) {
                    $(this).addClass("active")
                }
            });
        }
    });
    $("#testimonials-nav").slick({
        dots: false,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        focusOnSelect: true,
        asNavFor: '#testimonials',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    dots: false,
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    focusOnSelect: true,
                    asNavFor: '#testimonials'
                }
            }
        ]

    });
});
