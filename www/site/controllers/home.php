<?php

return function ($page) {

  // get all projects
  $projects = $page->children()->listed();

  // fetch all tags
  $categories = $projects->pluck('category', ',', true);

  // add a tag filter
  if ($category = param('category')) {
    $projects = $projects->filterBy('category', $category, ',');
  }


  // pass $articles and $pagination to the template
  return compact('projects','categories','category');

};