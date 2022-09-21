<?php 

  $minWidth = 60;
  $maxWidth = 100;
  $minOffset = 0;
  $maxOffset = $maxWidth - $minWidth;
  $align = array('left','right');
?>

<?php foreach($projects as $project): ?>
  <?php 
    $width = rand($minWidth,$maxWidth);
    $maxOffset = $maxWidth - $width;
    $offset = rand($minOffset,$maxOffset);
    $padding = rand(80,400);
    $key = array_rand($align);
    $flexAlign = 'start';
    if ($key = 1) {
      $flexAlign = 'end';
    };
  ?>
  
  <div class="project-wrapper" style="display:flex;flex-direction:column;align-items:flex-<?= $flexAlign ?>;padding-top:<?= $padding ?>px">
      <a href="<?= $project->url() ?>" class="project"style="width:<?= $width ?>%;margin-<?= $align[$key] ?>:<?= $offset ?>%">
          <?php if($image = $project->cover()->toFile()): ?>
            <div class="project-image-container" style="background-color: <?= $project->accent() ?>">
              <img
              class="project-image lazyload"
              data-src="<?= $image->thumb(['width' => 1200])->url() ?>"
              data-srcset="<?= $image->srcset([800, 1200, 1600]) ?>"
              src="<?= $image->thumb(['width' => 1200, 'quality' => 30])->url() ?>"
              width="<?= $image->width() ?>"
              alt=""
            >
            <noscript>
              <img
                class="project-image"
                src="<?= $image->thumb(['width' => 1200])->url() ?>"
                srcset="<?= $image->srcset([800, 1200, 1600]) ?>"
                alt=""
              >
            </noscript>
            </div>
          <?php endif ?>
          <div class="project-text" style="color:<?= $project->accent() ?>">
            <h3 class="project-name"><?= $project->title() ?></h3>
            <p class="project-meta"><span><?= $project->category() ?></span>, <span><?= $project->client() ?></span></p>
          </div>
        
      </a>
      
  </div>
<?php endforeach; ?>