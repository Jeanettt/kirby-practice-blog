<?php snippet('header') ?>

<section class="simple-layout simple-layout--box">
    <div class="simple-layout__body">
        <div class="simple-layout__main">
            <h1><?= $page->title()->html() ?></h1>
            <?= $page->text()->kirbytext() ?>
            <section class="collection collection--grid">
                <div class="collection__items">
                    <?php
                        $articles = $page->children()->listed()->flip()->paginate(4); 
                        foreach($articles as $article): ?>
                    <article class="collection__item">
                        <a class="card card--square-media
                                <?php if (($articles->indexOf($article) % 4) == 0): ?>
                                    card--blue
                                <?php elseif ($articles->indexOf($article) == 1 or ($articles->indexOf($article) % 5) == 0): ?>
                                    card--green
                                <?php elseif ($articles->indexOf($article) == 2 or ($articles->indexOf($article) % 6) == 0): ?>
                                    card--orange
                                <?php elseif ($articles->indexOf($article) == 3 or ($articles->indexOf($article) % 7) == 0): ?>
                                    card--magenta
                                <?php endif; ?>
                            "
                            href="<?= $article->url() ?>"
                        >
                            <div class="card__areas">
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
                                <div class="card__text-area">
                                    <h3 class="card__title">
                                        <?= $article->title()->html() ?>
                                    </h3>
                                    <?php if ($article->intro()->isNotEmpty()): ?>
                                        <p class="card__subtitle">
                                            <?= $article->intro()->kirbytext() ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="card__action-area">
                                    <div class="button button--elevated">
                                        Read more...
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php endforeach ?>
                    <?php if ($articles->pagination()->hasPages()): ?>
                    <nav class="pagination">

                    <?php if ($articles->pagination()->hasPrevPage()): ?>
                    <a class="next" href="<?= $articles->pagination()->prevPageURL() ?>">
                        ‹ older posts
                    </a>
                    <?php endif ?>

                    <?php if ($articles->pagination()->hasNextPage()): ?>
                    <a class="prev" href="<?= $articles->pagination()->nextPageURL() ?>">
                        newer posts ›
                    </a>
                    <?php endif ?>

                    </nav>
                    <?php endif ?>
                </div>
            </section>
        </div>
    </div>
</section>

<?php snippet('footer') ?>

/////////////////
<!-- <div class="simple-layout__main">
    <section class="collection collection--grid">
        <div class="collection__items">
            <?php
                $items = $page->children()->listed();
                foreach($items as $item):
            ?>
                <article class="collection__item"
                    aria-label="<?= $item->content()->title() ?>"
                >
                    <a class="card card--square-media
                            <?php if (($items->indexOf($item) % 4) == 0): ?>
                                card--blue
                            <?php elseif ($items->indexOf($item) == 1 or ($items->indexOf($item) % 5) == 0): ?>
                                card--green
                            <?php elseif ($items->indexOf($item) == 2 or ($items->indexOf($item) % 6) == 0): ?>
                                card--orange
                            <?php elseif ($items->indexOf($item) == 3 or ($items->indexOf($item) % 7) == 0): ?>
                                card--magenta
                            <?php endif; ?>
                        "
                        href="<?= $item->url() ?>"
                    >
                        <div class="card__areas">
                            <?php if($image = $item->content()->images()->first()->toFile()): ?>
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
                            <div class="card__text-area">
                                <h3 class="card__title">
                                    <?= $item->content()->title()->kirbytextInline() ?>
                                </h3>
                                <?php if ($item->content()->subtitle()->isNotEmpty()): ?>
                                    <p class="card__subtitle">
                                        <?= $item->content()->subtitle()->kirbytextInline() ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="card__action-area">
                                <div class="button button--elevated">
                                    <?= $item->content()->cardActionTitle()->or(t('global.read-more-action')) ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
            <?php endforeach ?>
        </div>
    </section>
</div> -->
