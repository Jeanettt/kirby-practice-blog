<?php snippet('header') ?>

<section class="simple-layout">
    <article>
        <div class="rich-text">
            <h1><?= $page->title()->html() ?></h1>
            <?= $page->intro()->kirbytext() ?>
        </div>
        <div class="collection collection--grid">
            <div class="collection__items">
                <?php foreach($page->images() as $image): ?>
                <img class="collection__item" 
                    src="<?= $image->url() ?>"
                    srcset="<?= $image->srcset() ?>"
                    alt=""
                />
                <?php endforeach ?>
            </div>
        </div>
        <div class="rich-text">
            <?= $page->text()->kirbytext() ?>
            <a href="<?= url('blog') ?>">Back...</a>
        </div>
    </article>
</section>

<?php snippet('footer') ?>