<?php snippet('header') ?>

<?php 

  $minWidth = 40;
  $maxWidth = 100;
  $minHeight = 40;
  $maxHeight = 130;
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
        <?php foreach($projectsColumn as $project): ?>
          <?php 
            $width = rand($minWidth,$maxWidth);
            $height = rand($minHeight,$maxHeight);
            $maxOffset = $maxWidth - $width;
            $offset = rand($minOffset,$maxOffset);
            $key = array_rand($align);
            $flexAlign = 'start';
            if ($key = 1) {
              $flexAlign = 'end';
            };
          ?>
          <div
            class="gallery-image-wrapper"
            style="display:flex;flex-direction:column;align-items:flex-<?= $flexAlign ?>">
            <div
              style="
                width:<?= $width ?>%;
                padding-bottom:<?= $height ?>%;
                margin-<?= $align[$key] ?>:<?= $offset ?>%;
                background-color:#<?= random_color() ?>">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
</main>


<?php snippet('footer') ?>
