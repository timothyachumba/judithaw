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

  
  
  <div data-scroll-section id="header">
    <a data-scroll data-scroll-sticky  href="<?= $site->url() ?>"><?php snippet('logo') ?></a>

    <h1 data-scroll class="fit" style="color: <?= $page->accent() ?>"><?= $title ?></h1>
     <?php if($image = $page->cover()->toFiles()->first()): ?>
    <div class="image-container">
      <div data-scroll data-scroll-speed="-1" class="image" style="background-image: url('<?= $image->focusCrop(2000)->url() ?>')"></div>
    </div>
    <?php endif ?>
  </div>

  <div data-scroll-section id="intro" class="grid">
    <div data-scroll class="col col-1 meta-data">
      <div class="meta-data-section">
        <ul>
          <?php if(!$page->link()->isEmpty()): ?>
          <li>
            <span>Project Link</span>
            <a target="_blank"href="<?= $page->link() ?>"><?= parse_url($page->link())["host"] ?></a>
          </li>
          <?php endif ?>
          <?php if(!$page->client()->isEmpty()): ?>
          <li><span>Client</span><?= $page->client() ?></li>
          <?php endif ?>
          <?php if(!$page->category()->isEmpty()): ?>
          <li><span>Category</span><?= $page->category() ?></li>
          <?php endif ?>
          <?php
            $items = $page->credits()->toStructure();
            foreach ($items as $item): ?>
            <li><span><?= $item->role() ?></span><?= $item->name() ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>
    <div data-scroll class="col col-2 intro-text">
      <?= $page->intro()->kt() ?>
    </div>
  </div>

  <?php foreach ($page->casestudy()->toLayouts() as $layout): ?>
  <section data-scroll-section class="layout" id="<?= $layout->id() ?>">
    <?php foreach ($layout->columns() as $column): ?>
    <div data-scroll class="column col-<?= $column->span() ?>">
      <div data-scroll class="blocks">
        <?= $column->blocks() ?>
      </div>
    </div>
    <?php endforeach ?>
  </section>
  <?php endforeach ?>
  <section data-scroll-section class="projects-gallery">
    <h3>More Projects</h3>
  <?php $proj = $pages->find('home')->children()->listed()->not($page->uri())->shuffle(); ?>
  <?php snippet('gallery', ['proj' => $proj,'logo' => 'false']) ?>
  </section>

</main>

<?php snippet('footer') ?>
