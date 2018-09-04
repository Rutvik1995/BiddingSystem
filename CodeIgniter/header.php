<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <!-- jQuery library -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $(window).scroll(function () {

                //Method 1: Using addClass and removeClass
                //if ($(document).scrollTop() > 50) {
                //     $('.navbar-default').addClass('navbar-shrink');
                // } else {
                //     $('.navbar-default').removeClass('navbar-shrink');
                // }

                //Method 2: Using toggleClass
                $(".navbar-default").toggleClass("navbar-shrink", $(this).scrollTop() > 50)
            });
        });
    </script>
    <style>
        @media screen and (min-width: 992px) {

            .navbar-default {
                padding: 30px 0;
                transition: padding 0.3s;
            }

            .navbar-default.navbar-shrink {
                padding: 10px 0;
            }
        }

        .navbar-default a {
            color: #4D4D4D;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-transform: uppercase;
            text-decoration: none;
            line-height: 42px;
            font-weight: 700;
            font-size: 20px;
        }

        .navbar-default a.brand > img {
            max-width: 180px;
        }

        .navbar-default a.active {
            color: #2dbccb;
        }


        .content {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .content > section {
            width: 100%;
            height: 100%;
        }

        #portfolio {
            background: #2dbccb;
        }

        #about {
            background-color: #eb7e7f;
        }

        #contact {
            background-color: #415c71;
        }
        .image{


        }
    </style>
</head>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" ><img src="assets\images\calperslogo.png" class="img-responsive image" title="trungk18" /></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-nav">
            <ul class="nav navbar-nav navbar-right">
                <li class="page-scroll">
                    <a href="#portfolio">Portfolio</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>




</body>

</html>
