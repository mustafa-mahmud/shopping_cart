(function ($) {
    $(function () {
        //uppercase first character of <th>;
        $("th").each(function () {
            let word = $(this).text();
            let firstCharacter=word.charAt(0);
            $(this).text(word.replace(firstCharacter,firstCharacter.toUpperCase()));
        });
        //first value for <tbody><tr> from DB
        function firstValue(){
            $.ajax({
                type:"POST",
                url:"memberObject.php",
                cache: false,
                async: false,
                data:{allData:"member"},
                beforeSend:function(){},
                success:function(data){
                    console.log(data);
                }
            });
        }
        firstValue();
    });
}(jQuery));