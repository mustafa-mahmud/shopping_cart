function menuColor(ev){
    var divAttr=$("body").find("#allData").find(".headed").next().attr("menu");
    var menuAttr=$(ev).attr("menu");
    $(".menuLi").removeClass("proMenuDes");
    if(divAttr===menuAttr){
        $(ev).addClass("proMenuDes");
    }
    else{
        $(ev).removeClass("proMenuDes");
    }
}