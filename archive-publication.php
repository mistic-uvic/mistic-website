<?php
/**
 * Archive Template
 *
 * The archive template is the default template used for archives pages without a more specific template. 
 *
 * @package Oxygen
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
		<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
	
	</div>
	
	<div class="content-wrap">
		
		<?php do_atomic( 'before_content' ); // oxygen_before_content ?>

		<div id="content">
	
			<?php do_atomic( 'open_content' ); // oxygen_open_content ?>
	
			<div class="hfeed">

				<?php if ( have_posts() ) : ?>
	
          <?php
            $types = array(
              'book' => 'Books',
              'doctor-thesis' => 'Doctoral Thesis',
              'master-thesis' => 'Masters Thesis',
              'book-chapter' => 'Book Chapters',
              'journal-article' => 'Journal Articles',
              'conference-article' => 'Conference Articles',
              'patent' => 'Patent',
            );
            foreach($types as $key => $label):
              query_posts("post_type=publication&meta_key=type&meta_value=" . $key);
              if (have_posts())
                echo "<h3>" . $label . "</h3>";
          ?>

            <?php while ( have_posts() ) : the_post(); ?>

              <?php do_atomic( 'before_entry' ); // oxygen_before_entry ?>

              <div class="publication">

                <?php do_atomic( 'open_entry' ); // oxygen_open_entry ?>

                  <?php get_template_part('publication', null); ?>

                <?php do_atomic( 'close_entry' ); // oxygen_close_entry ?>

              </div><!-- .hentry -->

              <?php do_atomic( 'after_entry' ); // oxygen_after_entry ?>

            <?php endwhile; ?>
	
          <?php endforeach; ?>

				<?php else : ?>
	
					<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // oxygen_close_content ?>
	
			<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>
	
		</div><!-- #content -->
	
		<?php do_atomic( 'after_content' ); // oxygen_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>
