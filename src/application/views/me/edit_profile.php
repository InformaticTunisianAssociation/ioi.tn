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
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4 text-center">
                            <img src="<?php echo $profile_photo ?>" width="100" height="100">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username <span class="text-danger">(Required)</span></label>
                                <input class="form-control disabled" name="username" id="name" placeholder="Username" type="text" value="<?php echo $username ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail <span class="text-danger">(Required)</span></label>
                                <input class="form-control disabled" name="email" id="email"
                                       placeholder="Email Address" type="email" value="<?php echo $email ?>" type="email" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">(Required)</span></label>
                                <input class="form-control disabled" name="firstname" id="firstname"
                                       placeholder="First Name" type="text" value="<?php echo $firstname ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name <span class="text-danger">(Required)</span></label>
                                <input class="form-control disabled" name="lastname" id="lastname"
                                       placeholder="Last Name" type="text" value="<?php echo $lastname ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birthday <span class="text-danger">(Required)</span></label>
                                <input class="form-control" name="date_birth" id="date_birth"
                                       placeholder="Date of birth" type="date" value="<?php echo $date_birth ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone <span class="text-danger">(Required)</span></label>
                                <input class="form-control" name="phone" id="phone"
                                       placeholder="Phone Number" type="text" value="<?php echo $phone ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Codeforces ID <span class="text-info">(Optional)</span></label>
                                <input class="form-control" name="codeforces" id="codeforces"
                                       placeholder="Codeforces account" type="text" value="<?php echo $codeforces ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>France-IOI ID <span class="text-info">(Optional)</span></label>
                                <input class="form-control" name="franceioi" id="franceioi"
                                       placeholder="Frence IOI" type="text" value="<?php echo $franceioi ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School <span class="text-danger">(Required)</span></label>
                                <input class="form-control" name="school_name" id="school_name"
                                       placeholder="School name" type="text" value="<?php echo $school_name ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Grade <span class="text-danger">(Required)</span></label><br>
                                <select name="grade">
                                    <option <?php if($grade==null) echo "selected" ?> >Not selected</option>
                                    <option <?php if($grade=="7eme") echo "selected" ?> value="7eme">7ème année de base</option>
                                    <option <?php if($grade=="8eme") echo "selected" ?> value="8eme">8ème année de base</option>
                                    <option <?php if($grade=="9eme") echo "selected" ?> value="9eme">9ème année de base</option>
                                    <option <?php if($grade=="1ere") echo "selected" ?> value="1ere">1ère année secondaire</option>
                                    <option <?php if($grade=="2eme") echo "selected" ?> value="2eme">2ème année secondaire</option>
                                    <option <?php if($grade=="3eme") echo "selected" ?> value="3eme">3ème année secondaire</option>
                                    <option <?php if($grade=="bac") echo "selected" ?> value="bac">4ème année secondaire (bac)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City <span class="text-danger">(Required)</span></label>
                                <input class="form-control" name="city" id="city"
                                       placeholder="City" type="text" value="<?php echo $city ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>State <span class="text-danger">(Required)</span></label>
                                <br>
                                <select name="state">
                                    <option <?php if($state=="Ariana") echo "selected" ?> value="Ariana">Ariana</option>
                                    <option <?php if($state=="Béja") echo "selected" ?> value="Béja">Béja</option>
                                    <option <?php if($state=="Ben Arous") echo "selected" ?> value="Ben Arous">Ben Arous</option>
                                    <option <?php if($state=="Bizerte") echo "selected" ?> value="Bizerte">Bizerte</option>
                                    <option <?php if($state=="Gabès") echo "selected" ?> value="Gabès">Gabès</option>
                                    <option <?php if($state=="Gafsa") echo "selected" ?> value="Gafsa">Gafsa</option>
                                    <option <?php if($state=="Jendouba") echo "selected" ?> value="Jendouba">Jendouba</option>
                                    <option <?php if($state=="Kairouan") echo "selected" ?> value="Kairouan">Kairouan</option>
                                    <option <?php if($state=="Kasserine") echo "selected" ?> value="Kasserine">Kasserine</option>
                                    <option <?php if($state=="Kebili") echo "selected" ?> value="Kebili">Kebili</option>
                                    <option <?php if($state=="Kef") echo "selected" ?> value="Kef">Kef</option>
                                    <option <?php if($state=="Mahdia") echo "selected" ?> value="Mahdia">Mahdia</option>
                                    <option <?php if($state=="Manouba") echo "selected" ?> value="Manouba">Manouba</option>
                                    <option <?php if($state=="Medenine") echo "selected" ?> value="Medenine">Medenine</option>
                                    <option <?php if($state=="Monastir") echo "selected" ?> value="Monastir">Monastir</option>
                                    <option <?php if($state=="Nabeul") echo "selected" ?> value="Nabeul">Nabeul</option>
                                    <option <?php if($state=="Sfax") echo "selected" ?> value="Sfax">Sfax</option>
                                    <option <?php if($state=="Sidi Bouzid") echo "selected" ?> value="Sidi Bouzid">Sidi Bouzid</option>
                                    <option <?php if($state=="Siliana") echo "selected" ?> value="Siliana">Siliana</option>
                                    <option <?php if($state=="Sousse") echo "selected" ?> value="Sousse">Sousse</option>
                                    <option <?php if($state=="Tataouine") echo "selected" ?> value="Tataouine">Tataouine</option>
                                    <option <?php if($state=="Tozeur") echo "selected" ?> value="Tozeur">Tozeur</option>
                                    <option <?php if($state=="Tunis") echo "selected" ?> value="Tunis">Tunis</option>
                                    <option <?php if($state=="Zaghouan") echo "selected" ?> value="Zaghouan">Zaghouan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Knowledge Level <span class="text-danger">(Required)</span></label>
                                <br>
                                <select name="knowledge_level">
                                    <option <?php if($knowledge_level=="Beginner") echo "selected" ?> value="beginner">beginner</option>
                                    <option <?php if($knowledge_level=="Intermediate") echo "selected" ?> value="intermediate">intermediate</option>
                                    <option <?php if($knowledge_level=="Advanced") echo "selected" ?> value="advanced">advanced</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Profile Photo: <span class="text-success"> 1024px by 1024px</span> <span class="text-info">(Optional)</span></label>
                                <input name="profile_photo" id="profile_photo"
                                       placeholder="Profile Photo" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>
                                    <a href="<?php echo $passport_scan_photo ?>" target="_blank">Show My Passport</a>
                                </p>
                                <label>Passport Scan of 1st page: <span class="text-success"> 1024px by 1024px</span> <span class="text-info">(Optional)</span></label>
                                <input name="passport_photo" id="passport_photo"
                                       placeholder="Passport Photo" type="file">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Old Password <span class="text-success">(Only when you want to change your password)</span> <span class="text-info">(Optional)</span></label>
                                <input class="form-control" name="old_password" id="old_password"
                                       placeholder="Password" type="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New Password <span class="text-info">(Optional)</span></label>
                                <input class="form-control" name="password" id="password"
                                       placeholder="Password" type="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password <span class="text-info">(Optional)</span></label>
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
