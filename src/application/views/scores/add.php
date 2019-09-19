<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="banner-area">
		<div class="parallax-overlay"></div>
			<!-- Subpage title start -->
			<div class="banner-title-content">
	        	<div class="text-center">
		        	<h2>Scores</h2>
	          	</div>
          	</div><!-- Subpage title end -->
	</div><!-- Banner area end -->

	<!-- Main container start -->

	<section id="main-container">
		<div class="container">
			
			<div class="gap-40"></div>
			<form method='post' action='/scores/add'>
			<div class="row">
	    		<div class="col-md-12">
                    <div id="register-error"></div>
	    			<div id="register" >
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Contest ID</label>
								<input class="form-control" name="contest_id" id="contest_id"
                                placeholder="Title" type="text" required>
								</div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>User ID</label>
								<input class="form-control" name="user_id" id="user_id"
                                placeholder="Title" type="text" required>
								</div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Score</label>
								<input class="form-control" name="score" id="score"
                                placeholder="Title" type="text" required>
								</div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Medal</label>
									<select name="medal">
										<option value="gold">gold</option>
										<option value="silver">silver</option>
										<option value="bronze">bronze</option>
										<option value="trophy">trophy</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
							<div class="col-md-4">
                                <div class="text-right"><br>
                                    <button id="btn-register" class="btn btn-primary solid blank" type="submit">Add</button> 
                                </div>
                            </div>
                        </div>
                    </div>
	    		</div>
	    	</div>
			</form>

		</div><!--/ container end -->

	</section><!--/ Main container end -->