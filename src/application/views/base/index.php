<?php
defined('BASEPATH') OR exit('No direct script access allowed');
assert(isset($content));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IOI International Olympiad in Informatics : Tunisia &#8211; Change your life and start coding now</title>



    <!-- Meta tags -->
    <?php if(isset($meta)) { foreach($meta as $ameta) { ?>
        <meta name="<?php echo $ameta['name'] ?>" content="<?php echo $ameta['value'] ?>">
    <?php } } ?>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <?php /*
    <!-- BASE CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/vendors.css" rel="stylesheet">
    <link href="/assets/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!--VIDEO JS -->
    <link href="/assets/css/video-js.css" rel="stylesheet">

    <!--VIDEO JS RESOLUTION SWITCHER -->
    <link href="/assets/css/videojs-resolution-switcher.css" rel="stylesheet">


    <!-- YOUR CUSTOM CSS -->
    <link href="/assets/css/custom.css" rel="stylesheet">

    <!-- STUDY.TN STYLES -->
    <link href="/assets/css/study_styles.css" rel="stylesheet">

    <!-- Modernizr -->
    <script src="/assets/js/modernizr.js"></script>

    <!-- SPECIFIC CSS -->
    <link href="/assets/css/skins/square/grey.css" rel="stylesheet">

    <link href = "/assets/css/jquery-ui.css" rel = "stylesheet">

    <!-- CROPPIEJS -->

    <link href="/assets/vendor/Croppie-2.6.4/croppie.css" rel="stylesheet">

    <!-- CROPPIEJS -->
    */ ?>
    <?php if(isset($css)) { foreach($css as $url) { ?>
        <link href = "<?php echo $url ?>" rel = "stylesheet">
    <?php } } ?>

</head>

<body>

<!-- Structured data -->
<?php if(isset($structured_data)) { ?>
    <script type="application/ld+json">
    <?php echo json_encode($structured_data); ?>

</script>
<?php } ?>

<div id="page">
    <?php echo $header ?>


    <main>
        <?php echo $content ?>
    </main>



    <?php echo $footer ?>
    <!--/footer-->
</div>
<!-- page -->

<?php /*
<!-- COMMON SCRIPTS -->
<script src="/assets/js/jquery-2.2.4.min.js"></script>

<script src="/assets/js/common_script_original.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/validate.js"></script>

<!-- Custom script -->
<script src="/assets/js/study_scripts.js"></script>

<!-- VIDEO JS -->
<script src="/assets/js/video.js"></script>

<!-- VIDEO JS RESOLUTION SWITCHER -->
<script src="/assets/js/videojs-resolution-switcher.js"></script>

<!-- JQUERY UI -->
<script src="/assets/js/jquery-ui.js"></script>


<!-- CROPPIE JS -->
<script src="/assets/vendor/Croppie-2.6.4/croppie.js"></script>
*/ ?>
<?php if(isset($js)){
    foreach($js as $url) { ?>
        <script src="<?php echo $url ?>"></script>
    <?php } } ?>

<script>
    <?php if(isset($toast) and $toast) { ?>
    new Toast({
        message: '<?php echo $toast['message'] ?>',
        type: '<?php echo $toast['type'] ?>'
    });
    <?php } ?>
</script>


</body>
</html>
