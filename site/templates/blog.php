<?php snippet('header') ?>
<?php snippet('menu') ?>

<section class="content blog">

    <h1><?= $page->title()->html() ?></h1>
    <?= $page->text()->kirbytext() ?>

    <?php foreach($page->children()->listed()->flip() as $article): ?>
    
    <article>
        <h1><?= $article->title()->html() ?></h1>
        <?= $article->intro()->kirbytext() ?>
        <a href="<?= $article->url() ?>">Read more...</a>
    </article>
    
    <?php endforeach ?>

</section>

<?php snippet('footer') ?>