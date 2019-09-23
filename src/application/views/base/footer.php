<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!-- Footer start -->
<footer id="footer" class="footer">
    <div class="container">
        <div class="row">

            <div class="col-md-5 col-sm-12 footer-widget">
                <?php /*<h3 class="widget-title">About IOI.tn</h3>*/ ?>
                <img src="/assets/images/logo_ita.png" width="50%">
               <p class="p-5"><?php echo $about ?></p>

            </div><!--/ End Recent Posts-->




            <div class="col-md-7 col-sm-12 footer-widget footer-about-us">
                <h3 class="widget-title">Contact</h3>


                <div class="row">
                    <div class="col-md-4">
                        <h4>Email:</h4>
                        <p><?php echo $email ?></p>
                    </div>
                    <div class="col-md-4">
                        <h4>Phone No.</h4>
                        <p><?php echo $phone ?></p>
                    </div>
                    <div class="col-md-4">
                        <h4>Address:</h4>
                        <p><?php echo $address ?></p>
                    </div>
                </div>
                <?php /*
                <form action="#" role="form">
                    <div class="input-group subscribe">
                        <input type="email" class="form-control" placeholder="Email Address" required="">
                        <span class="input-group-addon">
                              <button class="btn" type="submit"><i class="fa fa-envelope-o"> </i></button>
                            </span>
                    </div>
                </form>
                */ ?>
            </div><!--/ end about us -->

        </div><!-- Row end -->
    </div><!-- Container end -->
</footer><!-- Footer end -->


<!-- Copyright start -->
<section id="copyright" class="copyright angle">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="footer-social unstyled">
                    <li>
                        <?php /*
                        <a title="Twitter" href="#">
                            <span class="icon-pentagon wow bounceIn"><i class="fa fa-twitter"></i></span>
                        </a> */ ?>
                        <a title="Facebook" href="<?php echo $facebook ?>">
                            <span class="icon-pentagon wow bounceIn"><i class="fa fa-facebook"></i></span>
                        </a>
                        <?php /*
                        <a title="Google+" href="#">
                            <span class="icon-pentagon wow bounceIn"><i class="fa fa-google-plus"></i></span>
                        </a>
                        <a title="linkedin" href="#">
                            <span class="icon-pentagon wow bounceIn"><i class="fa fa-linkedin"></i></span>
                        </a>
                        <a title="Pinterest" href="#">
                            <span class="icon-pentagon wow bounceIn"><i class="fa fa-pinterest"></i></span>
                        </a>
                        <a title="Skype" href="#">
                            <span class="icon-pentagon wow bounceIn"><i class="fa fa-skype"></i></span>
                        </a>
                        <a title="Dribble" href="#">
                            <span class="icon-pentagon wow bounceIn"><i class="fa fa-dribbble"></i></span>
                        </a> */ ?>
                    </li>
                </ul>
            </div>
        </div><!--/ Row end -->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="copyright-info">
                    &copy; Copyright <?php echo date('Y') ?>. <span>Designed by <a href="#">ITA</a></span>
                </div>
            </div>
        </div><!--/ Row end -->
        <?php if($is_admin) { ?>
            <div class="row">
                <div class="col-md-12 text-center">

                    <a href="/user_management" class="btn">Admin Dashbord</a>
                </div>
            </div>
        <?php } ?>
        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
            <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i></button>
        </div>
    </div><!--/ Container end -->
</section><!--/ Copyright end -->