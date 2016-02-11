
<h4><?php
  $file = get_field('file');
  if ($file != null)
    print_link($file,get_the_title());
  else
    the_title();
?></h4>

<p>
<?php

  $type = get_field('type');

  $authors = get_field('authors');
  $num_authors = count($authors);
  foreach (array_slice($authors,0,$num_authors-1) as $author) {
    print_author($author, false);
  }
  print_author($authors[$num_authors-1], true);

  echo ". ";

  $collection = get_field('collection');
  if ($collection)
  {
    echo "in <i>" . $collection . "</i>";
  }

  if ($type == 'Conference Article')
  {

    echo  " (" . get_field('conference-location')
              . ", " . get_field('conference-year') . ")";
  }

  if ($type == 'Journal Article')
  {
    $volume = get_field('journal-volume');
    $issue = get_field('journal-issue');
    if ($volume || $issue)
      echo ',';
    if ($volume)
      echo ' <i>' . $volume . '</i>';
    if ($issue)
      echo ' (' . $issue . ')';
  }

  $publisher = get_field('publisher');
  if ($publisher)
  {
    $city = get_field('publication-city');
    $year = get_field('publication-year');
    echo ', ' . $publisher;
    if ($city)
      echo ', ' . $city;
    if ($year)
      echo ', ' . $year;
  }

  $pages = get_field('pages');
  if ($pages)
    echo ', ' . $pages;

  echo '.';
?>
</p>
