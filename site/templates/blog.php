<?php snippet('header') ?>

<section class="simple-layout">
    <div class="simple-layout__body">
        <div class="simple-layout__main">
            <h1><?= $page->title()->html() ?></h1>
            <section class="collection collection--grid">
                <div class="collection__items">
                    <?php
                        $articles = $page->children()->listed()->flip()->paginate(3); 
                        foreach($articles as $article): ?>
                    <article class="collection__item">
                        <a class="card"
                            href="<?= $article->url() ?>"
                        >
                            <div class="card__areas">
                                <div class="card__text-area">
                                    <h3 class="card__title">
                                        <?= $article->title()->html() ?>
                                    </h3>
                                </div>
                                <?php if($image = $article->content()->images()->first()->toFile()): ?>
                                <div class="card__media-area">
                                    <img class="card__image"
                                        width="300"
                                        height="300"
                                        sizes="
                                            (max-width: 332px) calc(100vw - 39px),
                                            (min-width: 333px) and (max-width: 518px) calc(100vw - 52px),
                                            (min-width: 519px) and (max-width: 663px) calc(100vw - 78px),
                                            (min-width: 664px) and (max-width: 703px) calc((100vw - 104px) * 1/2),
                                            (min-width: 704px) and (max-width: 1021px) calc((100vw - 52px * 2 - 39px) * 1/2),
                                            (min-width: 1022px) and (max-width: 1047px) calc((100vw - 52px * 2 - 39px * 2) * 1/3),
                                            (min-width: 1048px) 290px
                                        "
                                        src="<?= $image->crop(300, 300, 80)->url(); ?>"
                                        srcset="
                                            <?= $image->crop(290, 290, 80)->url(); ?> 290w,
                                            <?= $image->crop(580, 580, 70)->url(); ?> 580w,
                                            <?= $image->srcset('square'); ?>
                                        "
                                        alt="<?= $image->alt(); ?>"
                                        loading="lazy"
                                    >
                                </div>
                                <?php endif; ?>
                                <div class="card__action-area">
                                    <?= @svg('assets/images/icons/chevron-right.svg') ?>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php endforeach ?>
                </div>
            </section>
            <section class="full-bleed-layout">
                <?php if ($articles->pagination()->hasPages()): ?>
                <nav class="pagination">
                    
                    <?php if ($articles->pagination()->hasPrevPage()): ?>
                    <a class="pagination__link pagination__link--prev" 
                    href="<?= $articles->pagination()->prevPageURL() ?>"
                    >
                        ‹ newer posts
                    </a>
                    <?php endif ?>
                    
                    <?php if ($articles->pagination()->hasNextPage()): ?>
                    <a class="pagination__link pagination__link--next" 
                        href="<?= $articles->pagination()->nextPageURL() ?>"
                    >
                        older posts ›
                    </a>
                    <?php endif ?>

                </nav>
                <?php endif ?>
            </section>
        </div>
    </div>
</section>

<?php snippet('footer') ?>