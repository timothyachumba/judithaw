<?php snippet('header') ?>

<?php 
  $title = $page->title();
  
  if ($page->vanitytitle()->isEmpty()) {
    $title = $title;
  } else {
    $title = $page->vanitytitle();
  }
?>

<main>

  
  
  <div id="header">
    <a href="<?= $site->url() ?>"><?php snippet('logo') ?></a>

    <h1 class="fit" style="color: <?= $page->accent() ?>"><?= $title ?></h1>
     <?php if($image = $page->cover()->toFiles()->first()): ?>
    <div class="image" style="background-image: url('<?= $image->focusCrop(2000)->url() ?>')"></div>
    <?php endif ?>
  </div>

  <div id="intro" class="grid">
    <div class="col col-1"></div>
    <div class="col col-2 intro-text">
      <?= $page->intro()->kt() ?>
    </div>
  </div>

  <?php foreach ($page->casestudy()->toLayouts() as $layout): ?>
  <section class="layout" id="<?= $layout->id() ?>">
    <?php foreach ($layout->columns() as $column): ?>
    <div class="column col-<?= $column->span() ?>">
      <div class="blocks">
        <?= $column->blocks() ?>
      </div>
    </div>
    <?php endforeach ?>
  </section>
  <?php endforeach ?>

</main>

<?php snippet('footer') ?>
