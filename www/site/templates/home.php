<?php snippet('header') ?>



<div data-scroll-section>
  <?php $proj = $page->children()->listed()->shuffle(); ?>
  <?php snippet('gallery', ['proj' => $proj, 'logo' => 'true']) ?>
  <div id="about">
    <h1><?= $site->headline() ?></h1>
    <div class="grid">
      <div class="col col-2 col-right">
        <?= $site->text()->kt() ?>
      </div>
    </div>
  </div>
  <div class="featured-container">
    <h3>As Featured In</h3>
    <ul class="features" id="marquee">
      <li><?php
        $items = $site->features()->toStructure();
        $count = $items->count();
        foreach ($items as $item): ?>
        <?= $item->name() ?>
        <span>•</span>
      <?php endforeach ?></li>
    </ul>
  </div>
</div>


<?php snippet('footer') ?>
