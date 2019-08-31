
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

                    <img src="/assets/img/users/<?php echo $photo ?>" width="15%" alt="User Pic" />
                    <h1><?php echo $firstname." ".$lastname ?></h1>

                    <p>
                        France-IOI: <?php echo $franceioi ?>
                    </p>

                    <p>
                        CodeForces: <?php echo $codeforces ?>
                    </p>

                    Competitions:
                    <table style="width:100%">
                        <tr>
                            <th>Name</th>
                            <th>Score</th>
                            <th>Rank</th>
                            <th>Medal</th>
                        </tr>

                        <?php
                        foreach($constestants as $contestant): ?>
                            <?php echo "<tr>"; ?>
                                <?php echo "<td>"."Name"."</td>"; ?>
                                <?php echo "<td>".$contestant->score."</td>"; ?>
                                <?php echo "<td>"."</td>"; ?>
                                <?php echo "<td>".$contestant->medal."</td>"; ?>
                            <?php echo "</tr>"; ?>
                        <?php endforeach; ?>


                        <tr>
                            <td>TOP 2017</td>
                            <td>150</td>
                            <td>16</td>
                            <td>None</td>
                        </tr>
                    </table>

                    Training:
                    <table style="width:100%">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Date</th>
                            <th>Location</th>
                        </tr>

                        <?php
                        foreach($participants as $participant): ?>
                            <?php echo "<tr>"; ?>
                                <?php echo "<td>"."Name"."</td>"; ?>
                                <?php echo "<td>"."Name"."</td>"; ?>
                                <?php echo "<td>"."Name"."</td>"; ?>
                                <?php echo "<td>".$participant->role."</td>"; ?>
                            <?php echo "</tr>"; ?>
                        <?php endforeach; ?>
                        

                        <tr>
                            <td>Summer Camp 2019 - 2</td>
                            <td>Participant</td>
                            <td>20-08-2019</td>
                            <td>Crefoc - Nabeul</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </section>
