<a href="<?php the_permalink(); ?>" class="ncard">
  <div class="ncard__image" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
  <div class="ncard__content">
    <h2><?php the_title(); ?></h2>
    <?php the_excerpt(); ?>
    <div class="date"><?php echo get_the_date('d.m.Y'); ?></div>
  </div>
</a>