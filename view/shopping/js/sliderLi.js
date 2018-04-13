(function ($) {
    var id;
    var id2;
    var serial = 0;
    var liTotal = 0;
    var ckU = 0;

    let dataFromDB = function () {
        $.ajax({
            url: "admin/objectAll.php",
            type: "POST",
            data: {sliderLi: "active"},
            cache: false,
            beforeSend: function (xhr) {
            },
            success: function (data, textStatus, jqXHR) {
                let json=JSON.parse(data);
                let ul=$(".slider ul");
                let li="<li></li>";
                for(let i=0;i<json.length;i++){
                    $(li).html("<img src="+'admin/images/'+json[i]['image']+">").appendTo(ul);
                }
                var len=$(".slider ul").find("li").length;
                $(".sliderLi p").text("check our all new products here. total new products is "+len);
            }
        });
    }
    
    dataFromDB();

    function twink() {
        var deferred = $.Deferred();
        var width = $(window).width();
        if (width > 991) {
            serial = 4;
            deferred.resolve();
        }
        if (width < 991) {
            serial = 3;
            deferred.resolve();
        }
        liTotal = $(".slider ul").find("li").length - serial;
        return deferred.promise();
    }
    function widthHeight() {
        var deferred = $.Deferred();
        $(".slider ul li").css({"left": 0 + "%"});

        $(".slider ul").find("li").each(function (index) {
            $(this).css({"width": (100 / serial) + "%", "left": "+=" + (100 / serial) * index + "%"});
        });
        $(".slider").css({"height": $(".slider ul li").height() - 5 + "px"});
        deferred.resolve();
        return deferred.promise();
    }
    function slider(ev = "") {
        const full = $(".slider ul").find("li").length - serial;
        var balLiTotal = 0;
        let className = ev.target.className;
        let plusMinus = (className === "next") ? -1 : 1;
        balLiTotal += liTotal + plusMinus;

        if (balLiTotal < 0 || balLiTotal > full) {
            return false;
        } else {
            $(".slider ul").find("li").each(function () {
                $(this).animate({"left": "+=" + (100 / serial) * plusMinus + "%"}, 300);
            });
            liTotal = balLiTotal;
    }
    }
    $(window).on("resize load", function () {
        clearTimeout(id);//if resize the window, setTimeout will be cleared !
        id = setTimeout(function () {//put setTimeout into 'id' for next time 'clearTimeout()'
            $.when(twink()).then(function () {
                return widthHeight();
            }).then(function () {
                let trigger = $("button");
                trigger.on("click", function (event) {
                    slider(event);
                });
            });
        }, 350);
    });
}(jQuery));