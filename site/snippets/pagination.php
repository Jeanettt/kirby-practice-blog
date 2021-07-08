<section class="full-bleed-layout">
    <?php if ($pagination->hasPages()): ?>
    <nav class="pagination">
        
        <?php if ($pagination->hasPrevPage()): ?>
        <a class="pagination__link pagination__link--prev" 
        href="<?= $pagination->prevPageURL() ?>"
        >
            ‹ newer posts
        </a>
        <?php endif ?>
        
        <?php if ($pagination->hasNextPage()): ?>
        <a class="pagination__link pagination__link--next" 
            href="<?= $pagination->nextPageURL() ?>"
        >
            older posts ›
        </a>
        <?php endif ?>
    </nav>
    <?php endif ?>
</section>