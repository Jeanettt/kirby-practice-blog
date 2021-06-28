</main><!-- /page__main -->
<footer class="page__footer">
    <?php snippet(
        ['components/navigation-bar'],
        ['modifiers' => 'navigation-bar--page-footer']
    ) ?>
    <div class="simple-layout simple-layout--dark-mode">
        <div class="simple-layout__body">
            <div class="simple-layout__main">
                <div class="columns">
                    <div class="columns__items">
                        <div class="columns__item columns__item--three-quarters">
                            <?php snippet('page-footer/stores') ?>
                        </div>
                        <div class="columns__item columns__item--one-quarter">
                            <?php snippet('page-footer/secondary-menu') ?>
                            <div class="spacer">
                            </div>
                            <?php snippet('page-footer/contact') ?>
                            <div class="spacer">
                            </div>
                            <?php snippet('page-footer/social-menu') ?>
                        </div>
                    </div>
                </div>
                <div class="spacer spacer--loose">
                </div>
                <?php snippet('page-footer/legal-menu') ?>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
