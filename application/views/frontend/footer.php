


    <div class="back mid-text  text-center">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <p>Copyright © 2009–2014 Nam liber tempor cum soluta nobis eleifend option congue nihil imperdi</p>


    </div>
    <div class="footer hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>Company</h4>
                    <a href="#">
                        <p>Contact</p>
                    </a>
                    <a href="#">
                        <p>FAQ</p>
                    </a>
                    <a href="#">
                        <p>terms and conditions</p>
                    </a>
                    <a href="#">
                        <p>Returns and Refunds</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <h4>Lorum Ipsum</h4>
                    <a href="#">
                        <p>Consectetuer</p>
                    </a>
                    <a href="#">
                        <p>Adipiscing elit</p>
                    </a>
                    <a href="#">
                        <p>Nonummy</p>
                    </a>
                    <a href="#">
                        <p>Nibheuismod</p>
                    </a>

                </div>
                <div class="col-md-3">
                    <h4>Lorum Ipsum</h4>
                    <a href="#">
                        <p>Consectetuer</p>
                    </a>
                    <a href="#">
                        <p>Adipiscing elit</p>
                    </a>
                    <a href="#">
                        <p>Nonummy</p>
                    </a>
                    <a href="#">
                        <p>Nibheuismod</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <h4>Lorum Ipsum</h4>
                    <a href="#">
                        <p>Consectetuer</p>
                    </a>
                    <a href="#">
                        <p>Adipiscing elit</p>
                    </a>
                    <a href="#">
                        <p>Nonummy</p>
                    </a>
                    <a href="#">
                        <p>Nibheuismod</p>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="left-text pull-left hidden-xs hidden-sm">
                        <a href="#">
                            <p style="padding-left:0px;">Privacy & Cookies</p>
                        </a>
                        <a href="#">
                            <p>Terms & Conditions</p>
                        </a>
                        <a href="#">
                            <p style="border-right:none;">About Us</p>
                        </a>
                    </div>



                    <div class="right-text pull-right">
                        <p style="border-right:none;">© REVIU.com</p>
                        <br>
                        <p style="border-right:none;">All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="men hidden-md hidden-lg">
            <ul id="gn-menu" class="gn-menu-main">
                <li class="gn-trigger">
                    <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
                    <nav class="gn-menu-wrapper">
                        <div class="gn-scroller">
                            <div class="footer-mob text-center">
                                <h5> Comapany </h5>
                                <p>Contact</p>
                                <p>FAQ</p>
                                <p>Terms and conditions</p>
                                <p>Returns and refunds</p>
                            </div>
                            <div class="footer-mob text-center">
                                <h5> Comapany </h5>
                                <p>Contact</p>
                                <p>FAQ</p>
                                <p>Terms and conditions</p>
                                <p>Returns and refunds</p>
                            </div>
                            <div class="footer-mob text-center">
                                <h5> Comapany </h5>
                                <p>Contact</p>
                                <p>FAQ</p>
                                <p>Terms and conditions</p>
                                <p>Returns and refunds</p>
                            </div>
                            <div class="footer-mob text-center">
                                <h5> Comapany </h5>
                                <p>Contact</p>
                                <p>FAQ</p>
                                <p>Terms and conditions</p>
                                <p>Returns and refunds</p>
                            </div>
                        </div>
                        <!-- /gn-scroller -->
                    </nav>
                </li>

            </ul>

        </div>
    </div>

    <script src="<?php echo base_url('frontassets/jquery/classie.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/jquery/gnmenu.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('frontassets/bootstrap/dist/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    
<!--    description and explore script-->
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
    
<!--    feed script-->
    <script type="text/javascript">
        function LightboxGroupLink(id) {
            var href = document.getElementById(id).getAttribute('href');
            html5Lightbox.showItem(href);
        }
    </script>
    
<!--    <script src="js/gnmenu.js"></script>-->
    <script>
        new gnMenu(document.getElementById('gn-menu'));
    </script>
    <script>
        new WOW().init();
    </script>
    
<!--    home script-->
    
</body>

</html>
