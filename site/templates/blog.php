<?php snippet('header') ?>

<section class="simple-layout">
    <div class="simple-layout__body">
        <div class="simple-layout__main">
            <h1><?= $page->title()->html() ?></h1>
            <?php snippet('blog-collection') ?>
            <?php snippet('pagination') ?>
        </div>
    </div>
</section>

<?php snippet('footer') ?>