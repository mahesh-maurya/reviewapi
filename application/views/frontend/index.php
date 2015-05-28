<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Reviu | Home</title>
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" href="<?php echo base_url('frontassets/bootstrap/dist/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('frontassets/bootstrap/dist/css/bootstrap-theme.min.css'); ?>">
	<link rel="stylesheet/less" href="<?php echo base_url('frontassets/less/styles.less'); ?>">


	<script src="<?php echo base_url('frontassets/jquery/dist/jquery.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('frontassets/less/dist/less.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('frontassets/less/dist/less.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('frontassets/jquery/wow.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('frontassets/jquery/wow.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('frontassets/js/jquery-1.10.1.min.js/');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('frontassets/js/jquery.mousewheel-3.0.6.pack.js/');?>" type="text/javascript"></script>


	<!-- Add fancyBox -->
	<link rel="stylesheet/less" href="<? echo base_url('frontassets/less/jquery.fancybox.css');?>" type="text/css" media="screen">
	<script src="<?php echo base_url('frontassets/js/jquery.fancybox.pack.js/');?>" type="text/javascript"></script>

	<script src="<?php echo base_url('frontassets/jquery/main.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('frontassets/jquery/jquery-ui-1.9.0.custom.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('frontassets/jquery/pgwslider.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('frontassets/jquery/hamburger-menu.js'); ?>" type="text/javascript"></script>

	<!--
    <script src="bower_components/jquery/modernizr.custom.js"></script>
    <script src="bower_components/jquery/jquery.cslider.js"></script>
    <script src="bower_components/jquery/hamburger-menu.js"></script>
-->

	<link rel="stylesheet" href="<?php echo base_url('frontassets/less/font-awesome.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('frontassets/less/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('frontassets/less/animate.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('frontassets/less/slider.css'); ?>">
	<!--    <link rel="stylesheet" href="<?php echo base_url('frontassets/less/styles.css'); ?>">-->
	<link rel="stylesheet" href="<?php echo base_url('frontassets/less/pgwslider.css'); ?>">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
	<!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
        
    <![endif]-->
	<script type="text/javascript">
		$(document).ready(function () {
			$("#featured").tabs({
				fx: {
					opacity: "toggle"
				}
			}).tabs("rotate", 5000, true);
		});
	</script>
</head>

<body>
	<header>
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

			<div class="bg-mob hidden-md hidden-lg">
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
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="img-logo">
							<img src="<?php echo base_url('frontassets/img/icon.png'); ?>">
							<!--                            <img src="bower_components/img/icon.png">-->
							<h3>discover and </h3>
							<h3>explore</h3>
							<h3> video reviews</h3>
							<div class="p-tag">
								<p>Reviu helps you find best local business,</p>
								<p>product & services.</p>
							</div>
							<!--
                      <script>
	function showHint(str) {
		if (str.length == 0) {
			document.getElementById("txtHint").innerHTML = "";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "gethint.php?q=" + str, true);
			xmlhttp.send();
		}
	}
</script>
-->
							<div class="search-tag">
								<p>Send the link to your apple phone</p>

								<input type="text" class="linkemail" placeholder="Your Mail or mobile number ">
								<button type="submit" class="verifyorpop">send</button>

							</div>
							<div class="soci-tag">
								<i>Get the app</i>
								<div class="soci-btn">
									<a href="#">
                               <img src="<?php echo base_url('frontassets/img/iphone.png'); ?>">
                                        <img src="<?php echo base_url('frontassets/img/iphone.png'); ?>">
                                    </a>
									<a href="#">
                                        <img src="<?php echo base_url('frontassets/img/demo.png'); ?>">
