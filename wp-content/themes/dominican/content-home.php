<?php if( function_exists('cyclone_slider') ) cyclone_slider('homepage'); ?>

<div class="container">
  <div class="services">
    <a href="admissions" data-sr="enter left ease-in-out 100px over 0.7s"><i class="home-icon fa fa-list-alt fa-3x"></i></a>
    <h4>Admissions</h4>
    <hr>
  </div>

  <div class="services">
    <a href="student-life" data-sr="enter left ease-in-out 100px over 0.7s"><i class="home-icon fa fa-users fa-3x"></i></a>
    <h4>Students</h4>
    <hr>
  </div>

  <div class="services">
    <a href="current-families/parent-involvement/" data-sr="enter left ease-in-out 100px over 0.7s"><i class="home-icon fa fa-shield fa-3x"></i></a>
    <h4>Parents</h4>
    <hr>
  </div>

  <div class="services">
    <a href="alumni-friends" data-sr="enter left ease-in-out 100px over 0.7s"><i class="home-icon fa fa-heart fa-3x"></i></a>
    <h4>Alumni &amp; Friends</h4>
    <hr>
  </div>

  <div style="clear: both;"></div>

  <div id="mini-cal">
    <?php if ( !dynamic_sidebar('home-mini-cal-sidebar') ) : endif; ?>
    <br>
    <a href="calendar" class="button">View our full calendar</a>
  </div>

  <div id="tickler">
    <h3 class="title">News &amp; Events</h3>
    <?php
    $tickler_query = new WP_Query('category_name=news&posts_per_page=3');
    if ($tickler_query->have_posts()) {
      while ($tickler_query->have_posts()) {
        $tickler_query->the_post();
        echo "<a href=\"" . get_permalink() . "\" class=\"post-title\">" . get_the_title() . "</a>";
        echo "<p>" . excerpt(31) . "</p>";
      }
    }
    wp_reset_postdata();
    ?>
    <div style="height: 1em;"></div>
    <a href="category/news" class="button">View all News &amp; Events</a>
  </div>

  <div style="clear: both;"></div>

  <h3 class="title">Connect With Us</h3>
  <a href="http://www.facebook.com/pages/Dominican-High-School/98957304619" data-sr="enter left ease-in-out 100px over 0.7s"><i class="home-icon fa fa-facebook fa-3x"></i></a>
  <a href="http://twitter.com/DominicanHS" data-sr="enter left ease-in-out 100px over 0.7s"><i class="home-icon fa fa-twitter fa-3x"></i></a>
  <a href="https://www.youtube.com/user/dhsknightlynewsdocom" data-sr="enter left ease-in-out 100px over 0.7s"><i class="home-icon fa fa-youtube fa-3x"></i></a>
</div>

<div id="spiffs">
  <div class="container">
    <?php the_content(); ?>
  </div>
</div>