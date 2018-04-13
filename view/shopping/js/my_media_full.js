(function ($) {
    $(document).ready(function () {
        //add background video
        $('.my-background-video').bgVideo();
        // infine scroll bar function;
        function infinite_scroll() {
            var content = $(".user_like"), autoScrollTimer = 8000, autoScrollTimerAdjust, autoScroll;
            content.mCustomScrollbar({
                scrollButtons: {enable: true},
                callbacks: {
                    whileScrolling: function () {
                        autoScrollTimerAdjust = autoScrollTimer * this.mcs.topPct / 100;
                    },
                    onScroll: function () {
                        if ($(this).data("mCS").trigger === "internal") {
                            AutoScrollOff();
                        }
                    }
                }
            });
            content.addClass("auto-scrolling-on auto-scrolling-to-bottom");
            AutoScrollOn("bottom");
            $(".auto-scrolling-toggle").hover(function (e) {
                e.preventDefault();
                if (content.hasClass("auto-scrolling-on")) {
                    AutoScrollOff();
                } else {
                    if (content.hasClass("auto-scrolling-to-top")) {
                        AutoScrollOn("top", autoScrollTimerAdjust);
                    } else {
                        AutoScrollOn("bottom", autoScrollTimer - autoScrollTimerAdjust);
                    }
                }
            });

            function AutoScrollOn(to, timer) {
                if (!timer) {
                    timer = autoScrollTimer;
                }
                content.addClass("auto-scrolling-on").mCustomScrollbar("scrollTo", to, {scrollInertia: timer, scrollEasing: "easeInOutSmooth"});
                autoScroll = setTimeout(function () {
                    if (content.hasClass("auto-scrolling-to-top")) {
                        AutoScrollOn("bottom", autoScrollTimer - autoScrollTimerAdjust);
                        content.removeClass("auto-scrolling-to-top").addClass("auto-scrolling-to-bottom");
                    } else {
                        AutoScrollOn("top", autoScrollTimerAdjust);
                        content.removeClass("auto-scrolling-to-bottom").addClass("auto-scrolling-to-top");
                    }
                }, timer);
            }

            function AutoScrollOff() {
                clearTimeout(autoScroll);
                content.removeClass("auto-scrolling-on").mCustomScrollbar("stop");
            }
        }
        //====design for all media queries====;
        $(".navbar-nav > li > a").css({"padding-top": "15px", "padding-bottom": "15px"});
        $(":header,p").css({"margin": "0px"});
        $("#my_mini_user .dropdown-menu").css({"right": "0", "left": "auto"});
        $(".navbar").css({"border-radius": "0", "margin-bottom": "0px", "min-height": "0"});
        $(".navbar-nav").css({"margin": "0"});

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
                //slider+nav strat....
                $("#my_img_text2").append($("#my_text2"));
                $("#my_img_text").removeClass("my_col_50th my_col_30th").addClass("my_col_full");
                $("#my_img_text2").removeClass("my_col_50th my_col_30th").addClass("my_col_full");
                $("#my_img_text3").removeClass("my_col_50th my_col_30th").addClass("my_col_full");
                $("#my_big_menu").addClass("sr-only");
                $("#my_mini_menu").removeClass("sr-only");
                var yz = $("#my_menu").height();
                $("#my_user").height(yz).css({"line-height": "0px"});
                $("#my_text,#my_text2,#my_text3").css({"height": "auto"});
                $(".search_filter_like").css({"margin-top": "50px"});
                //slider+nav end.....

                //cart fixed bar start......................
                var window_width = $(window).width();
                var cart_width = $(".cart").outerWidth(true);
                var cart_dtails_width = parseInt(window_width - cart_width);
                //default animation if ani cart in cart bar;
                if ($("li").parent().is(".mini_product ul") === true) {
                    $(".cart_details").animate({
                        width: cart_dtails_width,
                        paddingRight: "10px",
                        paddingLeft: "10px"
                    }, "slow", function () {
                        $(".cart_details").mCustomScrollbar("update");//very very important; it will update scroll bar;
                        $(".cart_details").mCustomScrollbar({
                            axis: "x",
                            advanced: {
                                autoExpandHorizontalScroll: true //very very important; it get auto scroll bar;
                            }
                        });
                    });
                }
                $(".add_me").off().on("click", function () {
                    //this is only for 'cart_details' DIV width increasing..........
                    $(".cart_details").animate({
                        width: cart_dtails_width,
                        paddingRight: "10px",
                        paddingLeft: "10px"
                    }, "slow", function () {
                        $(".cart_details").mCustomScrollbar("update");//very very important; it will update scroll bar;
                        $(".cart_details").mCustomScrollbar({
                            axis: "x",
                            advanced: {
                                autoExpandHorizontalScroll: true //very very important; it get auto scroll bar;
                            }
                        });
                    });
                    //this is for clone.............

                    //product_item- top.left.width.height;
                    var clone_width = $(this).parent().width() + "px";
                    var clone_height = $(this).parent().height() + "px";
                    //clone .product_wrapper
                    $(this).parent().clone().addClass("clone_class").css({"position": "absolute", "top": "0", "left": "23px", "width": clone_width, "height": clone_height}).prependTo(this);
                    //cart top.left.width.height;
                    var cart_top = parseInt($("#my_cart").offset().top);
                    var clone_pro_top = parseInt($(this).parent().offset().top);
                    var clone_pro_left = parseInt($(this).parent().offset().left);
                    $(".clone_class").animate({
                        top: cart_top - clone_pro_top - 10 + "px",
                        left: -clone_pro_left + 10 + "px",
                        width: "0px",
                        height: "0px"
                    }, "slow", function () {
                        $(this).remove();
                        var img = $(this).find(".item img").attr("src");
                        var name = $(this).find(".pro_name").html().substr(5);
                        var price = $(this).find(".pro_price").html().substr(6);
                        $(".mini_product ul").append("<li class='clone_html_mini'>" + "<img src=" + img + ">" + "<span class='cross'>x</span>" + "<br/>" + "<span class='name'>" + name + "</span>" + "<br/>" + "<span class='prices'>" + price + "</span>" + "</li>");
                        var itme_data = parseInt($(this).find(".item").attr("data-price"));
                        var main_data = parseInt($(".cart").attr("data-price"));
                        var total_amount = parseInt(main_data + itme_data);
                        var total_element = parseInt($(".cart_details ul li").length);
                        $(".total").html(total_element);
                        $(".cart").attr("data-price", total_amount);
                        $(".dollars").html("$" + total_amount);

                        //work for deletation after product from cart....
                        $(".cross").off().on("click", function (event) {
                            event.stopPropagation();//if bubbling then stopped;
                            $(this).parent().remove();//remove mini cart addedd
                            var total_element = parseInt($(".cart_details ul li").length);
                            $(".total").html(total_element - 1 + 1);
                            //mini cart price deletion
                            var mini_cart_price = parseInt($(this).parent().find(".prices").html().substr(2));
                            var last_cart = parseInt($(".cart").attr("data-price")) - mini_cart_price;
                            $(".cart").attr("data-price", last_cart);
                            $(".dollars").html("$" + last_cart);
                            //if all product is finished by deletating from cart......
                            if ($("li").parent().is(".mini_product ul") === false) {//ck if li available or not
                                $(".cart_details").animate({
                                    width: "0px",
                                    padding: "0px"
                                }, "slow", function () {
                                });
                            }
                        });
                    });
                });
                //cart fixed bar end........................

                //one_back start
                $("#one_back").addClass("my_col_full").css({"padding": "0"});
                $(".add").removeClass("my_col_25th").addClass("my_col_full");
                $(".styleText").css({"font-size": "1.5em"});
                $(".edited_text , .edited_text span").css({"font-size": "1.2em"});
                $("#one_back .bride_div").css({"width": "100%", "padding": "10px"});
                $("#one_back .men_add_women .add ul li").removeClass("my_col_50th").addClass("my_col_full").css({"margin-bottom": "0px"});
                $(".men").removeClass("my_col_35th").addClass("sr-only");
                $(".women").removeClass("my_col_35th").addClass("sr-only");
                //one_back end
                //cart+production start.......
                $(".search_filter_like").removeClass("my_col_30th my_col_25th").addClass("my_col_full");
                $(".products").removeClass("my_col_70th my_col_75th").addClass("my_col_full");
                $(".product_wrapper").removeClass("my_col_50th my_col_30th my_col_25th").addClass("my_col_full");
                $(".user_like_pro").addClass("sr-only");
                //cart+production end.......

                //info_user+info_buying start.....
                $("#animated_div").addClass("my_col_full").css({"padding": "10px"});
                $(".info_user").removeClass("my_col_25th").addClass("my_col_full");
                $(".info_buying").removeClass("my_col_75th").addClass("my_col_full");
                $(".promoting").removeClass("my_col_30th").addClass("my_col_full").css({"margin-bottom": "10px", "padding": "5px"});
                //info_user+info_buying end.....

                //my_address+my_social start.....
                $("#my_address_social").css({"padding": "5px"});
                $("#my_address").removeClass("my_col_40th my_col_30_2th").addClass("my_col_full");
                $("#my_social").removeClass("my_col_60th my_col_70_2th").addClass("my_col_full").css({"padding-left": "0px"});
                $("#my_address h3").css({"margin-top": "0px", "padding-left": "0px"});
                $("#my_social .socialism .socials_icon ul li i").css({"font-size": "3.375em"});
                $("#my_social .img_back").removeClass("my_col_50th").addClass("sr-only");
                $("#my_social .socialism").removeClass("my_col_50th").addClass("my_col_full").css({"margin-top": "10px", "padding-left": "0px"});
                //my_address+my_social end.......

                //my_copyright start.......
                $("#my_copyright").addClass("my_col_full");
                //my_copyright end.......

            }
            //MIN WIDTH
            if (arr[1].matches) {//1=>400-499; 1=>400-499; 1=>400-499; 1=>400-499; 1=>400-499; 1=>400-499; 1=>400-499;
                //slider+nav strat....
                $("#my_img_text2").append($("#my_text2"));
                $("#my_img_text").removeClass("my_col_50th my_col_30th").addClass("my_col_full");
                $("#my_img_text2").removeClass("my_col_50th my_col_30th").addClass("my_col_full");
                $("#my_img_text3").removeClass("my_col_50th my_col_30th").addClass("my_col_full");
                $("#my_big_menu").addClass("sr-only");
                $("#my_mini_menu").removeClass("sr-only");
                var yz = $("#my_menu").height();
                $("#my_user").height(yz).css({"line-height": "0px"});
                $("#my_text,#my_text2,#my_text3").css({"height": "auto"});
                //slider+nav end.....

                //cart fixed bar start......................
                var window_width = $(window).width();
                var cart_width = $(".cart").outerWidth(true);
                var cart_dtails_width = parseInt(window_width - cart_width);
                //default animation if ani cart in cart bar;
                if ($("li").parent().is(".mini_product ul") === true) {
                    $(".cart_details").animate({
                        width: cart_dtails_width,
                        paddingRight: "10px",
                        paddingLeft: "10px"
                    }, "slow", function () {
                        $(".cart_details").mCustomScrollbar("update");//very very important; it will update scroll bar;
                        $(".cart_details").mCustomScrollbar({
                            axis: "x",
                            advanced: {
                                autoExpandHorizontalScroll: true //very very important; it get auto scroll bar;
                            }
                        });
                    });
                }
                $(".add_me").off().on("click", function () {
                    //this is only for 'cart_details' DIV width increasing..........
                    $(".cart_details").animate({
                        width: cart_dtails_width,
                        paddingRight: "10px",
                        paddingLeft: "10px"
                    }, "slow", function () {
                        $(".cart_details").mCustomScrollbar("update");//very very important; it will update scroll bar;
                        $(".cart_details").mCustomScrollbar({
                            axis: "x",
                            advanced: {
                                autoExpandHorizontalScroll: true //very very important; it get auto scroll bar;
                            }
                        });
                    });
                    //this is for clone.............

                    //product_item- top.left.width.height;
                    var clone_width = $(this).parent().width() + "px";
                    var clone_height = $(this).parent().height() + "px";
                    //clone .product_wrapper
                    $(this).parent().clone().addClass("clone_class").css({"position": "absolute", "top": "0", "left": "23px", "width": clone_width, "height": clone_height}).prependTo(this);
                    //cart top.left.width.height;
                    var cart_top = parseInt($("#my_cart").offset().top);
                    var clone_pro_top = parseInt($(this).parent().offset().top);
                    var clone_pro_left = parseInt($(this).parent().offset().left);
                    $(".clone_class").animate({
                        top: cart_top - clone_pro_top + 12 + "px",
                        left: -clone_pro_left + 20 + "px",
                        width: "0px",
                        height: "0px"
                    }, 800, function () {
                        $(this).remove();
                        var img = $(this).find(".item img").attr("src");
                        var name = $(this).find(".pro_name").html().substr(5);
                        var price = $(this).find(".pro_price").html().substr(6);
                        $(".mini_product ul").append("<li class='clone_html_mini'>" + "<img src=" + img + ">" + "<span class='cross'>x</span>" + "<br/>" + "<span class='name'>" + name + "</span>" + "<br/>" + "<span class='prices'>" + price + "</span>" + "</li>");
                        var itme_data = parseInt($(this).find(".item").attr("data-price"));
                        var main_data = parseInt($(".cart").attr("data-price"));
                        var total_amount = parseInt(main_data + itme_data);
                        var total_element = parseInt($(".cart_details ul li").length);
                        $(".total").html(total_element);
                        $(".cart").attr("data-price", total_amount);
                        $(".dollars").html("$" + total_amount);

                        //work for deletation after product from cart....
                        $(".cross").off().on("click", function (event) {
                            event.stopPropagation();//if bubbling then stopped;
                            $(this).parent().remove();//remove mini cart addedd
                            var total_element = parseInt($(".cart_details ul li").length);
                            $(".total").html(total_element - 1 + 1);
                            //mini cart price deletion
                            var mini_cart_price = parseInt($(this).parent().find(".prices").html().substr(2));
                            var last_cart = parseInt($(".cart").attr("data-price")) - mini_cart_price;
                            $(".cart").attr("data-price", last_cart);
                            $(".dollars").html("$" + last_cart);
                            //if all product is finished by deletating from cart......
                            if ($("li").parent().is(".mini_product ul") === false) {//ck if li available or not
                                $(".cart_details").animate({
                                    width: "0px",
                                    padding: "0px"
                                }, "slow", function () {
                                });
                            }
                        });
                    });
                });
                //cart fixed bar end........................
                $(".search_filter_like").css({"margin-top": "50px"});

                //cart+production start.......
                $(".search_filter_like").removeClass("my_col_30th my_col_25th").addClass("my_col_full");
                $(".user_like_pro").addClass("sr-only");
                $(".products").removeClass("my_col_70th my_col_75th").addClass("my_col_full");
                $(".product_wrapper").removeClass("my_col_50th my_col_30th my_col_25th").addClass("my_col_full");
                infinite_scroll();
                $(window).on("resize", function () {
                    var content = $(".user_like"), autoScrollTimer = 8000, autoScrollTimerAdjust, autoScroll;
                    content.mCustomScrollbar({
                        scrollButtons: {enable: true},
                        callbacks: {
                            whileScrolling: function () {
                                autoScrollTimerAdjust = autoScrollTimer * this.mcs.topPct / 100;
                            },
                            onScroll: function () {
                                if ($(this).data("mCS").trigger === "internal") {
                                    AutoScrollOff();
                                }
                            }
                        }
                    });
                    content.addClass("auto-scrolling-on auto-scrolling-to-bottom");
                    AutoScrollOn("bottom");
                    $(".auto-scrolling-toggle").hover(function (e) {
                        e.preventDefault();
                        if (content.hasClass("auto-scrolling-on")) {
                            AutoScrollOff();
                        } else {
                            if (content.hasClass("auto-scrolling-to-top")) {
                                AutoScrollOn("top", autoScrollTimerAdjust);
                            } else {
                                AutoScrollOn("bottom", autoScrollTimer - autoScrollTimerAdjust);
                            }
                        }
                    });

                    function AutoScrollOn(to, timer) {
                        if (!timer) {
                            timer = autoScrollTimer;
                        }
                        content.addClass("auto-scrolling-on").mCustomScrollbar("scrollTo", to, {scrollInertia: timer, scrollEasing: "easeInOutSmooth"});
                        autoScroll = setTimeout(function () {
                            if (content.hasClass("auto-scrolling-to-top")) {
                                AutoScrollOn("bottom", autoScrollTimer - autoScrollTimerAdjust);
                                content.removeClass("auto-scrolling-to-top").addClass("auto-scrolling-to-bottom");
                            } else {
                                AutoScrollOn("top", autoScrollTimerAdjust);
                                content.removeClass("auto-scrolling-to-bottom").addClass("auto-scrolling-to-top");
                            }
                        }, timer);
                    }

                    function AutoScrollOff() {
                        clearTimeout(autoScroll);
                        content.removeClass("auto-scrolling-on").mCustomScrollbar("stop");
                    }
                });
                //cart+production end.......

                //one_back start
                $("#one_back").addClass("my_col_full").css({"padding": "0"});
                $(".add").removeClass("my_col_25th").addClass("my_col_full").css({"margin": "0px"});
                $(".styleText").css({"font-size": "1.5em"});
                $(".edited_text , .edited_text span").css({"font-size": "1.2em"});
                $("#one_back .bride_div").css({"width": "100%", "padding": "10px"});
                $("#one_back .men_add_women .add ul li").removeClass("my_col_50th").addClass("my_col_full").css({"margin-bottom": "0px"});
                $(".men").removeClass("my_col_35th").addClass("sr-only");
                $(".women").removeClass("my_col_35th").addClass("sr-only");
                //one_back end

                //info_user+info_buying start.....
                $("#animated_div").addClass("my_col_full").css({"padding": "10px"});
                $(".info_user").removeClass("my_col_25th").addClass("my_col_full");
                $(".info_buying").removeClass("my_col_75th").addClass("my_col_full");
                $(".promoting").removeClass("my_col_30th").addClass("my_col_full").css({"margin-bottom": "10px", "padding": "5px"});
                //info_user+info_buying end.....

                //my_address+my_social start.....
                $("#my_address_social").css({"padding": "5px"});
                $("#my_address").removeClass("my_col_40th my_col_30_2th").addClass("my_col_full");
                $("#my_social").removeClass("my_col_60th my_col_70_2th").addClass("my_col_full").css({"padding-left": "00px"});
                $("#my_address h3").css({"margin-top": "0px", "padding-left": "0px"});
                $("#my_social .socialism .socials_icon ul li i").css({"font-size": "3.375em"});
                $("#my_social .img_back").removeClass("my_col_50th").addClass("sr-only");
                $("#my_social .socialism").removeClass("my_col_50th").addClass("my_col_full").css({"margin-top": "10px", "padding-left": "0px"});
                //my_address+my_social end.......

                //my_copyright start.......
                $("#my_copyright").addClass("my_col_full");
                //my_copyright end.......

            }

            //MIN WIDTH
            if (arr[2].matches) {//2=>500-599; 2=>500-599; 2=>500-599; 2=>500-599; 2=>500-599; 2=>500-599; 2=>500-599;
                //cart+production start.......
                $(".search").css({"margin": "0 auto", "margin-top": "40px", "clear": "both", "width": "95%"});
                $(".filter").css({"margin": "0 auto", "margin-top": "40px", "clear": "both", "width": "95%"});
                $(".product_wrapper").css({"padding-left": "0.5%", "padding-right": "0.5%", "margin-bottom": "20px"});
                $(".product_wrapper").removeClass("my_col_full my_col_30th my_col_25th").addClass("my_col_50th");
                //cart+production end.......


                //my_address+my_social start.....
                //my_address+my_social end.......

                //my_copyright start.......
                //my_copyright end.......

                //user prfile start.......

                //user prfile end.......

            }
            //MIN WIDTH
            if (arr[3].matches) {//3=>600-699; 3=>600-699; 3=>600-699; 3=>600-699; 3=>600-699; 3=>600-699; 3=>600-699;
                //slider+nav strat....
                $("#my_big_menu").addClass("sr-only");
                $("#my_mini_menu").removeClass("sr-only");
                $("#my_img_text").removeClass("my_col_full my_col_30th").addClass("my_col_50th");
                $("#my_img_text2").removeClass("my_col_full my_col_30th").addClass("my_col_50th");
                $("#my_img_text3").removeClass("my_col_50th my_col_30th").addClass("my_col_full");
                var img_height = $("#my_img").height();//#img_img img height got 
                $("#my_text").height(img_height);//text height must equal to img height
                $("#my_img_text2").prepend($("#my_text2").height(img_height));//text add before img
                var yz = $("#my_menu").height();
                $("#my_user").height(yz);
                //slider+nav end.....


                //cart+production start.......
                //cart+production end.......

                //one_back start
                $("#one_back").addClass("my_col_full").css({"padding": "0"});
                $(".add").removeClass("my_col_25th").addClass("my_col_full").css({"margin": "0px"});
                $(".styleText").css({"font-size": "1.5em"});
                $(".edited_text , .edited_text span").css({"font-size": "1.2em"});
                $("#one_back .bride_div").css({"width": "100%", "padding": "10px"});
                $("#one_back .men_add_women .add ul li").removeClass("my_col_full").addClass("my_col_50th").css({"margin-bottom": "0px"});

                $(".men").removeClass("my_col_35th").addClass("sr-only");
                $(".women").removeClass("my_col_35th").addClass("sr-only");
                //one_back end

                //my_copyright start.......
                $("#my_copyright").addClass("my_col_full");
                //my_copyright end.......
            }
            if (arr[4].matches) {//4=>700-799; 4=>700-799; 4=>700-799; 4=>700-799; 4=>700-799; 4=>700-799; 4=>700-799;
                //slider+nav strat....
                $("#my_big_menu").removeClass("sr-only");
                $("#my_mini_menu").addClass("sr-only");
                $("nav ul:first").css({"display": "block"});
                $(".navbar").css({"border-radius": "0"});
                $(".collapse ").css({"display": "none !important"});
                var xy = $("#my_big_menu").height() - 14;
                $("#my_user").height(xy).css({"line-height": "30px"});
                //slider+nav end.....

                //cart+production start.......
                $(".search_filter_like").removeClass("my_col_full my_col_25th").addClass("my_col_30th");
                $(".search_filter_like").css({"margin-top": "0"});
                $(".search").css({"margin": "0 auto", "margin-top": "0px", "width": "100%"});
                $(".filter").css({"margin": "0 auto", "margin-top": "0px", "width": "100%"});
                $(".products").removeClass("my_col_full my_col_75th").addClass("my_col_70th");
                $(".user_like_pro").removeClass("sr-only");
                //cart+production end.......

                //one_back start
                $("#one_back").addClass("my_col_full").css({"padding": "50px"});
                $(".add").removeClass("my_col_25th").addClass("my_col_full");
                $(".styleText").css({"font-size": "1.5em"});
                $(".edited_text , .edited_text span").css({"font-size": "1.2em"});
                $("#one_back .bride_div").addClass("my_col_full").css({"padding": "10px"});
                $(".men").removeClass("my_col_35th").addClass("sr-only");
                $(".women").removeClass("my_col_35th").addClass("sr-only");
                //one_back end

                //info_user+info_buying start.....
                $("#animated_div").addClass("my_col_full").css({"padding": "10px"});
                $(".info_user").removeClass("my_col_25th").addClass("my_col_full");
                $(".info_buying").removeClass("my_col_75th").addClass("my_col_full");
                $(".promoting").removeClass("my_col_full").addClass("my_col_30th").css({"padding": "10px"});
                //info_user+info_buying end.....

                //my_address+my_social start.....
                $("#my_address_social").css({"padding": "5px"});
                $("#my_address").removeClass("my_col_30_2th").addClass("my_col_40th");
                $("#my_social").removeClass("my_col_70_2th").addClass("my_col_60th");
                $("#my_address h3").css({"margin-top": "0px", "padding-left": "0px", "font-size": "1em"});
                $("#my_social .socialism .socials_icon ul li i").css({"font-size": "3.375em"});
                $("#my_social .img_back").removeClass("my_col_50th").addClass("sr-only");
                $("#my_social .socialism").removeClass("my_col_50th").addClass("my_col_full").css({"margin-top": "10px", "padding-left": "0px"});
                //my_address+my_social end.......

                //my_copyright start.......
                //my_copyright end.......

            }
            if (arr[5].matches) {//5=>800-899; 5=>800-899; 5=>800-899; 5=>800-899; 5=>800-899; 5=>800-899; 5=>800-899;
                //slider+nav strat....
                $("#my_img_text").removeClass("my_col_50th my_col_full ").addClass("my_col_30th");
                $("#my_img_text2").removeClass("my_col_50th my_col_full ").addClass("my_col_30th");
                $("#my_img_text3").removeClass("my_col_full my_col_50th").addClass("my_col_30th");
                var img_height = $("#my_img").height();//#img_img img height got 
                $("#my_text").height(img_height);//text height must equal to img height
                $("#my_img_text2").prepend($("#my_text2").height(img_height));//text add before img
                var img3_height = $("#my_img3").height();
                $("#my_text3").height(img3_height);
                //slider+nav end.....

                //cart+production start.......
                //cart+production end.......

                //one back start...........
                $("#one_back .men_add_women .add ul li").removeClass("my_col_full").addClass("my_col_50th").css({"margin-bottom": "0px"});
                $("#one_back .men_add_women .add ul li div").css({"padding": "10px"});
                //one back end...............

                //my_address+my_social start.....
                $("#my_social").addClass("my_col_60th").css({"padding-left": "50px"});
                //my_address+my_social end.......

                //my_copyright start.......
                //my_copyright end.......
            }
            if (arr[6].matches) {//6=>900-999; 6=>900-999; 6=>900-999; 6=>900-999; 6=>900-999; 6=>900-999; 6=>900-999;
                //cart+production start.......
                //cart+production end.......

                //one_back start
                $("#one_back").addClass("my_col_full").css({"padding": "50px"});
                $(".add").removeClass("my_col_full").addClass("my_col_25th").css({"margin": "2.5%", "margin-top": "0px", "margin-bottom": "0px"});
                $("#one_back .men_add_women .add ul li div").css({"padding": "0px"});
                $("#one_back .men_add_women .add ul li").removeClass("my_col_50th").addClass("my_col_full").css({"margin-bottom": "20px"});
                $(".men").removeClass("sr-only").addClass("my_col_35th");
                $(".women").removeClass("sr-only").addClass("my_col_35th");
                //one_back end

                //info_user+info_buying start.....
                $("#animated_div").addClass("my_col_full").css({"padding": "50px"});
                $(".info_user").removeClass("my_col_full").addClass("my_col_25th").css({"margin-top": "100px", "padding": "0px"});
                $(".info_buying").removeClass("my_col_full").addClass("my_col_75th").css({"padding": "0px"});
                //info_user+info_buying end.....

                //my_address+my_social start.....
                $("#my_address_social").css({"padding": "10px", "padding-top": "50px", "padding-bottom": "50px"});
                $("#my_address").removeClass("my_col_40th my_col_full").addClass("my_col_30_2th");
                $("#my_social").removeClass("my_col_60th my_col_full").addClass("my_col_70_2th").css({"padding-left": "0px"});
                $("#my_address h3").css({"margin-top": "0px", "padding-left": "0px", "font-size": "1em"});
                $("#my_social .socialism .socials_icon ul li i").css({"font-size": "3.375em"});
                $("#my_social .img_back").removeClass("sr-only").addClass("my_col_50th");
                $("#my_social .socialism").removeClass("my_col_full").addClass("my_col_50th");
                //my_address+my_social end.......

                //my_copyright start.......
                //my_copyright end.......
            }
            if (arr[7].matches) {//7=>1000-1099; 7=>1000-1099; 7=>1000-1099; 7=>1000-1099; 7=>1000-1099; 7=>1000-1099;
                //cart+production start.......
                //cart+production end.......

                //one_back start
                $("#one_back").addClass("my_col_full").css({"padding": "50px"});
                $(".add").removeClass("my_col_full").addClass("my_col_25th").css({"margin": "2.5%", "margin-top": "0px", "margin-bottom": "0px"});
                $("#one_back .men_add_women .add ul li div").css({"padding": "10px"});
                $(".men").removeClass("sr-only").addClass("my_col_35th");
                $(".women").removeClass("sr-only").addClass("my_col_35th");
                //one_back end

                //my_address+my_social start.....
                //my_address+my_social end.......

                //my_copyright start.......
                //my_copyright end.......

            }
            if (arr[8].matches) {//8=>1100-1199; 8=>1100-1199; 8=>1100-1199; 8=>1100-1199; 8=>1100-1199; 8=>1100-1199;
                //cart+production start.......
                //cart+production end.......

                //one_back start
                $("#one_back").addClass("my_col_full").css({"padding": "50px"});
                $(".add").removeClass("my_col_full").addClass("my_col_25th");
                $("#one_back .men_add_women .add ul li div").css({"padding": "20px"});
                $(".men").removeClass("sr-only").addClass("my_col_35th");
                $(".women").removeClass("sr-only").addClass("my_col_35th");
                //one_back end

                //my_address+my_social start.....
                //my_address+my_social end.......

                //my_address+my_social start.....
                $(".product_wrapper").removeClass("my_col_full my_col_50th my_col_25th").addClass("my_col_30th");
                //my_address+my_social end.......

                //my_copyright start.......
                //my_copyright end.......

            }
            if (arr[9].matches) {//9=>1200-1299; 9=>1200-1299; 9=>1200-1299; 9=>1200-1299; 9=>1200-1299; 9=>1200-1299;
                //cart+production start.......
                //cart+production end.......

                //my_address+my_social start.....
                //my_address+my_social end.......

                //my_copyright start.......
                //my_copyright end.......

            }
            if (arr[10].matches) {//10=>1300......; 10=>1300......; 10=>1300......; 10=>1300......; 10=>1300......;
                //cart+production start.......
                $(".search_filter_like").removeClass("my_col_30th my_col_full").addClass("my_col_25th");
                $(".products").removeClass("my_col_70th my_col_full").addClass("my_col_75th");
                $(".product_wrapper").removeClass("my_col_full my_col_50th my_col_30th").addClass("my_col_25th");
                //cart+production end.......

                //my_address+my_social start.....
                //my_address+my_social end.......

                //my_copyright start.......
                //my_copyright end.......

            }

        }, {
            delay: 250
        });
        $(window).on("resize", processWindowResize);
        processWindowResize();


// NAVBAR START FORM HERE...............
        $(window).scroll(function () {
            $('.navbar').affix({
                offset: {top: function () {
                        return $('.carousel-inner').outerHeight(true);
                    }, bottom: 50}
            }).on('affix.bs.affix', function () {
                $('#main').css('margin-top', $('.navbar').outerHeight(true) + 'px');
                $(".navbar").addClass("animated rubberBand");
            }).on('affix-top.bs.affix', function () {
                $('#main').css('margin-top', '0');
                $(".navbar").removeClass("animated rubberBand");
            });
        }).resize(function () {
            $('.navbar').affix({
                offset: {top: function () {
                        return $('.carousel-inner').outerHeight(true);
                    }, bottom: 50}
            });
        });
// NAVBAR END HERE..................    

//product make vertical scroll bar;
        $(".products").mCustomScrollbar("update");//very very important; it will update scroll bar;
        $(".products").mCustomScrollbar({
            axis: "y",
            theme: "3d",
            advanced: {
                autoExpandHorizontalScroll: true //very very important; it get auto scroll bar;
            }
        });
    });
}(jQuery));