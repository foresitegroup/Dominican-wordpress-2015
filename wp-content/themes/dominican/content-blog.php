<div class="blog-entry">
  <?php the_title( '<h2>', '</h2>' ); ?>

  <div class="blog-date"><?php echo get_the_date(); ?></div> 

  <?php if( is_singular() ) the_content();
  else the_excerpt(); ?>

  <?php if( !is_singular() ): ?>
    <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><em><?php _e('read more', SH_NAME); ?></em></a>
  <?php endif; ?>
</div>