<a href="<?php the_permalink(); ?>" class="ncard-l">
  <div class="ncard-l__content">
    <h2><?php the_title(); ?></h2>
    <?php the_excerpt(); ?>
    <div class="date"><?php echo get_the_date('d.m.Y'); ?></div>
  </div>
  <div class="ncard-l__image" style="background-image: url('<?php the_post_thumbnail_url(); ?>);"></div>
</a>