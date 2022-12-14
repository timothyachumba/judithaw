<?php 

  $minWidth = 70;
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
    $padding = rand(80,200);
    $key = array_rand($align);
    $flexAlign = 'start';
    if ($key = 1) {
      $flexAlign = 'end';
    };
    $field = $project->blueprint()->field('category');
    $category = $project->category()->value();
  ?>


  
  <div class="project-wrapper" style="display:flex;flex-direction:column;align-items:flex-<?= $flexAlign ?>;padding-top:<?= $padding ?>px">
      <a data-scroll href="<?= $project->url() ?>" class="project" style="width:<?= $width ?>%;margin-<?= $align[$key] ?>:<?= $offset ?>%">
          <?php if($image = $project->cover()->toFiles()->shuffle()->first()): ?>
            <div class="project-image-container" style="background-color: <?= $project->accent() ?>;--b: <?= $project->accent() ?>;">
              <img
              class="project-image lazyload"
              data-src="<?= $image->thumb(['width' => 600])->url() ?>"
              data-srcset="<?= $image->srcset([300, 600, 1200]) ?>"
              src="<?= $image->thumb(['width' => 600, 'quality' => 30])->url() ?>"
              width="<?= $image->width() ?>"
              alt=""
            >
            <noscript>
              <img
                class="project-image"
                src="<?= $image->thumb(['width' => 600])->url() ?>"
                srcset="<?= $image->srcset([300, 600, 1200]) ?>"
                alt=""
              >
            </noscript>
            </div>
          <?php endif ?>
          <div class="project-text" style="color:<?= $project->accent() ?>">
            <h3 class="project-name"><?= $project->title() ?></h3>
            <p class="project-meta">
              <span>
              <?= $field['options'][$category] ?></span>,
              <span><?= $project->client() ?></span>
            </p>
          </div>
        
      </a>
      
  </div>
<?php endforeach; ?>