<?php

if(empty($_SESSION)) session_start();

global $_lms_styles;
global $_lms_scripts;
global $connection;

$show_header = isset($show_header) ? $show_header : true;
$is_log_in_page = isset($is_log_in_page) ? $is_log_in_page : false;


if($is_log_in_page === false && empty($_SESSION['id'])){
    header('Location:'. BASE_PATH. '/login.php');
}
else if($is_log_in_page === true && !empty($_SESSION['id'])){
    header('Location:'. BASE_PATH. '/index.php');
}

$users = new \com\labstry\lms_core\Users($connection);
$user_arr = $users->getUserById($_SESSION['id']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_PATH . '/css/admin.css' ?>">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <?php if(!empty($_lms_styles)){ ?>
        <?php foreach ($_lms_styles as $style){ ?>
            <link rel="stylesheet" href="<?php echo $style;?>">
        <?php } ?>
    <?php } ?>
    <link rel="stylesheet" href="<?php echo BASE_PATH . '/css/admin.css' ?>">
    <script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
    <?php if(!empty($_lms_scripts)){ ?>
        <?php foreach ($_lms_scripts as $script){ ?>
            <script src="<?php echo $script; ?>"></script>
        <?php } ?>
    <?php } ?>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LMS Admin</title>
</head>
<style>
    html,body {
        height:100%;
    }
</style>
<body>
<div class="bg-pop-mosaic d-flex align-items-center" style="height: 50px">
    <img class="svg-inline h-100 py-2"  src="<?php echo BASE_PATH . '/../assets/lms-logo.svg'?>" alt="">

    <div class="ml-auto text-light">
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
                <?php echo $user_arr['username'] ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo BASE_PATH . '/../'?>">Logout</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
    </div>
</div>