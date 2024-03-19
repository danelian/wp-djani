<a href="<?php the_permalink(); ?>" class="acard">
  <img src="<?php the_post_thumbnail_url(); ?>" class="acard__image" alt="<?php the_title(); ?>">
  <div class="acard__content">
    <h2><?php the_title(); ?></h2>
    <?php the_excerpt(); ?>
    <div class="date"><?php echo get_the_date('d.m.Y'); ?></div>
  </div>
</a>