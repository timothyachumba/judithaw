  <?php

  $projects = $proj->shuffle();

  $minWidth = 60;
  $maxWidth = 100;
  $minOffset = 0;
  $maxOffset = $maxWidth - $minWidth;
  $align = array('left','right');
  $projectsCount = $projects->count();
  $projectsGroup1Count = ceil($projectsCount / 2);
  $projectsGroup2Count = ceil(($projectsCount - $projectsGroup1Count));
  $projectsGroup3Count = $projectsCount - ($projectsGroup1Count + $projectsGroup2Count);

  $projectsGroup1 = $projects->limit($projectsGroup1Count);
  $projectsGroup2 = $projects->offset($projectsGroup1Count)->limit($projectsGroup2Count);
  $projectsGroup3 = $projects->offset($projectsGroup1Count+$projectsGroup2Count)->limit($projectsGroup3Count);

  

?>

  <div class="grid" id="gallery">

    <div class="col col-1" id="col-1">
     <div class="main-sidebar" data-scroll data-scroll-sticky data-scroll-target="#gallery">
      <a href="<?= $site->url() ?>"><?php snippet('logo'); ?></a>
      <ul class="category-navigation">
        <?php
          $current = kirby()->request()->params()->category();
          $field = $pages->find('home')->children()->first()->blueprint()->field('category');
          foreach($categories as $category): ?>
          <li><a <?php if($current == $category) {echo 'class="active"';} ?> href="<?= url($site->url(), ['params' => ['category' => $category]]) ?>"><?= $field['options'][$category] ?? html($category) ?> <?php if($current == $category) {echo '<span style="vertical-align:super;font-size:small;">'.$page->children()->listed()->filterBy('category',$category)->count().'</span>';} ?></a></li>
        <?php endforeach ?>
      </ul>
     </div>
    </div>
  
    
    <div class="col col-1" id="col-1">
     
      <?php snippet('project-group', ['projects' => $projectsGroup1]); ?>
    </div>

    <div class="col col-1">
      <?php snippet('project-group', ['projects' => $projectsGroup2]); ?>
    </div>

    <!-- <div class="col col-1">
      <?php snippet('project-group', ['projects' => $projectsGroup3]); ?>
    </div>
     -->
  </div>