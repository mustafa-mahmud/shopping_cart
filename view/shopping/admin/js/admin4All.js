(function ($) {
    $(function () {
        //product sub-menu collapse......
        $("#producting").attr("class", "collapse").on("show.bs.collapse", function (event) {
            var xyz = $(".parentLi2").next().is("ul:visible");
            if (xyz) {
                $(".parentLi2").children("a").trigger("click");
            }
            $(".parentLi").removeClass("arrowDeg").addClass("arrowDeg2");
        });
        $("#producting").attr("class", "collapse").on("hide.bs.collapse", function () {
            $(".parentLi").removeClass("arrowDeg2").addClass("arrowDeg");
        });
        //member sub-menu collapse.......
        $("#membering").attr("class", "collapse").on("show.bs.collapse", function (event) {
            var xyz = $(".parentLi").next().is("ul:visible");
            if (xyz) {
                $(".parentLi").children("a").trigger("click");
            }
            $(".parentLi2").removeClass("arrowDegg").addClass("arrowDegg2");
        });
        $("#membering").attr("class", "collapse").on("hide.bs.collapse", function () {
            $(".parentLi2").removeClass("arrowDegg2").addClass("arrowDegg");
        });

        //input search width reduce.....
        $(document).on("click", function (event) {
            var xyz = event.target.tagName;
            if (xyz === "INPUT") {
                var xyza = event.target.attributes.name.nodeValue;
                if (xyza !== "search") {
                    $("input[name='search']").focusout();
                    $("input[name='search']").css({"width": "130px"});
                }
                else {
                    $("input[name='search']").css({"width": "calc(100% - 150px)"});
                }
            }
            else {
                $("input[name='search']").focusout();
                $("input[name='search']").css({"width": "130px"});
            }
        });
    });
}(jQuery));