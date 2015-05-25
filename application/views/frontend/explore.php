<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reviu | Explore</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/bootstrap/dist/css/bootstrap-theme.min.css'); ?>">
    <link rel="stylesheet/less" href="<?php echo base_url('frontassets/less/styles.less'); ?>">
    
    <script src="<?php echo base_url('frontassets/less/dist/less.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/less/dist/less.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/jquery/wow.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/jquery/wow.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/jquery/dist/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/jquery/main.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/jquery/modernizr.custom.28468.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/jquery/modernizr.custom.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/jquery/owl.carousel.js'); ?>" type="text/javascript"></script>
    <!--    <script src="bower_components/jquery/jquery.cslider.js"></script>-->
    <!--     <script src="bower_components/jquery/dist/jquery-1.7.1.min.js"></script>-->
    <!--    <script src="bower_components/jquery/dist/jq.carousel.js"></script>-->


    <!--    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->

    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/font-awesome.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/slider.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/owl.theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/owl.transitions.css'); ?>">


    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        $(document).ready(function () {

            //Sort random function
            function random(owlSelector) {
                owlSelector.children().sort(function () {
                    return Math.round(Math.random()) - 0.5;
                }).each(function () {
                    $(this).appendTo(owlSelector);
                });
            }

            $("#owl-demo").owlCarousel({
                navigation: true,
                navigationText: [
      "<i class='fa fa-arrow-left'></i>",
      "<i class='fa fa-arrow-right'></i>"
      ],
                beforeInit: function (elem) {
                    //Parameter elem pointing to $("#owl-demo")
                    random(elem);
                }

            });

        });
    </script>
    <!--
    <script>
        var $carousel
         $(document).ready(function () {
            $carousel = $('#carousel').carousel();

            $('#carousel_prev').on('click', function (ev) {
                ev.preventDefault();
                $carousel.carousel('prev');
            });
            $('#carousel_next').on('click', function (ev) {
                ev.preventDefault();
                $carousel.carousel('next');
            });
        });
    </script>
-->
</head>

<body>
    <headers>
        <div class="section ">
            <div class="head-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-4 col-md-2 mob-img">
                            <a href="<?php echo site_url('website/index');?>" class="hidden-xs hidden-sm">
                               <img src="<?php echo base_url('frontassets/img/logo.png'); ?>">
<!--                                <img src="bower_components/img/logo.png">-->
                            </a>
                            <p class="visible-xs visible-sm pos-img"><a href="#" class="col"> login </a><i class="fa fa-caret-right"></i>
                        </div>
                        <div class="col-xs-5 col-md-4 text-center">
                            <a href="<?php echo site_url('website/index');?>" class="hidden-md hidden-lg">
                                <img class="text-center img-log" src="<?php echo base_url('frontassets/img/logo.png'); ?>" style="margin:auto;">
                            </a>
                            <ul class="hidden-xs hidden-sm">
                                <a href="<?php echo site_url('website/feed');?>">
                                    <li style="list-style:none;">Feed</li>
                                </a>
                                <a href="<?php echo site_url('website/preview');?>">
                                    <li>Preview</li>
                                </a>
                                <a href="<?php echo site_url('website/explore');?>" class="active">
                                    <li>Explore</li>
                                </a>
                                <a href="#">
                                    <li>Blog</li>
                                </a>
                            </ul>
                        </div>
                        <div class="col-xs-2 col-md-2 hidden-xs hidden-sm"></div>
                        <div class="col-xs-3 col-md-1">
                            <p class="hidden-xs hidden-sm"><a href="#" class="col"> login </a><i class="fa fa-caret-right"></i>
                                <form class="mob-search hidden-md hidden-lg" id="demo-2">
                                    <input type="search" placeholder="">
                                </form>
                        </div>
                        <div class="col-xs-4 col-md-3">
                            <form action="" class="hidden-xs hidden-sm">
                                <input type="search" placeholder="Search...">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-mob hidden-md hidden-lg" style="background:#fff;">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12" style="text-align: center;
margin: auto;">

                            <ul>
                                <a href="feed.html">
                                    <li style="list-style:none;padding-left:0px">Feed</li>
                                </a>
                                <a href="preview.html">
                                    <li>Preview</li>
                                </a>
                                <a href="explore.html" class="active">
                                    <li>Explore</li>
                                </a>
                                <a href="#">
                                    <li>Blog</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="head-cat text-center">
                <h4>Discover and explore video reviews</h4>
            </div>
            <div class="slider">

                <div id="owl-demo" class="owl-carousel owl-theme">
                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/car.png'); ?>" class="img-responsive">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/movie.png'); ?>" class="img-responsive">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/fashion.png'); ?>" class="img-responsive">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/hotel.png'); ?>" class="img-responsive">
                        </div>
                    </a>

                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/games.png'); ?>" class="img-responsive">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/night.png'); ?>" class="img-responsive">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/restaurent.png'); ?>" class="img-responsive">
                        </div>
                    </a>

                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/spa.png'); ?>" class="img-responsive">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/electronic.png'); ?>" class="img-responsive">
                        </div>
                    </a>

                    <a href="#">
                        <div class="item ">
                            <img src="<?php echo base_url('frontassets/img/category/university.png'); ?>" class="img-responsive">
                        </div>
                    </a>

                </div>




                <!--
                            <div class="carousel">
                                <div id="carousel" class="carousel_inner">
                                    <div class="carousel_box">1</div>
                                    <div class="carousel_box">2</div>
                                    <div class="carousel_box">3</div>
                                    <div class="carousel_box">4</div>
                                    <div class="carousel_box">5</div>
                                    <div class="carousel_box">6</div>
                                    <div class="carousel_box">7</div>
                                    <div class="carousel_box">8</div>
                                </div>
                                <p class="btns">
                                    <input type="button" id="carousel_prev" value="prev">
                                    <input type="button" id="carousel_next" value="next">
                                </p>
                            </div>
-->
            </div>

        </div>
    </headers>


