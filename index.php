<?php get_header(); ?>

<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>

<section class="single-post">
  <div class="d-container">
    <h1 class="section-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</section>

<?php get_footer(); ?>