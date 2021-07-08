<section class="collection collection--grid">
    <div class="collection__items">
        <?php foreach($articles as $article): ?>
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
    <div class="collection__pagination">
        <?php snippet('pagination', [
            'pagination' => $articles->pagination()
        ]) ?>
    </div>
</section>