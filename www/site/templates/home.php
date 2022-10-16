<?php snippet('header') ?>

<?php 

  $minWidth = 60;
  $maxWidth = 100;
  $minOffset = 0;
  $maxOffset = $maxWidth - $minWidth;
  $align = array('left','right');
  $projects = $page->children()->listed()->shuffle();
  // $projects = $projects->chunk(ceil(count($projects)/3));
  $projectsCount = $projects->count();
  $projectsGroup1Count = ceil($projectsCount / 3);
  $projectsGroup2Count = ceil(($projectsCount - $projectsGroup1Count) / 2);
  $projectsGroup3Count = $projectsCount - ($projectsGroup1Count + $projectsGroup2Count);

  $projectsGroup1 = $projects->limit($projectsGroup1Count);
  $projectsGroup2 = $projects->offset($projectsGroup1Count)->limit($projectsGroup2Count);
  $projectsGroup3 = $projects->offset($projectsGroup1Count+$projectsGroup2Count)->limit($projectsGroup3Count);


?>


<div data-scroll-section>
  <div class="grid" id="gallery">

      <div class="col col-1" id="col-1">
        <div id="logo-container" data-scroll>
           <?php snippet('logo'); ?>
        </div>
        <?php snippet('project-group', ['projects' => $projectsGroup1]); ?>
      </div>

      <div class="col col-1">
        <?php snippet('project-group', ['projects' => $projectsGroup2]); ?>
      </div>

      <div class="col col-1">
        <?php snippet('project-group', ['projects' => $projectsGroup3]); ?>
      </div>
  </div>
  <div id="about">
    <h1><?= $site->headline() ?></h1>
    <div class="grid">
      <div class="col col-2 col-right">
        <?= $site->text()->kt() ?>
      </div>
    </div>
  </div>
</div>


<?php snippet('footer') ?>
