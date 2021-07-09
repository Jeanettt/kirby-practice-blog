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
                <p><strong>
                    <?= $page->intro()->kirbytext() ?>
                </strong></p>
                <?= $page->text()->kirbytext() ?>
                <a href="<?= url('blog') ?>">‹ back...</a>
            </div>
        </div>
    </div>
</section>
<?php if($page->hasImages()): ?>
<section class="simple-layout simple-layout--centered-text">
    <div class="simple-layout__body">
        <div class="simple-layout__header">
            <h2>Fotootjes</h2>
        </div>
        <div class="simple-layout__main">
        <div class="gallery gallery--max-regular-width">
            <div class="gallery__items
                <?php if($page->images()->count() > 5): ?>
                    gallery__items--3-columns
                <?php elseif($page->images()->count() > 1): ?>
                        gallery__items--2-columns
                <?php endif; ?>"
            >
                <?php foreach($page->images()->sortBy('sort') as $image): ?>
                <div class="gallery__item">
                    <img class="gallery__image" 
                        src="<?= $image->url() ?>"
                        srcset="<?= $image->srcset() ?>"
                        alt=""
                    />
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php snippet('footer') ?>