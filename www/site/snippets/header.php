<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <?= liveCSS('assets/builds/bundle.css') ?>
  
  <link rel="canonical" href="<?php echo $site->url() ?>" />
  <meta property="og:title" content="<?= $site->title()->html() ?> — <?= $page->title()->html() ?>" />
  <meta property="og:url" content="<?php echo $page->url() ?>" />
  <meta property="og:site_name" content="<?php echo $site->title() ?>" />
  

  <?php if($page->parent('home')):?>
    
    <meta name="description" content="<?php echo strip_tags($page->intro()->excerpt(140)) ?>">
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?php echo strip_tags($page->intro()->excerpt(140)) ?>" />
    <meta property="og:image" content="<?php echo $page->images()->first()->url() ?>" />
  <?php else: ?>
    <meta name="description" content="<?php echo $site->description() ?>">
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?php echo $site->headline() ?>" />
    <meta property="og:image" content="<?php echo $pages->children()->first()->images()->first()->url() ?>" />
  <?php endif ?>

</head>
<body class="<?= $page->template() ?>" data-scroll-container>
