<?php
$page_name = isset($page_name) ? $page_name. ' ' : 'Untitled ';
$site_name = (defined(SITE_NAME)) ? '- '. SITE_NAME : '- LMS';
$language = isset($language) ? $language : 'en';
?>
<!doctype html>
<html lang="<?php echo $language?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_name . $site_name ?></title>
</head>
<body>
