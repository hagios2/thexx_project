jQuery(document).ready(function($){
    // Swiper BANNERS
    if( $('.swiper-theclub-categories').length ) {
        var swiperTheClubCategories = new Swiper('.swiper-theclub-categories', {
            // Optional parameters
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            direction: 'horizontal',
            loop: false,
            freeMode: false,
            spaceBetween: 20,
            slidesPerView: 1,
            breakpoints: {
                320: {
                    slidesPerView: 2,
                },
                640: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
                1200: {
                    slidesPerView: 5,
                }
            },
            // init: false,
        });
        $('.swiper-slide').on('mouseover', function () {
            swiperTags.autoplay.stop();
        });

        $('.swiper-slide').on('mouseout', function () {
            swiperTags.autoplay.start();
        });
    }

    if( $('.swiper-banner-small-size').length ) {
        // Swiper small publicity BANNERS
        var swiperTags = new Swiper('.swiper-banner-small-size', {
            // Optional parameters
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            direction: 'horizontal',
            loop: false,
            freeMode: false,
            spaceBetween: 20,
            slidesPerView: 1,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
                1200: {
                    slidesPerView: 5,
                }
            },
            // init: false,
        });
        $('.swiper-slide').on('mouseover', function () {
            swiperTags.autoplay.stop();
        });

        $('.swiper-slide').on('mouseout', function () {
            swiperTags.autoplay.start();
        });
    }

    // Swiper FAVORITES
    if( $('.swiper-wrapper-favorites').length ) {
        var swiperTags = new Swiper('.swiper-wrapper-favorites', {
            // Optional parameters
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            direction: 'horizontal',
            loop: false,
            freeMode: false,
            spaceBetween: 10,
            slidesPerView: 1,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 4,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 6,
                }
            },
            // init: false,
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        $('.swiper-slide').on('mouseover', function () {
            swiperTags.autoplay.stop();
        });

        $('.swiper-slide').on('mouseout', function () {
            swiperTags.autoplay.start();
        });
    }

});