/* gridPage Transition */
(function ($, undefined) {

    var $active         = $('.word.current'),
        activeWidth     = $active.outerWidth(),
        containerHeight = $('.box').height(),
        $currentCells   = $('.word.current .cell'),
        cellWidth       = $currentCells.first().width(),
        cellHeight      = $currentCells.first().outerHeight(),
        perRow          = parseInt(activeWidth / cellWidth, 10),
        perColumn       = parseInt($currentCells.length / perRow),
        newHeight       = (containerHeight + 12) / perColumn -12;

    console.log(containerHeight, perColumn, newHeight);
//    $('.cell').height(newHeight);

    $('body').on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $next       = $('.word.next'),
            nextItems   = $('.word.next').find('.cell').length;

        $active         = $('.word.current');

//        TweenMax.staggerTo($('.image'), 1, {
//            x: -1 * activeWidth,
//            ease: Power2.easeInOut,
//            force3D: true
//        }, .01, onComplete);

        $('.word.current .cell').each(function(i, image) {

            var $image = $(image),
                order  = parseInt(i / perRow, 10) + i % perRow,
                delay  = order * .01;

            TweenMax.fromTo($image, 1, {
                x: 0
            }, {
                opacity: 0,
                x: -1 * activeWidth,
                ease: Power2.easeInOut,
                delay: delay,
                force3D: true
            });

        });

        $('.word.next .cell').each(function(i, image) {

            var $image = $(image),
                order  = 3 + parseInt(i / perRow, 10) + i % perRow,
                delay  = order * .01;

            if (nextItems == i + 1) {
                TweenMax.to($image, 1, {
                    opacity: 1,
                    x: -1 * activeWidth,
                    ease: Power2.easeInOut,
                    delay: delay,
                    force3D: true,
                    onComplete: function () {
                        $('.word').css("left", '-=' + activeWidth + 'px');
                        $('.word.current').removeClass('current');
                        $('.word.next').removeClass('next').addClass('current').next().addClass('next');
                        $('.cell').removeAttr("style");
                    }
                });

                return
            }

            TweenMax.to($image, 1, {
                opacity: 1,
                x: -1 * activeWidth,
                ease: Power2.easeInOut,
                delay: delay,
                force3D: true
            });

        });

    });

})(jQuery);
