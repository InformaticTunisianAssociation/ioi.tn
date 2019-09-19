
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="banner-area">
		<img src="/assets/images/banner/banner2.jpg" alt ="" />
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>User Info</h2>
		        	<ul class="breadcrumb">
			            <li>Home</li>
			            <li><a href="#"> User Info</a></li>
		          	</ul>
	          	</div>
          	</div><!-- Subpage title end -->
    </div><!-- Banner area end -->
    
	<section id="main-container">
		<div class="container">
			
			<div class="gap-40"></div>

            <?php if($logged_in and $user_id == $logged_in_user_id) { ?>
                <a class="" href="/me/edit_info">Edit My profile</a>
            <?php } ?>
			<div class="row">
	    		<div class="col-md-12">

                    <img src="<?php echo $photo_url ?>" width="15%" alt="User Pic" />
                    <h1><?php echo $firstname." ".$lastname ?></h1>

                    <p>
                        France-IOI: <?php echo $franceioi ?>
                    </p>

                    <p>
                        CodeForces: <?php echo $codeforces ?>
                    </p>

                    Competitions:
                    <table border='1' style="width:100%">
                        <tr>
                            <th>Name</th>
                            <th>Score</th>
                            <th>Rank</th>
                            <th>Medal</th>
                        </tr>

                       <?php echo $competitions_html ?>



                    </table>

                    Training:
                    <table border='1' style="width:100%">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Date</th>
                            <th>Location</th>
                        </tr>

                        <?php echo $participations_html ?>
                                            </table>

                </div>
            </div>
        </div>
    </section>
