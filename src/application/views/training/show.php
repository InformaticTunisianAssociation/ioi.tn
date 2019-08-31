<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="banner-area">
		<img src="/assets/images/banner/banner2.jpg" alt ="" />
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>Training</h2>
		        	<ul class="breadcrumb">
			            <li>Home</li>
			            <li><a href="#"> Training</a></li>
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
							<img src="/assets/images/blog/blog1.jpg" class="img-responsive"  alt="" />
							<span class="blog-date"><a href="#"><?php echo $starts_at ?></a></span>
						</div><!-- post image end -->
						<div class="post-header clearfix">
							<h2 class="post-title">
								<a href="#"><?php echo $title ?></a>
							</h2>
						</div><!-- post heading end -->
						<div class="entry-content">
							<p><?php echo $description ?></p>
                            <?php echo $ends_at  ?>
                            <?php echo $level  ?>
                            <?php echo $location ?>
                            <?php echo $location_url ?>
                            <?php echo $topic ?>
                            <p class="apply"><a href="#" class="btn btn-primary solid">Apply Now <i class="fa fa-long-arrow-right"></i></a></p>
						</div>

					</div><!-- Blog post end -->