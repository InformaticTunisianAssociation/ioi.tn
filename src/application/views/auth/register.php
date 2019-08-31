<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nidhalkratos
 * Date: 8/30/2019
 * Time: 9:09 PM
 */

?>

<div id="banner-area">
		<img src="/assets/images/banner/banner2.jpg" alt ="" />
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>Register</h2>
		        	<ul class="breadcrumb">
			            <li>Home</li>
			            <li><a href="#"> Register</a></li>
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
                    <div id="register-error"></div>
	    			<div id="register" >
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Username</label>
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
								<div class="form-group">
									<label>E-mail</label>
									<input class="form-control" name="email" id="email" 
									placeholder="Email Address" type="email" required>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>First Name</label>
									<input class="form-control" name="firstname" id="firstname" 
									placeholder="First Name" type="text" required>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Last Name</label>
									<input class="form-control" name="lastname" id="lastname" 
									placeholder="Last Name" type="text" required>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Birthday</label>
									<input class="form-control" name="date_birth" id="date_birth" 
									placeholder="Date of birth" type="date" required>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" name="phone" id="phone" 
									placeholder="Phone Number" type="text" required>
								</div>
							</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
                                <div class="text-right"><br>
                                    <button id="btn-register" class="btn btn-primary solid blank" type="submit">Signup</button> 
                                </div>
                            </div>
                        </div>
                    </div>
	    		</div>
	    	</div>

		</div><!--/ container end -->

	</section><!--/ Main container end -->