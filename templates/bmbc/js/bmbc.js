/**
 * Created by Roxana Zdurcea on 10/13/2016.
 */
jQuery(document).ready(function () {

//menu and search box
    jQuery('.search').addClass('pull-right');
    jQuery('.nav-pills').addClass('pull-left');
//end of menu and search box

//accordion
    var myGroup = jQuery('#accordion2');
    myGroup.on('show.bs.collapse', '.collapse', function () {
        myGroup.find('.collapse.in').collapse('hide');
    });
//end of accordion

//slick slider
    jQuery('.slick').slick({
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: false,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        infinite: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    // end of slick slider




    jQuery('#gruemenu').removeClass('pull-left');



});




// resize blocks
function marketingHeight() {
    jQuery('.marketingHeight').css('min-height', jQuery('.marketing').height());
}
function marketHeight() {
    jQuery('.marketHeight').css('min-height', jQuery('.market').height());
}
// onDocumentReady function bind
jQuery(document).ready(function () {
    marketingHeight();
    marketHeight();
});
// onResize bind of the function
jQuery(window).resize(function () {
    marketingHeight();
    marketHeight();
});
// end of resize blocks
$( ".market" ).load(function() {
    marketingHeight();
    marketHeight();
});
$( ".marketing" ).load(function() {
    marketingHeight();
    marketHeight();
});