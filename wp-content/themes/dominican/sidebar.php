<?php
wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
echo "<br>";

if ( !dynamic_sidebar('subpage-sidebar') ) : endif;
?>