<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div id="banner-area">
		<img src="/assets/images/banner/banner2.jpg" alt ="" />
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>Login</h2>
		        	<ul class="breadcrumb">
			            <li>Home</li>
			            <li><a href="#"> Login</a></li>
		          	</ul>
	          	</div>
          	</div><!-- Subpage title end -->
	</div><!-- Banner area end -->

	<!-- Main container start -->

	<section id="main-container">
		<div class="container">
			
			<div class="gap-40"></div>

			<div class="row">
	    		<div class="col-md-12">
	    			<form id="contact-form" action="/auth/do_login" method="post" role="form">
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Username/E-mail</label>
								<input class="form-control" name="username" id="name" placeholder="Username" type="text" required>
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" name="password" id="password" 
									placeholder="Password" type="password" required>
								</div>
							</div>
                        </div>
                        <div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<a href="/register">New here? Create an account</a>
                                <div class="text-right"><br>
									<button class="btn btn-primary solid blank" type="submit">Login</button> 
								</div>
							</div>
                        </div>
					</form>
	    		</div>
	    	</div>

		</div><!--/ container end -->

	</section><!--/ Main container end -->

