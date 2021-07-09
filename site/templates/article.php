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
            <div class="rich-text rich-text--centered">
                <?= $page->intro()->kirbytext() ?>
                <?= $page->text()->kirbytext() ?>
                <a href="<?= url('blog') ?>">‹ back...</a>
            </div>
        </div>
    </div>
</section>
<?php if($page->hasImages()): ?>
<section class="simple-layout simple-layout--centered-text simple-layout--max-narrow-width">
    <div class="simple-layout__body">
        <div class="simple-layout__header">
            <h2>Fotootjes</h2>
        </div>
        <div class="simple-layout__main">
        <div class="collection">
            <div class="collection__items">
                <?php foreach($page->images()->sortBy('sort') as $image): ?>
                <img class="collection__item" 
                    src="<?= $image->url() ?>"
                    srcset="<?= $image->srcset() ?>"
                    alt=""
                />
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php snippet('footer') ?>