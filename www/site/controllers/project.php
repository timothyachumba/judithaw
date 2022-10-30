<?php

return function ($pages) {

  // get all projects
  $projects = $pages->find('home')->children()->listed();

  // fetch all tags
  $categories = $projects->pluck('category', ',', true);

  // add a tag filter
  if ($category = param('category')) {
    $projects = $projects->filterBy('category', $category, ',');
  }


  // pass $articles and $pagination to the template
  return compact('projects','categories','category');

};