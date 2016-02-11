<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-style' )
    );
}

// Custom post fields

function query_project_pages( $args, $field, $post )
{
    // Only posts with no parent
    $args['post_parent'] = 0;
    return $args;
}

add_filter('acf/fields/relationship/query/name=projects', 'query_project_pages', 10, 3);

// Custom post types

add_action( 'init', 'create_custom_post_types' );

function create_custom_post_types() {

  register_post_type( 'project_page',
    array(
      'labels' => array(
        'name' => __( 'Project Pages' ),
        'singular_name' => __( 'Project Page' )
      ),
      'public' => true,
      'hierarchical' => true,
      'supports' => array('title','editor', 'page-attributes'),
      'rewrite' => array( 'slug' => 'projects', 'with_front' => false ),
      'has_archive' => true,
    )
  );

  register_post_type( 'personal_page',
    array(
      'labels' => array(
        'name' => __( 'Personal Pages' ),
        'singular_name' => __( 'Personal Page' )
      ),
      'public' => true,
      'hierarchical' => false,
      'rewrite' => array( 'slug' => 'people', 'with_front' => false ),
      'has_archive' => true,
    )
  );

  register_post_type( 'publication',
    array(
      'labels' => array(
        'name' => __( 'Publications' ),
        'singular_name' => __( 'Publication' )
      ),
      'public' => true,
      'hierarchical' => false,
      'supports' => array('title'),
      'rewrite' => array( 'slug' => 'publications', 'with_front' => false ),
      'has_archive' => true,
    )
  );
}

// Modify post order

add_filter( 'pre_get_posts' , custom_post_order );

function custom_post_order( $query ) {
  if($query->is_post_type_archive('personal_page'))
  {
    $query->set( 'order', 'asc' );
    $query->set( 'orderby', 'title' );
  }
}


// Custom functions


function print_link($url,$text) {
  echo '<a href="' . $url . '">' . $text . "</a>";
}

function print_author($author, $last)
{
  if (get_field('status',$author) != 'Co-author') {
    print_link(get_permalink($author), get_the_title($author));
  } else {
    echo get_the_title($author);
  }
  if (!$last) { echo ", "; }
}

?>
