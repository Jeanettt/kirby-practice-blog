<?php

// main menu items
$items = $pages->listed();

// only show the menu if items are available
if($items->isNotEmpty()):

?>
<nav class="menu-bar"
  aria-label="<?= t('system.primary-menu-aria-label') ?>"
>
  <div class="menu-bar__items">
    <?php foreach ($items as $item) : ?>
    <a class="menu-bar__item <?php e($item->isOpen(), 'menu-bar__item--active') ?>"
      href="<?= $item->url() ?>"
    >
      <?= $item->title()->html() ?>
    </a>
    <?php endforeach ?>
  </div>
</nav>
<?php endif ?>