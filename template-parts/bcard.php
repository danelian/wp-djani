<a href="<?php the_permalink(); ?>" class="bcard">
  <img src="<?php the_post_thumbnail_url(); ?>" class="bcard__image" alt="<?php the_title(); ?>">
  <h2><?php the_title(); ?></h2>
  <?php the_excerpt(); ?>
  <div class="button-primary">Узнать подробнее</div>
</a>