<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col-sm-3 photo-category-<?php echo $category_id ?> isotope-item">
    <div class="grid">
        <figure class="effect-oscar">
            <img src="<?php echo $photo_url ?>" alt="">
            <figcaption>
                <h3><?php echo $title ?></h3>
                <a class="link icon-pentagon" href="<?php echo $redirect_url ?>"><i class="fa fa-link"></i></a>
                <a class="view icon-pentagon" data-rel="prettyPhoto" href="<?php echo $photo_url ?>"><i class="fa fa-search"></i></a>
            </figcaption>
        </figure>
    </div>
</div><!-- Isotope item end -->
