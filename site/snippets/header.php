<!DOCTYPE html>
<html lang="nl">
<head>
    <title><?= $page->title() ?> - <?= $site->title(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php snippet('head/preload') ?>
    <?= css('assets/css/default.css') ?>
</head>

<body class="page">
    <header class="page__header">
        <a class="visually-hidden"
            href="#skip-navigation-bar"
        >
            <?= t('global.skip-navigation-bar-action') ?>
        </a>
        <nav class="navigation-bar">
            <div class="navigation-bar__body">
                <div class="navigation-bar__left">

                </div>
                <div class="navigation-bar__center">
                    <div class="navigation-bar__logo">
                        <?= @svg('assets/images/sun-logo.svg') ?>
                    </div>
                </div>
                <div class="navigation-bar__right">

                </div>
            </div>
        </nav>
        <?php snippet('menu') ?>
        <a class="visually-hidden"
            id="skip-navigation-bar"
        >
        </a>
    </header>
	<main class="page__main">