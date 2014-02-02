var tpj = jQuery;
tpj.noConflict();

tpj(document).ready(function() {

    // Blur images on mouse over
    tpj(".portfolio a").hover(function() {
        tpj(this).children("img").animate({opacity: 0.75}, "fast");
    }, function() {
        tpj(this).children("img").animate({opacity: 1.0}, "slow");
    });

    // Initialize prettyPhoto plugin
    tpj(".portfolio a[rel^='prettyPhoto']").prettyPhoto({
        theme: 'pp_default',
        autoplay_slideshow: false,
        overlay_gallery: false,
        show_title: false
    });

    // Clone portfolio items to get a second collection for Quicksand plugin
    var tpjportfolioClone = tpj(".portfolio").clone();

    // Attempt to call Quicksand on every click event handler
    tpj(".filter a").click(function(e) {

        tpj(".filter li").removeClass("current");

        // Get the class attribute value of the clicked link
        var tpjfilterClass = tpj(this).parent().attr("class");

        if (tpjfilterClass == "all") {
            var tpjfilteredPortfolio = tpjportfolioClone.find("li");
        } else {
            var tpjfilteredPortfolio = tpjportfolioClone.find("li[data-type~=" + tpjfilterClass + "]");
        }

        // Call quicksand
        tpj(".portfolio").quicksand(tpjfilteredPortfolio, {
            duration: 800,
            easing: 'easeInOutQuad'
        }, function() {

            // Blur newly cloned portfolio items on mouse over and apply prettyPhoto
            tpj(".portfolio a").hover(function() {
                tpj(this).children("img").animate({opacity: 0.75}, "fast");
            }, function() {
                tpj(this).children("img").animate({opacity: 1.0}, "slow");
            });

            tpj(".portfolio a[rel^='prettyPhoto']").prettyPhoto({
                theme: 'pp_default',
                autoplay_slideshow: false,
                overlay_gallery: false,
                show_title: false
            });
        });


        tpj(this).parent().addClass("current");

        // Prevent the browser jump to the link anchor
        e.preventDefault();
    });


    // hide #back-top first
    tpj("#back-top").hide();

    // fade in #back-top
    tpj(function() {
        tpj(window).scroll(function() {
            if (tpj(this).scrollTop() > 100) {
                tpj('#back-top').fadeIn();
            } else {
                tpj('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        tpj('#back-top a').click(function() {
            tpj('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

});


tpj(function() {
    tpj(".meter > span").each(function() {
        tpj(this)
                .data("origWidth", tpj(this).width())
                .width(0)
                .animate({
                    width: tpj(this).data("origWidth")
                }, 1200);
    });
});