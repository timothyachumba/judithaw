<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <?= liveCSS('assets/builds/bundle.css') ?>
  <?= css('assets/builds/locomotive-scroll.css') ?>
</head>
<body class="<?= $page->template() ?>" data-scroll-container>
