<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="banner-area">
    <div class="parallax-overlay"></div>
    <!-- Subpage title start -->
    <div class="banner-title-content">
        <div class="text-center">
            <h2>Edit Contest</h2>
        </div>
    </div><!-- Subpage title end -->
</div><!-- Banner area end -->

<!-- Main container start -->

<section id="main-container">
    <div class="container">

        <div class="gap-40"></div>
        <form method='post' action='/contest_management/edit/<?php echo $id ?>'>
            <div class="row">
                <div class="col-md-12">
                    <div id="register-error"></div>
                    <div id="register">
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
                                    <label>Duration</label>
                                    <input class="form-control" name="duration" id="duration"
                                           placeholder="Duration" type="text" value="<?php echo $duration ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Number of Problems</label>
                                    <input class="form-control" name="nb_problems" id="nb_problems"
                                           placeholder="Number of Problems" type="text"
                                           value="<?php echo $nb_problems ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Optimal score</label>
                                    <input class="form-control" name="optimal_score" id="optimal_score"
                                           placeholder="Optimal score" type="text" value="<?php echo $optimal_score ?>"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Starts at | <?php echo $starts_at ?> </label>
                                    <input class="form-control" name="starts_at" id="starts_at"
                                           placeholder="Start At" type="date" value="<?php echo $starts_at ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contest URL</label>
                                    <input class="form-control" name="contest_url" id="contest_url"
                                           placeholder="Contest URL" type="text" value="<?php echo $contest_url ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Visible</label>
                                    <input class="" name="visible" id="visible" value="1"
                                           type="checkbox" <?php if ($visible) { ?> checked <?php } ?>>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="text-right"><br>
                                    <button id="btn-register" class="btn btn-primary solid blank" type="submit">Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div><!--/ container end -->

</section><!--/ Main container end -->