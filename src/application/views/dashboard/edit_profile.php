<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="banner-area">
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>Edit</h2>
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
									<label>School</label>
									<input class="form-control" name="school_name" id="school_name" 
									placeholder="School naùe" type="text" value="<?php echo $school_name ?>">
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Grade</label>
									<br>
									<select name="grade">
										<option value="7eme">7ème année de base</option>
										<option value="8eme">8ème année de base</option>
										<option value="9eme">9ème année de base</option>
										<option value="1ere">1ère année secondaire</option>
										<option value="2eme">2ème année secondaire</option>
										<option value="3eme">3ème année secondaire</option>
										<option value="bac">4ème année secondaire (bac)</option>
									</select>
								</div>
							</div>
                        </div>
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>City</label>
									<input class="form-control" name="city" id="city" 
									placeholder="City" type="text" value="<?php echo $city ?>">
								</div>
							</div>
                        </div>
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>State</label>
									<br>
									<select name="state">
										<option value="Ariana">Ariana</option>
										<option value="Béja">Béja</option>
										<option value="Ben Arous">Ben Arous</option>
										<option value="Bizerte">Bizerte</option>
										<option value="Gabès">Gabès</option>
										<option value="Gafsa">Gafsa</option>
										<option value="Jendouba">Jendouba</option>
										<option value="Kairouan">Kairouan</option>
										<option value="Kasserine">Kasserine</option>
										<option value="Kebili">Kebili</option>
										<option value="Kef">Kef</option>
										<option value="Mahdia">Mahdia</option>
										<option value="Manouba">Manouba</option>
										<option value="Medenine">Medenine</option>
										<option value="Monastir">Monastir</option>
										<option value="Nabeul">Nabeul</option>
										<option value="Sfax">Sfax</option>
										<option value="Sidi Bouzid">Sidi Bouzid</option>
										<option value="Siliana">Siliana</option>
										<option value="Sousse">Sousse</option>
										<option value="Tataouine">Tataouine</option>
										<option value="Tozeur">Tozeur</option>
										<option value="Tunis">Tunis</option>
										<option value="Zaghouan">Zaghouan</option>
									</select>
								</div>
							</div>
                        </div>
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Knowledge Level</label>
									<br>
									<select name="knowledge_level">
										<option value="beginner">beginner</option>
										<option value="intermediate">intermediate</option>
										<option value="advanced">advanced</option>
									</select>
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
                                    <p>
                                        <a href="<?php echo $passport_scan_photo ?>" target="_blank">Show My Passport</a>
                                    </p>
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
