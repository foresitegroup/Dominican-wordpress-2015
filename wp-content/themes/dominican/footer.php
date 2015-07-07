
<div id="footer">
  <div class="container">
    <?php if ( !dynamic_sidebar('footer-sidebar') ) : endif; ?>

    <div style="clear: both;"></div>
  </div>
</div>

<div id="footer-lower">
  <div class="container">
    &copy; <?php echo date("Y"); ?> Dominican High School
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>