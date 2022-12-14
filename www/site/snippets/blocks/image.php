<?php

/** @var \Kirby\Cms\Block $block */
$alt     = $block->alt();
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$link    = $block->link();
$ratio   = $block->ratio()->or('auto');
$src     = null;

if ($block->location() == 'web') {
    $src = $block->src()->esc();
} elseif ($image = $block->image()->toFile()) {
    $alt = $alt ?? $image->alt();
    $src = $image->url();
}

?>
<?php if ($src): ?>
<figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
  <?php if ($link->isNotEmpty()): ?>
  <a href="<?= Str::esc($link->toUrl()) ?>">
    <img
        class="gallery-image"
        src="<?= $image->thumb(['width' => 600])->url() ?>"
        srcset="<?= $image->srcset([300, 600, 1200]) ?>"
        alt="<?= $alt ?>"
      >
  </a>
  <?php else: ?>
    <img
        class="gallery-image"
        src="<?= $image->thumb(['width' => 600])->url() ?>"
        srcset="<?= $image->srcset([300, 600, 1200]) ?>"
        alt="<?= $alt ?>"
      >
  <?php endif ?>

  <?php if ($caption->isNotEmpty()): ?>
  <figcaption>
    <?= $caption ?>
  </figcaption>
  <?php endif ?>
</figure>
<?php endif ?>