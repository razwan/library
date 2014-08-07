var latestKnownScrollY = window.scrollY,
    ticking = false;


/* --- $VIDEOS --- */

function initVideos() {

    var videos = $('.entry-media iframe, .entry-media video, .entry-media embed, .entry-media object');

    // Figure out and save aspect ratio for each video
    videos.each(function () {
        $(this).attr('data-aspectRatio', this.width / this.height)
            // and remove the hard coded width/height
            .removeAttr('height')
            .removeAttr('width');
    });

    // Firefox Opacity Video Hack
    $('iframe').each(function () {
        var url = $(this).attr("src");
        if (!empty(url))
            $(this).attr("src", setQueryParameter(url, "wmode", "transparent"));
    });
}

function resizeVideos() {

    var videos = $('.entry-media iframe, .entry-media video, .entry-media embed, .entry-media object');

    videos.each(function () {
        var video = $(this),
            ratio = video.attr('data-aspectRatio'),
            w = video.css('width', '100%').width(),
            h = w / ratio;

        video.height(h);
    });
}

$(window).on('debouncedresize', function () {
    windowWidth     = $(window).outerWidth();
    windowHeight    = $(window).outerHeight();
});

function requestTick() {
    "use strict";

    if (!ticking) {
        requestAnimationFrame(update);
    }
    ticking = true;
}

function update() {
    "use strict";

    ticking = false;

    updateStickyMenu();
}

/* ====== INTERNAL FUNCTIONS END ====== */


/* ====== ONE TIME INIT ====== */

function init() {

    // /* GLOBAL VARS */
    touch = false;

    //  GET BROWSER DIMENSIONS
    browserSize();

    // /* DETECT PLATFORM */
    platformDetect();

    if (is_android || window.opera) {
        $('html').addClass('android-browser').removeClass('no-android-browser');
    }

    $('html').addClass('loaded');

    /* ONE TIME EVENT HANDLERS */
    eventHandlersOnce();

    /* INSTANTIATE EVENT HANDLERS */
    eventHandlers();

}


/* ====== CONDITIONAL LOADING ====== */

function loadUp() {

    initVideos();
    resizeVideos();

}


/* ====== EVENT HANDLERS ====== */

function eventHandlersOnce() {

}

function eventHandlers() {

}


/* --- GLOBAL EVENT HANDLERS --- */


/* ====== ON DOCUMENT READY ====== */

$(document).ready(function () {

    /* --- INITIALIZE --- */
    init();
    loadUp();
});


/* ====== ON WINDOW LOAD ====== */

$window.load(function () {

    var $nav = $('.nav--main').addClass('hover-intent');

    $('.nav--main li > ul').hide();
    $('.nav--main li').hoverIntent({
        over: showSubMenu,
        out: hideSubMenu,
        timeout: 300
    });

    function showSubMenu() {
        $(this).addClass('hover').children('ul').show();
    }

    function hideSubMenu() {
        $(this).removeClass('hover').children('ul').hide();
    }

});

/* ====== ON JETPACK POST LOAD ====== */

$(document).on('post-load', function () {

    initVideos();
    resizeVideos();

});

/* ====== ON RESIZE ====== */

$window.on("debouncedresize", function (e) {
    resizeVideos();
});

/* ====== ON SCROLL ====== */

$window.on('scroll', function (e) {
    "use strict";

    latestKnownScrollY = window.scrollY;
    requestTick();
});
