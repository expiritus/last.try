<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page->getTitle(); ?></title>
    <meta name="keywords" content="<?php echo $page->getMetaKey(); ?>">
    <meta name="description" content="<?php echo $page->getMetaDesc(); ?>">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="../js/script.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
    <header>
        <h1>Название сайта</h1>
    </header>