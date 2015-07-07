<?php

function new_excerpt_more( $more ) {
  return '....';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'....';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

//* Remove the default galley style.
add_filter( 'use_default_gallery_style', '__return_false' );

// Load custom javascript
add_action( 'wp_enqueue_scripts', 'add_my_script' );
function add_my_script() {
  wp_enqueue_script(
    'scrollReveal.min', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/inc/scrollReveal.min.js', // this is the location of your script file
    array('jquery') // this array lists the scripts upon which your script depends
  );

  wp_enqueue_script(
    'doubletaptogo.min', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/inc/doubletaptogo.min.js', // this is the location of your script file
    array('jquery') // this array lists the scripts upon which your script depends
  );

  wp_enqueue_script(
    'dhs-scripts', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/inc/dhs-scripts.js', // this is the location of your script file
    array('jquery') // this array lists the scripts upon which your script depends
  );
}

// Define menus
function register_my_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Add breadcrumbs
function the_breadcrumb () {
  // Settings
  $separator  = '/';
  $id         = 'breadcrumbs';
  $class      = 'breadcrumbs';
  $home_title = 'Home';
   
  // Get the query & post information
  global $post,$wp_query;
  $category = get_the_category();
   
  // Build the breadcrums
  echo '<ul id="' . $id . '" class="' . $class . '">';
   
  // Do not display on the homepage
  if ( !is_front_page() ) {
      // Home page
      echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
      echo '<li class="separator separator-home"> ' . $separator . ' </li>';
       
      if ( is_single() ) {
          // Single post (Only display the first category)
          echo '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
          echo '<li class="separator separator-' . $category[0]->term_id . '"> ' . $separator . ' </li>';
          echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
      } else if ( is_category() ) {
          // Category page
          echo '<li class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><span class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . $category[0]->cat_name . '</span></li>';
      } else if ( is_page() ) {
          // Standard page
          if( $post->post_parent ){
              // If child page, get parents 
              $anc = get_post_ancestors( $post->ID );
               
              // Get parents in the right order
              $anc = array_reverse($anc);
               
              // Parent page loop
              foreach ( $anc as $ancestor ) {
                  $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                  $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
              }
               
              // Display parent pages
              echo $parents;
               
              // Current page
              echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';
          } else {
              // Just display current page if not parents
              echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';
          }
      } else if ( is_tag() ) {
          // Tag page
          // Get tag information
          $term_id = get_query_var('tag_id');
          $taxonomy = 'post_tag';
          $args ='include=' . $term_id;
          $terms = get_terms( $taxonomy, $args );
           
          // Display the tag name
          echo '<li class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><span class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</span></li>';
      } elseif ( is_day() ) {
          // Day archive
          // Year link
          echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
          echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
           
          // Month link
          echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
          echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
           
          // Day display
          echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';
      } else if ( is_month() ) {
          // Month Archive
          // Year link
          echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
          echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
           
          // Month display
          echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';
      } else if ( is_year() ) {
          // Display year archive
          echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';
      } else if ( is_author() ) {
          // Auhor archive
          // Get the author information
          global $author;
          $userdata = get_userdata( $author );
           
          // Display author name
          echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';
      } else if ( get_query_var('paged') ) {
          // Paginated archives
          echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></li>';
      } else if ( is_search() ) {
          // Search results page
          echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</span></li>';
      } elseif ( is_404() ) {
          // 404 page
          echo '<li>' . 'Error 404' . '</li>';
      }
  }
  echo '</ul>';
}

// Sidebars
if ( function_exists('register_sidebar') ) {
  register_sidebar(array(
    'name' => 'Subpage Sidebar',
    'id' => 'subpage-sidebar',
    'description' => 'Appears as the sidebar on the subpages',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
  ));
  register_sidebar(array(
    'name' => 'Blog Sidebar',
    'id' => 'blog-sidebar',
    'description' => 'Appears as the sidebar on the blog subpages',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));
  register_sidebar(array(
    'name' => 'Footer Widgets',
    'id' => 'footer-sidebar',
    'description' => 'Appears in the footer',
    'before_widget' => '<div class="footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
  ));
  register_sidebar(array(
    'name' => 'Home Page Mini-Calendar Widget',
    'id' => 'home-mini-cal-sidebar',
    'description' => 'Appears on the home page',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3 class="title">',
    'after_title' => '</h3>',
  ));
}

// Fix up google maps request in non-https mode
add_filter('http_external_url', 'my_http_external_url');
function my_http_external_url ($url) {
  if (preg_match('/www\.google\.com\/maps\//i', $url)) {
    $url = str_replace('http://', 'https://', $url);
  }

  return $url;
}

?>