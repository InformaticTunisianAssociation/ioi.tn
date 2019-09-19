<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="banner-area">
    <img src="/assets/images/banner/banner2.jpg" alt ="" />
    <div class="parallax-overlay"></div>
    <!-- Subpage title start -->
    <div class="banner-title-content">
        <div class="text-center">
            <h2><?php echo $title ?></h2>
            <ul class="breadcrumb">
                <li>Home</li>
                <li><a href="#"> Contest </a></li>
            </ul>
        </div>
    </div><!-- Subpage title end -->
</div><!-- Banner area end -->

<!-- Blog details page start -->
<section id="main-container">
    <div class="container">
        <div class="row">

            <!-- Blog start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Blog post start -->
                <div class="post-content">
                    <!-- post image start -->
                    <div class="post-image-wrapper">
                        <img src="<?php echo $photo_url ?>" class="img-responsive"  alt="" />
                        <span class="blog-date"><a href="#"><?php echo $starts_at ?></a></span>
                    </div><!-- post image end -->
                    <div class="post-header clearfix">
                        <h2 class="post-title">
                            <a href="#"><?php echo $title ?></a>
                        </h2>
                    </div><!-- post heading end -->
                    <div class="entry-content">
                        <p><?php echo $title ?></p>
                        <?php echo $starts_at  ?>
                        <?php echo $duration  ?>
                        <?php echo $nb_problems ?>
                        <?php echo $optimal_score ?>
                        <?php echo $contest_url ?>
                        <?php if($is_enrolled) { ?>
                            <p class="apply"><a  class="btn btn-success disabled solid">Applied</a></p>
                        <?php } else { ?>
                            <p class="apply"><a href="/contest/apply/<?php echo $id ?>" class="btn btn-primary solid">Apply Now <i class="fa fa-long-arrow-right"></i></a></p>
                        <?php } ?>
                    </div>

                </div><!-- Blog post end -->
            </div>
        </div>
    </div>
</section>