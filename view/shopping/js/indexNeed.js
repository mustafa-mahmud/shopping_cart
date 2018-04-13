(function ($) {
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
}(jQuery));