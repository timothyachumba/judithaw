<?php
/** @var \Kirby\Cms\Block $block */
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$ratio   = $block->ratio()->or('auto');
?>
<div id="scroll-direction">
  <div id="scroll-direction-wrapper">
  <figure data-scroll data-scroll-sticky data-scroll-target="#scroll-direction" id="horizontal-gallery" <?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
    <ul class="horizontal-gallery" data-scroll data-scroll-direction="horizontal" data-scroll-target="#scroll-direction" data-scroll-speed="10">
      <?php foreach ($block->images()->toFiles() as $image): ?>
      <li>
        <?= $image ?>
      </li>
      <?php endforeach ?>
    </ul>
    <?php if ($caption->isNotEmpty()): ?>
    <figcaption>
      <?= $caption ?>
    </figcaption>
    <?php endif ?>
  </figure>
  </div>
</div>