(function($, undefined) {

    $.fn.fisheye = function(opts) {
        opts = $.extend({
            items: 'li',
            dist: 150,
            coeff: 2,
            from: 110,
            to: 120,
            yCoeff: 2
        }, opts);

        var $this = $(this),
            $items = $this.find(opts.items),
            $title = $('<div/>').addClass('fisheye-title').hide().appendTo('body'),
            $selected = $();

        // Showing title
        $this.on('mouseenter', opts.items, function() {
            var $item = $(this);
            $selected = $item;
            if ($item.attr('title')) {
                $title.html($item.attr('title')).show();
            }
        });

        // Hiding title
        $this.on('mouseout', opts.items, function() {
            $title.hide();
            $selected = $();
        });

        // The fisheye effect
        $(document).mousemove(function(e) {
            $items.each(function() {
                var $item = $(this),
                    position = $item.offset(),
                    itemX = position.left + $item.width() / 2,
                    itemY = position.top + $item.height() / 2,
                    xDist = itemX - e.pageX,
                    yDist = itemY - e.pageY,
                    distance = Math.sqrt(
                        Math.pow(xDist, 2) + Math.pow(Math.max(Math.abs(yDist), opts.from / 2) * opts.yCoeff, 2)
                    ), // Distance between the center of the item and the pointer
                    mult = distance < opts.dist ?
                        ((opts.dist - distance) / opts.dist) * opts.coeff : 0,
                    px = opts.from + (mult * (opts.to - opts.from));
                $(this)
                    .css('height', px +'px')
                    .css('margin-top', -(px - opts.from) + 'px');
                    //.css('box-shadow', '0 0 ' + (mult * 20) + 'px 0 silver')
            });
            $title
                .css('top', $selected.offset().top + $selected.height())
                .css('left', $selected.offset().left + $selected.width() / 2 - $title.outerWidth() / 2);
        });

    }

})(jQuery);
