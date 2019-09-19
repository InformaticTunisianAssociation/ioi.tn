<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="banner-area">
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>Trainings</h2>
	          	</div>
          	</div><!-- Subpage title end -->
	</div><!-- Banner area end -->

	<!-- Main container start -->

	<section id="main-container">
		<div class="container">
			
			<div class="gap-40"></div>

			<div class="row">
	    		<div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Starts at</th>
                        <th scope="col">Ends at</th>
                        <th scope="col">Level</th>
                        <th scope="col">Location</th>
                        <th scope="col">Topic</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $trainings_html; ?>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="add" role="button">Add</a>
                </div>
            </div>
        </div>
    </section>