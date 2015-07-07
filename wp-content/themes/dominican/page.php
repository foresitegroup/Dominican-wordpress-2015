<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
		  if(is_home() || is_front_page()) :
		  	get_template_part( 'content', 'home' );
		  elseif
		  	(is_page('Calendar')) : get_template_part( 'content', 'calendar' );
		  else :
			  get_template_part( 'content', 'page' );
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
