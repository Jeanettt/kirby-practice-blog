<?php snippet('header') ?>
<section class="simple-layout">
    <div class="simple-layout__body">
        <header class="simple-layout__header">
            <div class="heading-group">
                <!-- <h1 class="heading-group__headline"><?= $page->title() ?></h1> -->
            </div>
        </header>
        <div class="simple-layout__main">
            <div class="rich-text rich-text--centered">
                <h2>Dummy text</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="simple-layout simple-layout--centered-text simple-layout--max-narrow-width">
    <div class="simple-layout__body">
        <div class="simple-layout__header">
            <h2>Laatste blogs</h2>
        </div>
        <div class="simple-layout__main">
            <?php snippet('blog-collection', [
                'articles' => collection('blog-collection')
                    ->flip()
                    ->limit(4)
            ]) ?>
        </div>
    </div>
</section>
<?php snippet('footer') ?>