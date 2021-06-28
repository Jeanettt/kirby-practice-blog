<!DOCTYPE html>
<html lang="nl">
<head>
    <title><?= $page->title() ?> - <?= $site->title(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php snippet('scss') ?>
    <?= css('assets/css/default.css') ?>
</head>

<body>

<?php snippet('menu') ?>