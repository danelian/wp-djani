<?php get_header(); ?>

<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>

<section class="archive-block">
  <div class="d-container">
    <div class="heading">
      <h1 class="section-title"><?php post_type_archive_title(); ?></h1>
    </div>
    <?php if (have_posts()) : ?>
      <div class="blog-block__cards">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('template-parts/bcard'); ?>
        <?php endwhile; ?>
      </div>
      <?php the_posts_pagination(array(
        'prev_text'          => '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.72689 7.5231C3.42437 7.22418 3.42437 6.77581 3.72689 6.50679L9.10504 1.72418C9.44118 1.42527 9.94538 1.42527 10.2479 1.72418C10.584 1.99321 10.584 2.44158 10.2479 2.7106L5.44118 6.98505L10.2479 11.2894C10.584 11.5584 10.584 12.0068 10.2479 12.2758C9.94538 12.5747 9.44118 12.5747 9.13866 12.2758L3.72689 7.5231Z" fill="currentColor"/></svg>',
        'next_text'          => '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.2731 6.4769C10.5756 6.77582 10.5756 7.22419 10.2731 7.49321L4.89496 12.2758C4.55882 12.5747 4.05462 12.5747 3.7521 12.2758C3.41597 12.0068 3.41597 11.5584 3.7521 11.2894L8.55882 7.01495L3.7521 2.7106C3.41597 2.44158 3.41597 1.99321 3.7521 1.72418C4.05462 1.42527 4.55882 1.42527 4.86134 1.72418L10.2731 6.4769Z" fill="currentColor"/></svg>',
      )); ?>
    <?php else : ?>
      <p><?php 'Нет записей.' ?></p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>