<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Slider start -->
<section id="home" class="no-padding">
    <div id="main-slide" class="cd-hero">
        <ul class="cd-hero-slider">
            <li class="selected">
                <div class="overlay2">
                    <img class="" src="/assets/images/slider/bg1.jpg" alt="slider">
                </div>
                <div class="cd-full-width">
                    <h2>IOI 2020 Singapore</h2>
                    <h3>Your path to the 32nd International Olympiad in informatics</h3>
                    <?php if($seconds_before_next_contest){ ?>
                        <h4><span class="contest-countdown-title" style="color: whitesmoke ; background-color: rgba(0, 0, 0, 0.5); border-radius: 5px; padding: 5px"><b ><span id="contest-launch-timer"  class="text-left" seconds="<?php echo $seconds_before_next_contest ?>"></span></b>&nbsp;Before <span style="color: #ee3b24;"><?php echo $contest_title ?></span> starts!</span></h4 >
                    <?php } ?>
                    <?php /*<a href="/contest" class="btn btn-primary white cd-btn">See the contests</a>*/ ?>
                    <a href="/register" class="btn btn-primary solid cd-btn">
                        Register Now
                    </a>
                </div> <!-- .cd-full-width -->
            </li>
            <li>
                <div class="overlay2">
                    <img class="" src="/assets/images/slider/bg2.jpg" alt="slider">
                </div>
                <div class="cd-half-width">
                    <h2>How Big Can You Dream?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In consequatur cumque natus!</p>
                    <a href="#0" class="cd-btn btn btn-primary solid">Take a Tour</a>
                </div> <!-- .cd-half-width -->

                <div class="cd-half-width cd-img-container">
                    <img src="/assets/images/slider/bg-thumb1.png" alt="">
                </div> <!-- .cd-half-width.cd-img-container -->
            </li>
            <li>
                <div class="overlay2">
                    <img class="" src="/assets/images/slider/bg3.jpg" alt="slider">
                </div>
                <div class="cd-half-width cd-img-container img-right">
                    <img src="/assets/images/slider/bg-thumb2.png" alt="">
                </div> <!-- .cd-half-width.cd-img-container -->
                <div class="cd-half-width">
                    <h2>Your Challenge is Our Progress</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In consequatur cumque natus!</p>
                    <a href="#0" class="cd-btn btn btn-primary white">Start</a>
                    <a href="#0" class="cd-btn btn secondary btn-primary solid">Learn More</a>
                </div> <!-- .cd-half-width -->
            </li>
            <li class="cd-bg-video">
                <div class="cd-full-width">
                    <h2>WE ARE HERE TO MAKE IT HAPPEN</h2>
                    <h3>We Making Difference To Great Things Possible</h3>

                    <a href="#0" class="cd-btn btn btn-primary solid">Learn more</a>
                </div> <!-- .cd-full-width -->

                <div class="cd-bg-video-wrapper" data-video="videos/video">
                    <!-- video element will be loaded using jQuery -->
                </div> <!-- .cd-bg-video-wrapper -->
            </li>
        </ul> <!--/ cd-hero-slider -->

    </div><!--/ Main slider end -->
</section> <!--/ Slider end -->
