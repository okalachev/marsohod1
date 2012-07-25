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
            $title = $('<div/>').addClass('fisheye-title').hide().appendTo('body');

        $(document).mousemove(function(e) {
            $items.each(function() {
                var $item = $(this),
                    position = $item.offset(),
                    itemX = position.left + $item.width() / 2,
                    itemY = position.top + $item.height() / 2,
                    distance = Math.sqrt(
                        Math.pow(itemX - e.pageX, 2) + Math.pow((itemY - e.pageY) * opts.yCoeff, 2)
                    ), // Distance between the center of the item and the pointer
                    mult = distance < opts.dist ?
                        ((opts.dist - distance) / opts.dist) * opts.coeff : 0,
                    px = opts.from + (mult * (opts.to - opts.from));
                $(this)
                    .css('height', px +'px')
                    .css('margin-top', -(px - opts.from) + 'px')
                    //.css('box-shadow', '0 0 ' + (mult * 20) + 'px 0 silver')
            });
        });

        $this.on('mouseenter', opts.items, function() {
            var $item = $(this);
            if ($item.attr('title')) {
                $title
                    .html($item.attr('title'))
                    .css('top', $item.offset().top + $item.height())
                    .show()
                    .css('left', $item.offset().left + $item.width() / 2 - $title.width() / 2); // TODO
            }
        });

        $this.on('mouseout', opts.items, function() {
            $title.hide();
        });
    }

})(jQuery);
