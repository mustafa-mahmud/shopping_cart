<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>a</h1>
               <!-----Bubble Button Start----->
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo">
        <defs>
    <filter id="goo">
        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
        <feComposite in="SourceGraphic" in2="goo"/>
    </filter>
    </defs>
    </svg>
    <span class="button--bubble__container">
        <a href="javascript:void(0)" class="button button--bubble"></a>
        <span class="button--bubble__effect-container">
            <span class="circle top-left"></span>
            <span class="circle top-left"></span>
            <span class="circle top-left"></span>

            <span class="button effect-button"></span>

            <span class="circle bottom-right"></span>
            <span class="circle bottom-right"></span>
            <span class="circle bottom-right"></span>
        </span>
    </span> 
    <!-----Bubble Button End----->
    <script src="js/my_media_full.js"></script>
    </body>
</html>
