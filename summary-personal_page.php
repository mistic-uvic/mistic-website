

<?php do_atomic( 'open_entry' ); // oxygen_open_entry ?>

<div class="post-summary">

  <?php
    $image = get_field('picture');
    if($image)
    {
      $thumb = $image['sizes']['thumbnail'];
  ?>
      <img src="<?php echo $thumb; ?>"/>
  <?php } else { ?>
      <div class="post-thumbnail-dummy">
      </div>
  <?php } ?>

  <div class="post-summary-text">

    <h2 class="post-title">
      <a href="<?php echo get_permalink() ?>"><?php echo the_title(); ?></a>
    </h2>

    <ul>
    <li><?php echo get_field('role') . ', ' . get_field('departments')?></li>
    <li><i>Research areas:</i> <?php echo get_field('research_areas')?></li>
    <li><i>Projects:</i>
        <?php
        $projects = get_field('projects');
        foreach($projects as $project){
            echo ' <a href="' . get_permalink($project) .'">'
              . get_the_title($project) . '</a>';
        }
        ?>
    </li>
    </ul>

  </div>

</div>

<?php do_atomic( 'close_entry' ); // oxygen_close_entry ?>

