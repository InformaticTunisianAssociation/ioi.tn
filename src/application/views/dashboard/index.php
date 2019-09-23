<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="banner-area">
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>Users</h2>
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
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Grade</th>
                        <th scope="col">City</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Public Profile</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php echo $users_html; ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="/user_management/generate_users_csv" class="btn btn-primary">Download Users</a>
                </div>
            </div>
        </div>
    </section>