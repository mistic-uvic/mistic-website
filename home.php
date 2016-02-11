<?php

get_header(); // Loads the header.php template. ?>

  <?php do_atomic( 'before_content' ); // oxygen_before_content ?>

  <div class="content-wrap" id="index">

    <div id="content">

      <?php //do_atomic( 'open_content' ); // oxygen_open_content ?>

      <?php get_template_part( 'featured-content' ); // Loads the featured-content.php template. ?>

      <?php do_atomic( 'close_content' ); // oxygen_close_content ?>

      <?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

    </div><!-- #content -->

    <?php do_atomic( 'after_content' ); // oxygen_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>
