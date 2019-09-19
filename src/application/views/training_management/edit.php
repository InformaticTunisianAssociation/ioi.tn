<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="banner-area">
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>Edit Training</h2>
	          	</div>
          	</div><!-- Subpage title end -->
	</div><!-- Banner area end -->

	<!-- Main container start -->

	<section id="main-container">
		<div class="container">
			
			<div class="gap-40"></div>
			<form method='post' action='/training_management/edit/<?php echo $id ?>'>
			<div class="row">
	    		<div class="col-md-12">
                    <div id="register-error"></div>
	    			<div id="register" >
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Title</label>
								<input class="form-control" name="title" id="title"
                                placeholder="Title" type="text" value="<?php echo $title ?>" required>
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Description</label>
									<input class="form-control" name="description" id="ddescriptionuration" 
									placeholder="Description" type="text" value="<?php echo $description ?>" required>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Location</label>
									<input class="form-control" name="location" id="location" 
									placeholder="Location" type="text" value="<?php echo $location ?>" required>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Location URL</label>
									<input class="form-control" name="location_url" id="location_url" 
									placeholder="Location URL" type="text" value="<?php echo $location_url ?>" required>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Starts at</label>
									<input class="form-control" name="starts_at" id="starts_at" 
									placeholder="Start At" type="date" value="<?php echo $starts_at ?>" required>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Ends at</label>
									<input class="form-control" name="ends_at" id="ends_at" 
									placeholder="Ends At" type="date" value="<?php echo $ends_at ?>" required>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Level</label>
									<select name="level">
										<option value="beginner">beginner</option>
										<option value="intermidiate">intermidiate</option>
										<option value="advanced">advanced</option>
									</select>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Topic</label>
									<select name="topic">
										<option value="problem_solving">problem_solving</option>
										<option value="scratch">scratch</option>
										<option value="robotics">robotics</option>
									</select>
								</div>
							</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
                                <div class="text-right"><br>
                                    <button id="btn-register" class="btn btn-primary solid blank" type="submit">Edit</button> 
                                </div>
                            </div>
                        </div>
                    </div>
	    		</div>
	    	</div>
			</form>

		</div><!--/ container end -->

	</section><!--/ Main container end -->