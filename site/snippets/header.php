<!DOCTYPE html>
<html lang="nl">
<head>
    <title><?= $page->title() ?> - <?= $site->title(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= css('assets/css/default.css') ?>
    <link rel="preload" href="/assets/fonts/lemurika.woff2" as="font" type="font/woff2" crossorigin="anonymous">
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
                        <svg height="100" width="100">
                            <circle cx="50" cy="50" r="40" stroke="#000" stroke-width="3" fill="transparent" />
                            <text x="50%" y="40px" fill="hsl(2, 33%, 60%)" text-anchor="middle" transform="rotate(30 20,40)"><?= $page->title() ?></text>
                        </svg>
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