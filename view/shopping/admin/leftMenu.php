<!-----This menu bar only for upto col-sm-*-------->
<div id="myMenu" class="col-sm-5 col-md-4 col-lg-3 col-xl-2 noPaddingMargin creatScroll menu d-none d-sm-block">
    <div class="mainMenu p-2 w-100">
        <div class="menuHead">
            <span>
                <i class="fas fa-shopping-bag"></i>&nbsp; <i style="font-size: 17px !important;">Shopping Panel</i>
            </span>
            <span>
                <img src="images/content.jpg" alt="admin" class="adminImg" width="50" height="40">
                &nbsp;
                <i class="adminName text-capitalize">mithu khan</i>
            </span>
            <ul>
                <li><a href="basicInfo.php"><i class="fas fa-cube"></i> &nbsp; Basic Info</a></li>
                <li class="parentLi arrowDeg"><a href="javascript:void(0)" data-target="#producting" data-toggle="collapse"><i class="fas fa-th"></i> &nbsp; Products</a></li>
                <ul id="producting" class="collapse" my-data="chaildUl">
                    <li><a href="productAdd.php"><i class="fas fa-plus-square"></i>&nbsp; Add Products</a></li>
                    <li><a href="productEdit.php"><i class="fas fa-pen-square"></i>&nbsp; Edit Products</a></li>
                </ul>
                <li class="parentLi2 arrowDegg"><a href="javascript:void(0)" data-target="#membering" data-toggle="collapse"><i class="fas fa-th"></i> &nbsp; Members</a></li>
                <ul id="membering" class="collapse" my-data="chaildUl">
                    <li><a href="memberEdit.php"><i class="fas fa-pen-square"></i>&nbsp; Edit Members</a></li>
                </ul>
                <li><a href="javascript:void(0);"><i class="fas fa-chart-bar"></i> &nbsp; Charts</a></li>
                <li><a href="javascript:void(0);"><i class="fas fa-map"></i> &nbsp; Map</a></li>
                <li><a href="javascript:void(0);"><i class="fas fa-tasks"></i> &nbsp; Profile</a></li>
                <li><a href="javascript:void(0);"><i class="fas fa-assistive-listening-systems"></i> &nbsp; Settings</a></li>
                <li><a href="javascript:void(0);"><i class="fas fa-home"></i> &nbsp; Home</a></li>
            </ul>
        </div>
    </div>
</div>
<!-----This menu bar only for down col(575)*-------->
<div id="smallMenu" class="noPaddingMargin creatScroll menu d-block d-sm-none sideMenu">
    <span class="closeMe" onclick="hideMe();"><i>&times;</i></span>
    <div class="mainMenu p-2 w-100">
        <div class="menuHead">
            <span>
                <i class="fas fa-shopping-bag"></i>&nbsp; <i style="font-size: 17px !important;">Shopping Panel</i>
            </span>
            <span>
                <img src="images/content.jpg" alt="admin" class="adminImg" width="50" height="40">
                &nbsp;
                <i class="adminName text-capitalize">mithu khan</i>
            </span>
            <ul>
                <li><a href="javascript:void(0);"><i class="fas fa-cube"></i> &nbsp; Basic Info</a></li>
                <li class="parentLi arrowDeg"><a href="javascript:void(0)" data-target="#producting" data-toggle="collapse"><i class="fas fa-th"></i> &nbsp; Products</a></li>
                <ul id="producting" class="collapse" my-data="chaildUl">
                    <li><a href="productAdd.php"><i class="fas fa-plus-square"></i>&nbsp; Add Products</a></li>
                    <li><a href="productEdit.php"><i class="fas fa-pen-square"></i>&nbsp; Edit Products</a></li>
                </ul>
                <li class="parentLi2 arrowDegg"><a href="javascript:void(0)" data-target="#membering" data-toggle="collapse"><i class="fas fa-th"></i> &nbsp; Members</a></li>
                <ul id="membering" class="collapse" my-data="chaildUl">
                    <li><a href="memberInfo.php"><i class="fas fa-plus-square"></i>&nbsp; Info Members</a></li>
                    <li><a href="memberEdit.php"><i class="fas fa-pen-square"></i>&nbsp; Edit Members</a></li>
                </ul>
                <li><a href="javascript:void(0);"><i class="fas fa-chart-bar"></i> &nbsp; Charts</a></li>
                <li><a href="javascript:void(0);"><i class="fas fa-map"></i> &nbsp; Map</a></li>
                <li><a href="javascript:void(0);"><i class="fas fa-tasks"></i> &nbsp; Profile</a></li>
                <li><a href="javascript:void(0);"><i class="fas fa-assistive-listening-systems"></i> &nbsp; Settings</a></li>
                <li><a href="javascript:void(0);"><i class="fas fa-home"></i> &nbsp; Home</a></li>
            </ul>
        </div>
    </div>
</div>
<script>
(function($){
    $(function(){
        var basename="<?php
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        echo basename($actual_link);
        ?>";
       $(".menuHead li").find("a").each(function(){
           var href=$(this).attr("href");
           if(href===basename){
               $(this).parent().addClass("myActive");
           }
       });      
    });
}(jQuery));
</script>