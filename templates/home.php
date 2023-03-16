<?php include('elements/header.php'); ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Добавление ингредиента</title>
  <link rel="stylesheet" href="assets/css/uikit.min.css">
</head>
<body>

<?php require_once 'elements/header.php'; ?>

<main class="uk-container uk-margin-top">

    <div class="uk-card uk-card-default uk-card-body">

        <div class="uk-margin">
            <ul uk-tab>
                <li><a href="#">Продукти</a></li>
                <li><a href="#">Страви</a></li>
                <li><a href="#">Підсумок</a></li>
            </ul>

            <div class="uk-switcher uk-margin">
                <div class="main_homesection"><?php include('home-p1.php'); ?></div>
                <div class="main_homesection"><?php include('home-p2.php'); ?></div>
                <div class="main_homesection"><?php include('home-p3.php'); ?></div>
            </div>
        </div>
    </div>
</main>


<?php include('elements/footer.php'); ?>