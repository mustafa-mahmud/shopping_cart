(function ($) {
    $(function () {
        //uppercase first character of <th>;
        $("th").each(function () {
            let word = $(this).text();
            let firstCharacter = word.charAt(0);
            $(this).text(word.replace(firstCharacter, firstCharacter.toUpperCase()));
        });
        //first value for <tbody><tr> from DB
        function firstValue() {
            $.ajax({
                type: "POST",
                url: "memberObject.php",
                cache: false,
                async: false,
                data: {allData: "member"},
                beforeSend: function () {},
                success: function (data) {
                    console.log(data);
                }
            });
        }
        firstValue();

        //cross button making
         $(".cross").on({
             mouseenter:function(){
                 let visible=$(".line2:visible").length;
                 if(visible>0){
                     $("div[class^='line']").addClass("classHover");
                 }
             },
             mouseleave:function(){
                 $("div[class^='line']").removeClass("classHover");
             }
         });
        $(".cross").on("click", function () {
            $(".rightSideBar").toggleClass("rightSideBarToggle");
            let visible = $(".line2:visible").length;
            if (visible > 0) {
                $(".line1").addClass("rotateLine1");
                $(".line3").addClass("rotateLine3");
                $(".line2").css({"display": "none"});
            } else {
                $(".line1").removeClass("rotateLine1");
                $(".line3").removeClass("rotateLine3");
                $(".line2").css({"display": "block"});
            }
        });
    });
}(jQuery));