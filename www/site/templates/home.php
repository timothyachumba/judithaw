<?php snippet('header') ?>

<?php 

  $minWidth = 50;
  $maxWidth = 100;
  $minHeight = 80;
  $maxHeight = 150;
  $minOffset = 0;
  $maxOffset = $maxWidth - $minWidth;
  $align = array('left','right');
  
  $projects = range(1,20);
  $projects = array_chunk($projects, (ceil(count($projects)/3)));

  function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
  }

  function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
  }

?>


<main>
  <div class="grid" id="gallery">
    <?php foreach($projects as $key => $projectsColumn): ?>
      <div class="col col-1">
        <?php
            if ($key === array_key_first($projects)) {
              snippet('logo');
            }
        ?>
        <?php foreach($projectsColumn as $project): ?>
          <?php 
            $width = rand($minWidth,$maxWidth);
            $height = rand($minHeight,$maxHeight);
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
              <div
                class="project"style="width:<?= $width ?>%;margin-<?= $align[$key] ?>:<?= $offset ?>%">
                  <div class="project-image"style="padding-bottom:<?= $height ?>%;;background-color:#<?= random_color() ?>">
                  </div>
                  <div class="project-text">
                    <h3 class="project-name">Project name</h3>
                    <p class="project-meta"><span>Project Cateogry</span>, <span>Client</span></p>
                  </div>
                
              </div>
              
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
</main>


<?php snippet('footer') ?>