<!--                                        <img src="<?php echo base_url('frontassets/img/left.png'); ?>">-->
                                    </a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 hidden-xs hidden-sm">
						<!--                        <img src="bower_components/img/phone.png">-->



						<div id="featured">

							<ul class="ui-tabs-nav">
								<li class="ui-tabs-nav-item" id="nav-fragment-1"><a href="#fragment-1"><img src="<?php echo base_url('frontassets/img/left.png'); ?>" class="img-slide" ><span><?php echo $description[0]->title;?></span><p><?php echo $description[0]->description;?></p></a>
								</li>
								<li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"><img src="<?php echo base_url('frontassets/img/left.png'); ?>" class="img-slide"><span><?php echo $description[1]->title;?></span><p><?php echo $description[1]->description;?></p></a>
								</li>
								<li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"><img src="<?php echo base_url('frontassets/img/left.png'); ?>" class="img-slide"><span><?php echo $description[2]->title;?></span><p><?php echo $description[2]->description;?></p></a>
								</li>
							</ul>
							
						
							<!-- First Content -->
							<div id="fragment-1" class="ui-tabs-panel" style="">
								<img src="<?php echo base_url('uploads/')."/".$description[0]->image;?>" alt="" class="pj img-responsive">

							</div>

							<!-- Second Content -->
							<div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
								<img src="<?php echo base_url('uploads/')."/".$description[1]->image;?>" alt="" class="pj img-responsive"/>

							</div>

							<!-- Third Content -->

							<div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="">
								<img src="<?php echo base_url('uploads/')."/".$description[2]->image;?>" alt="" class="pj img-responsive"/>

							</div>
						</div>
					</div>
					<div class="col-md-6 hidden-md hidden-lg visible-xs visible-sm">
						<div class="slid-mob">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
								<!-- Indicators 
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
								<div class="carousel-inner">
									<div class="item active">
										<img src="<?php echo base_url('frontassets/img/slide1.png'); ?>" alt="Smiley face" height="100%" width="50%">

									</div>
									<div class="item">
										<img src="<?php echo base_url('frontassets/img/slide2.png'); ?>" alt="Smiley face" height="100%" width="50%">

									</div>
									<div class="item">
										<img src="<?php echo base_url('frontassets/img/slide3.png'); ?>" alt="Smiley face" height="100%" width="50%">

									</div>
								</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span class=" glyphicon-chevron-left">
        <img src="<?php echo base_url('frontassets/img/mob-nav.png'); ?>">
    </span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="glyphicon-chevron-right">
        <img src="<?php echo base_url('frontassets/img/mob2-nav.png'); ?>">
    </span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</header>

	<content>
		<div class="section">
			<!--
<video autoplay loop poster="" id="bgvid">
<source src="bower_components/video/The%20Art%20of%20Plating%20Dinner%20-%20Food%20How%20To%20-%20YouTube.mp4" type="video/webm">
<source src="bower_components/video/The%20Art%20of%20Plating%20Dinner%20-%20Food%20How%20To%20-%20YouTube.mp4" type="video/mp4">
</video>
-->
			<div class="container">
				<div class="row hidden-sm hidden-xs">
					<div class="col-md-12 ">
						<div class="prog">
							<img src="<?php echo base_url('frontassets/img/progress.png'); ?>">
							<img class="pull-right share " src="<?php echo base_url('frontassets/img/share.png'); ?>">
							<img class="pull-right circle " src="<?php echo base_url('frontassets/img/circle.png'); ?>">
						</div>
						<div class="rest text-center">
							<p>restaurant<span><img src="<?php echo base_url('frontassets/img/restaurent.png'); ?>"></span>
							</p>
						</div>
					</div>

				</div>
				<div class="row hidden-lg hidden-md" style="height:400px;">
					<div class="col-md-12 ">
						<div class="prog">

							<div class="text-center">
								<img class="img-responsive" style="margin: auto;" src="<?php echo base_url('frontassets/img/progress-mob.png'); ?>">

							</div>

							<div class="rest-mob img-responsive">
								<img src="<?php echo base_url('frontassets/img/restaurent-mob.png'); ?>">
							</div>



						</div>
					</div>


				</div>
				<div class="hidden-lg hidden-md">
					<div class="btn-mob">
						<img src="<?php echo base_url('frontassets/img/circle.png'); ?>">
					</div>
					<div class="btn-pause">
						<img class="pull-right share " src="<?php echo base_url('frontassets/img/share.png'); ?>">
					</div>
				</div>

				<!--
                    <div class="rest text-center">
                        <p>restaurent<span><img src="bower_components/img/restaurent.png"></span>
                        </p>
                    </div>
-->
			</div>

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
		<!--
        <script>
            $(document).ready(function () {
                $(".various").fancybox({
                    maxWidth: 800,
                    maxHeight: 600,
                    fitToView: false,
                    width: '70%',
                    height: '70%',
                    autoSize: false,
                    closeClick: false,
                    openEffect: 'none',
                    closeEffect: 'none'
                });
            });
        </script>-->
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
						$.get("<?php echo site_url("website/getemail");?>",{email:email}, function (data) {
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