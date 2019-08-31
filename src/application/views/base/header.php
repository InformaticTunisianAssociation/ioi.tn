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
                        <a href="/" >Home <i class="fa fa-angle-down"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="/training" class="" >Trainings <i class="fa fa-angle-down"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="/contest">Contests <i class="fa fa-angle-down"></i></a>
                    </li>

                    <?php if($logged_in) { ?>
                        <li class="dropdown">
                            <a href="/me/edit_info"><?php echo $username ?><i class="fa fa-angle-down"></i></a>
                        </li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="/register">Register<i class="fa fa-angle-down"></i></a>
                        </li>
                    <?php } ?>

                    <?php if($logged_in) { ?>
                        <li><a href="/logout">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="/login">Login</a></li>

                    <?php } ?>
                </ul>
            </nav><!--/ Navigation end -->
        </div><!--/ Row end -->
    </div><!--/ Container end -->
</header><!--/ Header end -->
