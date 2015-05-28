<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reviu | Feed</title>
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
   
    <script src="<?php echo base_url('frontassets/jquery/jquery.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/jquery/modernizr.custom.js'); ?>" type="text/javascript"></script>
    
<!--    <script src="bower_components/jquery/html5lightbox.js"></script>-->
    <!--
    <script src="bower_components/jquery/swfobject.js"></script>
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
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/owl.theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/owl.transitions.css'); ?>">
-->
    <!--    <link rel="stylesheet" href="bower_components/less/videobox.css">-->


    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        function LightboxGroupLink(id) {
            var href = document.getElementById(id).getAttribute('href');
            html5Lightbox.showItem(href);
        }
    </script>

</head>

<body style="background:#ededed;">
    <headers>
        <div class="sections ">
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
    <div class="feed-head">
            <div class="head-cat text-center">
                <h4>Discover and explore video reviews</h4>
                <i>Reviu helps you find best local business, product & services.</i>
                <div class="search-feed">
                   
                     <input type="text" placeholder="Your Mail or mobile number" class="linkemail">
                        <button type="submit" class="verifyorpop">send</button>
                 
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
                        <a href="#">feeds </a>
                        <!--        <a href="#">the boston cupcakery</a>-->
                        <i class="fa fa-sort-desc"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($videos as $row)
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
            
        <div class="load-feed text-center">
            <h5>load more posts</h5>
        </div>
    </div>
    <div class="container mypopup" style="display:none;">
			<div class="row popoverlay">
				<div class="col-md-12 popupdiv">
					<div class="textemail" style="display:none;">
						Your email is submitted successfully
						<h2>Thank you</h2>
					</div>
					<div class="textemail">
						<h5 class="emailtext">Please enter your email.</h5>
					</div>

				</div>
			</div>
		</div>
   	</div>
    	<script>
			$(document).ready(function () {

				$(".verifyorpop").click(function () {
					var email = $(".linkemail").val();
					if(!email)
					{
						$(".emailtext").text("Please enter your email.");
						$(".mypopup").fadeIn(200);
						setTimeout(function () {
							$(".mypopup").fadeOut(200);
						}, 2000);
					}
					else
					{
						$.get("<?php echo site_url("website/getemail1");?>",{email:email}, function (data) {
							$(".emailtext").text("Thank You for your submission.");
							$(".mypopup").fadeIn(200);
							$(".linkemail").val("");
							setTimeout(function () {
								$(".mypopup").fadeOut(200);
							}, 2000);
						});
					}
				});

			});
		</script>
<!--
 <div class="container mypopup" style="display:none;">
            <div class="row popoverlay">
                <div class="col-md-12 popupdiv">
                    <div class="textemail" style="display:none;">
                        Your email is submitted successfully
                        <h2>Thank you</h2>
                    </div>
                    <div class="textemail">
                        <h3 style="margin:10px 0 0 0;">Please enter your email.</h3>
                    </div>
                </div>
            </div>
        </div>

 <script>
        $(document).ready(function() {
             $(".verifyorpop").click(function() {
                  $(".mypopup").fadeIn(200);
                setTimeout(function() {
                $(".mypopup").fadeOut(200); 
            }, 2000);
                 return false;
             });
            
            
        });  
    </script>
-->
