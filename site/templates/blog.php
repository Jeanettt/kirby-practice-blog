<?php snippet('header') ?>

<section class="simple-layout simple-layout--box">

    <h1><?= $page->title()->html() ?></h1>
    <?= $page->text()->kirbytext() ?>

    <?php foreach($page->children()->listed()->flip() as $article): ?>
    
    <article>
        <div class="rich-text">
            <h1><?= $article->title()->html() ?></h1>
            <?= $article->intro()->kirbytext() ?>
            <a href="<?= $article->url() ?>">Read more...</a>
        </div>
    </article>
    
    <?php endforeach ?>

</section>

<?php snippet('footer') ?>