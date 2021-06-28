<?php snippet('header') ?>

<section class="simple-layout">
    <article>
        <div class="rich-text">
            <h1><?= $page->title()->html() ?></h1>
            <?= $page->intro()->kirbytext() ?>
            <?= $page->text()->kirbytext() ?>
    
            <a href="<?= url('blog') ?>">Back...</a>
        </div>
    </article>
</section>

<?php snippet('footer') ?>