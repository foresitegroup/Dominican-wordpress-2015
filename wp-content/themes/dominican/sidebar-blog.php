<?php
echo "<div class=\"blog-sidebar\">\n";
if ( !dynamic_sidebar('blog-sidebar') ) : endif;
echo "</div><br>\n";

if ( !dynamic_sidebar('subpage-sidebar') ) : endif;
?>