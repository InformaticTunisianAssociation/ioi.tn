<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nidhalkratos
 * Date: 8/30/2019
 * Time: 9:09 PM
 */

?>
<br><br><br><br><br><br>

<div class="container">
    <img src="<?php echo $profile_photo ?>" width="100" height="100">

    <div class="">
        <?php echo form_open_multipart('/me/edit_info'); { ?>

            <input name="username" placeholder="Username" value="<?php echo $username ?>" class="disabled" disabled>
            <input name="email" placeholder="Email Address" value="<?php echo $email ?>" type="email" class="disabled" disabled>
            <input name="firstname" placeholder="First name" value="<?php echo $firstname ?>">
            <input name="lastname" placeholder="Last name" value="<?php echo $lastname ?>">
            <input name="date_birth" placeholder="Date of birth" value="<?php echo $date_birth ?>" type="date">
            <input name="phone" placeholder="Phone Number" value="<?php echo $phone ?>">
            <input name="codeforces" placeholder="Code forces account" value="<?php echo $codeforces ?>">
            <input name="franceioi" placeholder="France IOI" value="<?php echo $franceioi ?>">
            <input name="profile_photo" type="file" >
            <input name="passport_photo" type="file" >
            Old Password:<input name="old_password" placeholder=""><br>
            New Password:<input name="password" placeholder=""><br>
            Confirm password:<input name="confirm_password" placeholder="">
            <input class="btn btn-success" type="submit" value="Update">
        <?php } echo form_close(); ?>




    </div>
</div>

