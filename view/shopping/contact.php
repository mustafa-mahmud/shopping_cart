<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>contact</title>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/practise.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/animate.min.css" />
        <link rel="stylesheet" href="css/media.css" />
        <link rel="stylesheet" href="css/contact.css" />

        <!----Fonts---->
        <link rel="stylesheet" href="css/font-awesome.css" />

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!----nav bar---->
                <nav class="navbar navbar-inverse" style="border-radius: 0; margin-bottom: 0px;">
                    <ul class="nav navbar-nav" style="border-radius: 0; margin: 0px !important;">
                        <li class="active"><a class="navbar-brand" href="#">WebSiteName</a></li>
                        <li class="homePage"><a href="index.php">Home</a></li>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <!----head----->
                <div id="headerContact">
                    <div class="headerInfo">
                        <div class="middleInfo">
                            <p class="text-center text-uppercase shCart">shopping cart</p>
                            <span>
                                <p class="text-capitalize text-center">stay with us , see our new vision</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-----contact----->
                <div id="emailPhone">
                    <div class="phoneContact">
                        <div class="mobile">
                            <p>
                                <span class="glyphicon glyphicon-phone-alt"> <i>465412054654</i> </span> <a style="color: red;">|</a> 
                                <span class="glyphicon glyphicon-phone-alt"> <i>679879855445</i> </span>
                            </p>
                        </div>
                    </div>
                    <div class="emailContact">
                        <div class="emailUs">
                            <span class="fa fa-paper-plane"> <i>www.gmail@gmail.com</i> </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-----send------->
                <div id="send">
                    <div class="sendMail">
                        <ul>
                            <li class="urName">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Your Name" />
                                </div>
                            </li>
                            <li class="urEmail">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Your Email" />
                                </div>
                            </li>
                            <li class="urMsg">
                                <div class="form-group">
                                    <textarea placeholder="Your Msg"></textarea>
                                </div>
                            </li>
                            <span class="btn btn-success">Send</span>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-----map------->
                <div id="map">
                    <div class="mapContact">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1082.1946751435755!2d91.80676031729818!3d22.496029903102112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd66bfc612d63%3A0x863683c51825eef9!2sShere+Bangla+Mazar!5e1!3m2!1sen!2sbd!4v1515040325948" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-----footer------->
                <div id="my_footer" class=" ">
                    <div id="my_copyright">
                        <p class="text-center">allcopyright &copy; mithu <?php echo 2017 ?></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/contactResposive.js"></script>
        <script>
            function myMap() {
                var mapProp = {
                    center: new google.maps.LatLng(51.508742, -0.120850),
                    zoom: 5,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFjeMbdB7slVr_r5iiegXWq3FS7PqbYkc&callback=myMap"></script>

    </body>
</html>
