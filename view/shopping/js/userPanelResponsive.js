(function ($) {
    $(function () {
        function asyncProxy(fn, options, ctx) {
            var timer = null;
            var counter = 0;
            var _call = function (args) {
                counter = 0;

                fn.apply(ctx, args);
            };

            ctx = ctx || window;
            options = $.extend({
                delay: 0,
                stack: Infinity
            }, options);

            return function () {
                counter++;

                // prevent calling the delayed function multiple times
                if (timer) {
                    clearTimeout(timer);
                    timer = null;
                }

                if (counter >= options.stack) {
                    _call(arguments);
                } else {
                    var args = arguments;

                    timer = setTimeout(function () {
                        timer = null;
                        _call(args);
                    }, options.delay);
                }
            };
        }
        var processWindowResize = asyncProxy(function (event) {

            //..........ALL CODE HERE...............
            //this code for media query
            var arr = [
                //MAX WIDTH
                window.matchMedia("(max-width:399px)"), //0
                //MIN WIDTH
                window.matchMedia("(min-width:400px)"), //1
                window.matchMedia("(min-width:500px)"), //2
                window.matchMedia("(min-width:600px)"), //3
                window.matchMedia("(min-width:700px)"), //4
                window.matchMedia("(min-width:800px)"), //5
                window.matchMedia("(min-width:900px)"), //6
                window.matchMedia("(min-width:1000px)"), //7
                window.matchMedia("(min-width:1100px)"), //8
                window.matchMedia("(min-width:1200px)"), //9
                window.matchMedia("(min-width:1300px)") //10
            ];
            //MAX WIDTH
            if (arr[0].matches) {//0=>max 399;  0=>max 399; 0=>max 399; 0=>max 399; 0=>max 399; 0=>max 399; 0=>max 399;
                $(".menuBar").removeClass(ckRemoveClass(".menuBar")).addClass("my_col_full");
                $(".userBody").removeClass(ckRemoveClass(".userBody")).addClass("my_col_full");
                $(".bigInfo").addClass("sr-only");
                $(".bigMenu").addClass("sr-only");
                $(".smallInfo").removeClass("sr-only");
                $(".smallMenu").removeClass("sr-only");
                $(".smallInfo .DBimg").addClass("my_col_40th");
                $(".smallInfo .uInfo").addClass("my_col_60th");
                $(".smallMenu li").addClass("my_col_50th");
                $(".smallInfo .uInfo li").css({"padding":"5px"});
            }
            //MIN WIDTH
            if (arr[1].matches) {//1=>400-499; 1=>400-499; 1=>400-499; 1=>400-499; 1=>400-499; 1=>400-499; 1=>400-499;
                $(".menuBar").removeClass(ckRemoveClass(".menuBar")).addClass("my_col_full");
                $(".userBody").removeClass(ckRemoveClass(".userBody")).addClass("my_col_full");
                $(".bigInfo").addClass("sr-only");
                $(".bigMenu").addClass("sr-only");
                $(".smallInfo").removeClass("sr-only");
                $(".smallMenu").removeClass("sr-only");

            }
            //MIN WIDTH
            if (arr[2].matches) {//2=>500-599; 2=>500-599; 2=>500-599; 2=>500-599; 2=>500-599; 2=>500-599; 2=>500-599;

            }
            //MIN WIDTH
            if (arr[3].matches) {//3=>600-699; 3=>600-699; 3=>600-699; 3=>600-699; 3=>600-699; 3=>600-699; 3=>600-699;

            }
            //MIN WIDTH
            if (arr[4].matches) {//4=>700-799; 4=>700-799; 4=>700-799; 4=>700-799; 4=>700-799; 4=>700-799; 4=>700-799;
                $(".menuBar").removeClass(ckRemoveClass(".menuBar")).addClass("my_col_25th");
                $(".userBody").removeClass(ckRemoveClass(".userBody")).addClass("my_col_75th");
                $(".bigInfo").removeClass("sr-only");
                $(".bigMenu").removeClass("sr-only");
                $(".smallInfo").addClass("sr-only");
                $(".smallMenu").addClass("sr-only");
            }
            //MIN WIDTH
            if (arr[5].matches) {//5=>800-899; 5=>800-899; 5=>800-899; 5=>800-899; 5=>800-899; 5=>800-899; 5=>800-899;

            }
            //MIN WIDTH
            if (arr[6].matches) {//6=>900-999; 6=>900-999; 6=>900-999; 6=>900-999; 6=>900-999; 6=>900-999; 6=>900-999;

            }
            //MIN WIDTH
            if (arr[7].matches) {//7=>1000-1099; 7=>1000-1099; 7=>1000-1099; 7=>1000-1099; 7=>1000-1099; 7=>1000-1099;
                $(".menuBar").removeClass(ckRemoveClass(".menuBar")).addClass("my_col_20th");
                $(".userBody").removeClass(ckRemoveClass(".userBody")).addClass("my_col_80th");
                $(".bigInfo").removeClass("sr-only");
                $(".bigMenu").removeClass("sr-only");
                $(".smallInfo").addClass("sr-only");
                $(".smallMenu").addClass("sr-only");
            }
            //MIN WIDTH
            if (arr[8].matches) {//8=>1100-1199; 8=>1100-1199; 8=>1100-1199; 8=>1100-1199; 8=>1100-1199; 8=>1100-1199;

            }
            //MIN WIDTH
            if (arr[9].matches) {//9=>1200-1299; 9=>1200-1299; 9=>1200-1299; 9=>1200-1299; 9=>1200-1299; 9=>1200-1299;

            }
            //MIN WIDTH
            if (arr[10].matches) {//10=>1300......; 10=>1300......; 10=>1300......; 10=>1300......; 10=>1300......;

            }

        }, {
            delay: 250
        });

        $(window).on('resize', processWindowResize); // when user resize the page;
        processWindowResize(); // when user direct enter the page;

    });
}(jQuery));