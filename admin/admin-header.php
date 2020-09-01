<?php

global $_lms_styles;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <?php if(!empty($_lms_styles)){ ?>
        <?php foreach ($_lms_styles as $style){ ?>
            <link rel="stylesheet" href="<?php echo $style;?>">
        <?php } ?>
    <?php } ?>
    <script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LMS Admin</title>
</head>
<style>
    html,body {
        height:100%;
    }
</style>
<body>