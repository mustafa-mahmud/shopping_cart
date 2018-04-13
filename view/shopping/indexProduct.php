<script>
    (function ($) {
        $(function () {
            $.post("obj_ForAll_ClassForAll.php", {active: "give"}, function (data, status) {//get 'active' DB 'status' coloumn
                if (status === "success") {//data came from DB successfully
                    $(".my_product").append("<h1>hi</h1>");
                    //work form here......
                    var mainWrapper = $("<div/>", {class: "product_wrapper"}),
                            childWrapper = $("<div/>", {class: "product_item_class"}),
                            lastChildWrapper = $("<div/>", {class: "item"}),
                            imgData = $("<img>", {src: "images/products/a4.png"}).append("<br/>"),
                            proName = $("<span/>", {class: "pro_name", text: "name:lady shirt"}).append("<br/>"),
                            proPrice = $("<span/>", {class: "pro_price", text: "price:1700$"}),
                            buttonAdd = $("<p/>", {class: "add_me text-center", text: "add me"});
                    
                    mainWrapper.append(childWrapper.append(lastChildWrapper.append(imgData, proName, proPrice)).append(buttonAdd)).appendTo(".products");
                    });
                  console.log(data);
                }
            });
        });
    }(jQuery));
</script>