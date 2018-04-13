(function($){
    $(function(){
        $(".sign").on("click",function(){
            var xyz=$(this).attr("success");
            if(xyz==="okays"){
                var formData=new FormData($("#signing")[0]); //here is okay for data;
                $.ajax({
                    url:"objectSignUp.php",
                    type:"POST",
                    cache: false,
                    async: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    beforeSend:function(){},
                    success:function(data){
                        var str="success all";
                        var str2="email exists";
                        if(str===data){
                             swal("Success", "Please confirm your reprot by email, otherwise it will be deleted in next 10 days", "success");
                             document.getElementById("signing").reset();
                             $("#mySignUp").find(".close").trigger("click");
                             $(".sign").attr("success","nos");
                             $("i[class^='err']").fadeOut();
                             $("input[id^='u']").css({"border-color":"#ccc"});
                             $("select[id^='u']").css({"border-color":"#ccc"});
                        }
                        else if(str2===data){
                            $(".errEmail").text("* sorry this email already exists!").css({"color":"red"}).fadeIn("slow");
                        }
                        else{
                            alert("sorry went of something wrong!");
                        }
                    }
                });
            }
        });
    });
}(jQuery));