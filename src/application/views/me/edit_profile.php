<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="banner-area">
		<img src="/assets/images/banner/banner2.jpg" alt ="" />
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>Edit</h2>
		        	<ul class="breadcrumb">
			            <li>Home</li>
			            <li><a href="#"> Edit</a></li>
		          	</ul>
	          	</div>
          	</div><!-- Subpage title end -->
	</div><!-- Banner area end -->

	<!-- Main container start -->

	<section id="main-container">
		<div class="container">
			
			<div class="gap-40"></div>
            <?php echo form_open_multipart('/me/edit_info'); { ?>
			<div class="row">
	    		<div class="col-md-12">
                    <div id="register-error"></div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
                            <img src="<?php echo $profile_photo ?>" width="100" height="100">                            </div>
                        </div>

						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Username</label>
								<input class="form-control disabled" name="username" id="name" placeholder="Username" type="text" value="<?php echo $username ?>" disabled>
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>E-mail</label>
									<input class="form-control disabled" name="email" id="email" 
									placeholder="Email Address" type="email" value="<?php echo $email ?>" type="email" disabled>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>First Name</label>
									<input class="form-control disabled" name="firstname" id="firstname" 
									placeholder="First Name" type="text" value="<?php echo $firstname ?>" disabled>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Last Name</label>
									<input class="form-control disabled" name="lastname" id="lastname" 
									placeholder="Last Name" type="text" value="<?php echo $lastname ?>" disabled>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Birthday</label>
									<input class="form-control" name="date_birth" id="date_birth" 
									placeholder="Date of birth" type="date" value="<?php echo $date_birth ?>">
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" name="phone" id="phone" 
									placeholder="Phone Number" type="text" value="<?php echo $phone ?>">
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Codeforces ID</label>
									<input class="form-control" name="codeforces" id="codeforces" 
									placeholder="Codeforces account" type="text" value="<?php echo $codeforces ?>">
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>France-IOI ID</label>
									<input class="form-control" name="franceioi" id="franceioi" 
									placeholder="Frence IOI" type="text" value="<?php echo $franceioi ?>">
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Profile Photo</label>
									<input name="profile_photo" id="profile_photo" 
									placeholder="Profile Photo" type="file">
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Passport Photo</label>
									<input name="passport_photo" id="passport_photo" 
									placeholder="Passport Photo" type="file">
								</div>
							</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Old Password</label>
									<input class="form-control" name="old_password" id="old_password" 
									placeholder="Password" type="password">
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>New Password</label>
									<input class="form-control" name="password" id="password" 
									placeholder="Password" type="password">
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Confirm Password</label>
									<input class="form-control" name="confirm_password" id="confirm_password" 
									placeholder="Password" type="password">
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
                                <div class="text-right"><br>
                                    <button id="btn-register" class="btn btn-primary solid blank" type="submit">Update</button> 
                                </div>
                            </div>
                        </div>
	    		</div>
	    	</div>
            <?php } echo form_close(); ?>
		</div><!--/ container end -->

	</section><!--/ Main container end -->
