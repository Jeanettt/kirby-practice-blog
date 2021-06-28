<?php snippet('header') ?>

<section class="content article">
    <article>
        <h1><?= $page->title()->html() ?></h1>
        <?= $page->intro()->kirbytext() ?>
        <?= $page->text()->kirbytext() ?>

        <a href="<?= url('blog') ?>">Back...</a>

    </article>
</section>

<?php snippet('footer') ?>