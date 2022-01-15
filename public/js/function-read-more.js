jQuery(document).ready(function($){
    // Define the queries
    const smallScreen = window.matchMedia('(min-width: 1px) and (max-width: 767px)')
    const mediumScreen = window.matchMedia('(min-width: 768px) and (max-width: 1023px)')
    const largeScreen = window.matchMedia('(min-width: 1024px)')
    // Check if the media query is true
    if (smallScreen.matches) {
        $('.show-more').showMore({

            buttontxtmore: "show more",
            buttontxtless: "show less",
            minheight: 250
        });
    }
    if (mediumScreen.matches) {
        $('.show-more').showMore({

            buttontxtmore: "show more",
            buttontxtless: "show less",
            minheight: 40
        });
    }
    if (largeScreen.matches) {
        $('.show-more').showMore({

            buttontxtmore: "show more",
            buttontxtless: "show less",
            minheight: 250
        });
    }

});