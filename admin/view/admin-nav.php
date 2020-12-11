<?php

if(empty($_SESSION)) session_start();

global $_lms_styles;
global $_lms_scripts;
global $connection;

$show_header = isset($show_header) ? $show_header : true;
$is_log_in_page = isset($is_log_in_page) ? $is_log_in_page : false;


if(!$is_log_in_page && empty($_SESSION['id'])){
    header('Location:'. BASE_PATH. '/admin/login.php');
}
else if($is_log_in_page && !empty($_SESSION['id'])){
    header('Location:'. BASE_PATH. '/admin/index.php');
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
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
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
    <title>Nightingale</title>
</head>
<style>
    html,body {
        height:100%;
    }
</style>
<body>
<?php include ROOT_DIR . '/admin/widget/nav.php';