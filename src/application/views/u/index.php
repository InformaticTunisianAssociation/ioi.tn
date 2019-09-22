
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

			<div class="row">
	    		<div class="col-md-12">

                    <img src="<?php echo $photo_url ?>" width="15%" alt="User Pic" />
                    <h1><?php echo $firstname." ".$lastname ?></h1>

                        <div class="handels">
                            <p>
                                <span class="titre">France-IOI:</span> <?php echo $franceioi ?>
                            </p>

                            <p>
                                <span class="titre">CodeForces:</span> <?php echo $codeforces ?>
                            </p>
                        </div>


                    <span class="titre"><i class="fas fa-running"></i> Competitions</span>
                    <table class="table table-hover" border='1' style="width:100%">
                        <tr>
                            <th>Name</th>
                            <th>Score</th>
                            <th>Rank</th>
                            <th>Medal</th>
                        </tr>

                       <?php echo $competitions_html ?>



                    </table>

                    <span class="titre"><i class="fas fa-dumbbell"></i> Training</span>
                    <table class="table table-hover" border='1' style="width:100%">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Date</th>
                            <th>Location</th>
                        </tr>

                        <?php echo $participations_html ?>
                                            </table>
                        <?php if($logged_in and $user_id == $logged_in_user_id) { ?>
                            <button type="button" class="btn btn-danger"><a class="whitelink" href="/me/edit_info">Edit My profile</a></button>
                        <?php } ?>

                    
                </div>
            </div>
        </div>
    </section>
