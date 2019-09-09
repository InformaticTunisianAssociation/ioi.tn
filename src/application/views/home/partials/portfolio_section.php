<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Portfolio start -->
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                <span class="title-icon classic pull-left"><i class="fa fa-suitcase"></i></span>
                <h2 class="title classic">We are happy and friendly</h2>
            </div>
        </div> <!-- Title row end -->

        <!--Isotope filter start -->
        <div class="row text-right">
            <div class="isotope-nav" data-isotope-nav="isotope">
                <ul>
                    <li><a href="#" class="active" data-filter="*">All</a></li>
                    <?php echo $photo_categories_html ?>
                </ul>
            </div>
        </div><!-- Isotope filter end -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div id="isotope" class="isotope">
                <?php echo $portfolio_items_html ?>
            </div><!-- Isotope content end -->
        </div><!-- Content row end -->
    </div><!-- Container end -->
</section><!-- Portfolio end -->