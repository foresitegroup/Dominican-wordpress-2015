<div id="wrapper-top">
  <div class="container">
    <?php the_breadcrumb(); ?>
    <?php the_title( '<h2>', '</h2>' ); ?>
  </div>
</div>

<div class="container">
	<div id="main-content">
		<?php the_content(); ?>
	</div>

	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>

	<div style="clear: both;"></div>
</div>