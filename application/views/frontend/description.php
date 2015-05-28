<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reviu | Description</title>
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
<!--
    <script src="bower_components/jquery/owl.carousel.js"></script>
    <script src="bower_components/jquery/swfobject.js"></script>
-->
<!--
    <script src="bower_components/jquery/mootools.js"></script>
    <script src="bower_components/jquery/videobox.js"></script>
-->
    <!--    <script src="bower_components/jquery/jquery.cslider.js"></script>-->
    <!--     <script src="bower_components/jquery/dist/jquery-1.7.1.min.js"></script>-->
    <!--    <script src="bower_components/jquery/dist/jq.carousel.js"></script>-->


    <!--    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
    
 

    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/font-awesome.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/slider.css'); ?>">
<!--
    <link rel="stylesheet" href="bower_components/less/owl.carousel.css">
    <link rel="stylesheet" href="bower_components/less/owl.theme.css">
    <link rel="stylesheet" href="bower_components/less/owl.transitions.css">
-->
<!--    <link rel="stylesheet" href="bower_components/less/videobox.css">-->


    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--
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
-->
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

<body style="background:#ededed;">
    <headers>
        <div class="sections " style="min-height: 0px;">
            <div class="head-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-4 col-md-2 mob-img">
                            <a href="<?php echo site_url('website/index');?>" class="hidden-xs hidden-sm">
                                <img src="<?php echo base_url('frontassets/img/logo.png'); ?>">
                            </a>
                            <p class="visible-xs visible-sm pos-img"><a href="#" class="col"> login </a><i class="fa fa-caret-right"></i>
                        </div>
                        <div class="col-xs-5 col-md-4 text-center">
                            <a href="<?php echo site_url('website/index');?>" class="hidden-md hidden-lg text-center ">
                                <img class="text-center img-log" src="<?php echo base_url('frontassets/img/logo.png'); ?>">
                            </a>
                            <ul class="hidden-xs hidden-sm">
                                <a href="<?php echo site_url('website/feed');?>" class="active">
                                    <li style="list-style:none;">Feed</li>
                                </a>
                                <a href="<?php echo site_url('website/preview');?>">
                                    <li>Preview</li>
                                </a>
                                <a href="<?php echo site_url('website/explore');?>">
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
            <div class="bg-mob hidden-md hidden-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12" style="text-align: center;
margin: auto;">

                            <ul>
                                <a href="feed.html" class="active">
                                    <li style="list-style:none;padding-left:0px">feed</li>
                                </a>
                                <a href="preview.html">
                                    <li>Preview</li>
                                </a>
                                <a href="explore.html">
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

        </div>
    </headers>

    <div class="feed-content">
<div class="container">
 

<div class="row">
<div class="col-md-12">
           <div class="desc-head">
        <a href="#">feeds ></a>
        <a href="#">the boston cupcakery</a>
        <i class="fa fa-sort-desc"></i>
    </div>
</div>
   </div>
   <?php
//print_r($video);
//echo "<br>";
//echo $video->videourl;
//print_r($videotags);
//foreach($videotags as $row)
//{
//echo $row->tag;
//}
?>
   <div class="row">
   <div class="col-md-12">
          <div class="video-descs">
                  <div class="feed-det ">
                   <p class="rating"><?php echo $video->rating.".0"; ?></p>
                   <h5><?php echo $video->title; ?> <br><span> by <?php echo $video->firstname." ".$video->lastname;?></span></h5>
               </div>
               </div>
   </div>
   </div>
   <div class="row">
    <div class="col-md-8">
   
        <div class="video-desc">
          
               <div class="vid-desc">
<video width="100%" controls>
  <source src="<?php echo base_url('frontassets/video/The%20Art%20of%20Plating%20Dinner%20-%20Food%20How%20To%20-%20YouTube.mp4'); ?>" type="video/mp4">
  <source src="mov_bbb.ogg" type="video/ogg">

</video>
       </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="desc-left">
            <i class="fa fa-heart lik "><span ><?php echo $video->likes;?></span></i>
            <i class="fa fa-eye view"><span><?php echo $video->views." views";?></span></i>
            
        </div>
        <div class="desc-cont">
            <p>contact<span><?php echo $video->usercontact;?></span></p>
            
        </div>
        <div class="loca-desc">
            <p>location</p>
            <span>
                <?php echo $video->location;?>
            </span>
               <div class="map-desc">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.801298552383!2d72.90016399999998!3d19.072472000000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6277363c179%3A0x36691e6c95a165c3!2sWohlig+Technologies+LLP!5e0!3m2!1sen!2sin!4v1422363139061" width="100%" height="250" frameborder="0" style="border:0"></iframe>
           </div>
           <div class="soci-desc">
               <span>share</span>
             <a href="#">  <i class="fa fa-envelope"></i></a>
               <a href="#"><i class="fa fa-facebook"></i></a>
               <a href="#"><i class="fa fa-twitter"></i></a>
           </div>
           <div class="tag-desc">
               <span>tags</span>
               <?php
                foreach($videotags as $row)
                {
                    ?>
                <a href="#"> <i><?php echo $row->tag;?></i></a>
                <?php
                }
                ?>
           </div>
        </div>
    
    </div>
</div>
        </div>
        <div class="container">
       <div class="row">
<div class="col-md-12">
           <div class="desc-head">
        <a href="#">feeds ></a>
        <a href="#">the boston cupcakery</a>
        <i class="fa fa-sort-desc"></i>
    </div>
</div>
            </div>
            
         <div class="row">
               <?php
                foreach ($relatedvideos as $row)
                {
                ?>
                <div class="col-md-4">
                    <div class="feed-video text-center">
                        <img class="feed-img img-responsive" src="<?php echo base_url('uploads/')."/".$row->image; ?>">
                        <a  href="<?php echo site_url('website/description?id=').$row->id;?>">
                           <div class="play"><img class="" src="<?php echo base_url('frontassets/img/video-img/play.png'); ?>"></div> 
                        </a>
                        <div class="feed-det">
                            <p class="rating"><?php echo $row->rating.".0";?></p>
                            <h5><?php echo $row->title;?><br><span> by <?php echo $row->firstname." ".$row->lastname;?></span></h5>
                        </div>
                    </div>
                    <div class="map-feed">
                        <i class="fa fa-map-marker"><span><?php echo $row->location;?></span></i>
                        <i class="fa fa-heart pull-right" style="margin-top:2px;"><span><?php echo $row->likes;?></span></i>
                    </div>
  			  
                </div>  
                     	 <?php 
                }
                ?>       
                   </div>
        
              
            </div>
    <div class="load-feed text-center">
    <h5>load more posts</h5>
</div>
   
</div>
