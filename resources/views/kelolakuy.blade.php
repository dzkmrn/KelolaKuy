@extends('layout.app')

@section('title', 'KelolaKuy!')

<!DOCTYPE html>
<!--Code by Divinector - divinectorweb.com-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">
    <link href="resources/css/app.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(to left, #EEF1FF, #B1B2FF);
        }

        /* Hover a href - START */
        a {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: perspective(1px) translateZ(0);
            transform: perspective(1px) translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            position: relative;
            -webkit-transition-property: color;
            transition-property: color;
            -webkit-transition-duration: 0.5s;
            transition-duration: 0.5s;
        }

        a:before {
            content: "";
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: white;
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transform-origin: 0 50%;
            transform-origin: 0 50%;
            -webkit-transition-property: transform;
            transition-property: transform;
            -webkit-transition-duration: 0.5s;
            transition-duration: 0.5s;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }

        a:hover,
        a:focus,
        a:active {
            color: white;
        }

        a:hover:before,
        a:focus:before,
        a:active:before {
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
            -webkit-transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
            transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
        }

        /* Hover a href - END */

        .logo-right {
            width: 100%;
            position: absolute;
            z-index: 1;
        }

        .logo-right ul {
            height: 50px;
            float: right;
        }

        .logo-right ul li {
            margin-left: -13%;
            margin-top: -28%;
            display: inline-block;
            padding: 40px 15px;
            max-width: 10%;
        }

        .banner-text {
            width: 100%;
            position: absolute;
            z-index: 1;
        }

        .banner-text a {
            color: #EEF1FF;
            text-decoration: none;
        }

        .banner-text a:hover {
            color: #717ff5;
        }   

        .banner-text ul {
            height: 50px;
            float: left;
        }

        .banner-text ul li {
            display: inline-block;
            padding: 40px 15px;
            text-transform: uppercase;
            color: #fff;
            font-size: 20px;
        }

        .banner-text h2 {
            text-align: center;
            color: white;
            font-size: 50px;
            margin-top: 17.5%;

        }

        .banner-text h3 {
            margin: auto;
            text-align: center;
            color: #fff;
            font-size: 25px;
            background-color: #717ff5;
            width: fit-content;


        }

        .animation-area {
            width: 100%;
            height: 50vh;
        }

        .box-area {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .box-area li {
            position: absolute;
            display: block;
            list-style: none;
            width: 25px;
            height: 25px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 20s linear infinite;
            bottom: -150px;
        }

        .box-area li:nth-child(1) {
            left: 86%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .box-area li:nth-child(2) {
            left: 12%;
            width: 30px;
            height: 30px;
            animation-delay: 1.5s;
            animation-duration: 10s;
        }

        .box-area li:nth-child(3) {
            left: 70%;
            width: 100px;
            height: 100px;
            animation-delay: 5.5s;
        }

        .box-area li:nth-child(4) {
            left: 42%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 15s;
        }

        .box-area li:nth-child(5) {
            left: 65%;
            width: 40px;
            height: 40px;
            animation-delay: 0s;
        }

        .box-area li:nth-child(6) {
            left: 15%;
            width: 110px;
            height: 110px;
            animation-delay: 3.5s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(-800px) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="banner-text">
        <ul>
            <li><a href="login">LOGIN</a></li>
            <li><a href="register">REGISTER</a></li>
        </ul>
        <h2 style="font-size: 45pt ">Selamat Datang di <br><a class="bedawarna" style="color: #717ff5;">KelolaKuy!</a>
        </h2>
        <h3>Kelola inventaris organisasi anda lebih mudah dengan KelolaKuy!</h3>

    </div>

    <div class="logo-right">
        <ul>
            <li><img src="../../dist/img/logo.png" class="img-circle img-responsive" alt="User Image"></li>
        </ul>
    </div>

    <div class="animation-area">
        <ul class="box-area">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</body>

</html>