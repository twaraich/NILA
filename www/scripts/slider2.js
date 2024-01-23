$(document).ready(function() {
    $("#news-slider").owlCarousel({
        items : 4,
        itemsDesktop:[1199,4],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:false,
    });
});