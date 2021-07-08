<?php snippet('header') ?>

<section class="simple-layout simple-layout--centered-text">
    <div class="simple-layout__body">
        <header class="simple-layout__header">
            <div class="heading-group">
                <div class="heading-group__title">
                    <h1><?= $page->title()->html() ?></h1>
                </div>
            </div>
        </header>
        <div class="simple-layout__main">
            <?php snippet('blog-collection') ?>
        </div>
    </div>
</section>

<?php snippet('footer') ?>