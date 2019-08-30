<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<header id="header" class="navbar-fixed-top header" role="banner">
    <div class="container">
        <div class="row">
            <!-- Logo start -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand navbar-bg">
                    <a href="index.html">
                        <img class="img-responsive" src="/assets/images/logo.png" alt="logo">
                    </a>
                </div>
            </div><!--/ Logo end -->
            <nav class="collapse navbar-collapse clearfix" role="navigation">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home <i class="fa fa-angle-down"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trainings <i class="fa fa-angle-down"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contests <i class="fa fa-angle-down"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Join Us <i class="fa fa-angle-down"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username ?> <i class="fa fa-angle-down"></i></a>
                    </li>




                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </nav><!--/ Navigation end -->
        </div><!--/ Row end -->
    </div><!--/ Container end -->
</header><!--/ Header end -->
