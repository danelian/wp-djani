<?php get_header(); ?>

<?php
$hero_slides = get_field('hero_slides');
if ($hero_slides) {
  foreach ($hero_slides as $hero_slide) {
    $is_active_hero_slide = $hero_slide['hero_slide_active'];
    if ($is_active_hero_slide) { ?>
      <section class="hero">
        <div class="d-container">
          <div class="hero__container">
            <div class="hero__content">
              <h1><?php echo $hero_slide['hero_slide_title']; ?></h1>
              <p><?php echo $hero_slide['hero_slide_text']; ?></p>
            </div>
            <div class="hero__image">
              <img src="<?php echo $hero_slide['hero_slide_image']; ?>" alt="">
            </div>
          </div>
        </div>
      </section>
    <?php }
  }
}
?>

  <section class="news-block">
    <div class="d-container">
      <div class="heading">
        <h2 class="section-title">Новости</h2>
        <a href="<?php echo get_post_type_archive_link('news'); ?>" class="link">Все новости</a>
      </div>

      <div class="news-block__container">
        <?php
        $args = array(
          'post_type'      => 'news',
          'posts_per_page' => 3,
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          $count = 0;
          while ($query->have_posts()) : $query->the_post();
            $count++;
            if ($count === 1) : ?>
              <div class="row-ncards">
                <div class="big-ncards">
                  <?php get_template_part('template-parts/ncard-l'); ?>
                </div>
                <div class="small-ncards">
            <?php else : ?>
                  <?php get_template_part('template-parts/ncard'); ?>
            <?php endif; ?>
            <?php if ($count === 3) : ?>
                </div>
              </div>
            <?php endif;
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div>

      <div class="link-center">
        <button type="button" class="button-second" id="load-more-news" data-max-pages="<?php echo $query->max_num_pages; ?>">Показать еще</button>
      </div>
    </div>
  </section>

  <section class="blog-block">
    <div class="d-container">
      <div class="heading">
        <h2 class="section-title">Блог</h2>
        <a href="<?php echo get_post_type_archive_link('blog'); ?>" class="link">Перейти в блог</a>
      </div>
      <div class="blog-block__cards">
      <?php
      $args = array(
          'post_type'      => 'blog',
          'posts_per_page' => 3,
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post();
      ?>
        <?php get_template_part('template-parts/bcard'); ?>
      <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
      <div class="link-center">
        <button type="button" class="button-second" id="load-more-blog" data-max-pages="<?php echo $query->max_num_pages; ?>">Показать еще</button>
      </div>
    </div>
  </section>

<?php 
$tg_block_link = get_field('tg_block_link');
if( $tg_block_link ): 
    $tg_block_link_url = $tg_block_link['url'];
    $tg_block_link_title = $tg_block_link['title'];
    $tg_block_link_target = $tg_block_link['target'] ? $tg_block_link['target'] : '_self';
    ?>
    <section class="tg-block">
      <div class="d-container">
        <div class="tg-block__wrapper">
          <?php if (get_field('tg_block_title')) { ?><h2><?php the_field('tg_block_title'); ?></h2><?php } ?>
          <a href="<?php echo esc_url( $tg_block_link_url ); ?>" target="<?php echo esc_attr( $tg_block_link_target ); ?>" class="tg-button">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M28.8995 5.12807L24.712 25.0656C24.3995 26.4406 23.5245 26.8156 22.337 26.1281L15.8995 21.3781L12.837 24.3781C12.462 24.7531 12.212 25.0031 11.5245 25.0031L11.962 18.4406L23.8995 7.69057C24.462 7.25307 23.7745 6.94057 23.087 7.44057L8.33702 16.6906L2.02452 14.7531C0.649515 14.3156 0.587015 13.3781 2.27452 12.6906L27.1495 3.12807C28.2745 2.69057 29.2745 3.37807 28.8995 5.12807Z" fill="currentColor"/>
            </svg>
            <span><?php echo esc_html( $tg_block_link_title ); ?></span>
          </a>
        </div>
      </div>
    </section>
<?php endif; ?>


  <section class="articles-block">
    <div class="d-container">
      <div class="heading">
        <h2 class="section-title">Статьи</h2>
        <a href="<?php echo get_post_type_archive_link('articles'); ?>" class="link">Все статьи</a>
      </div>
      <div class="articles-block__cards">
        <?php
        $args = array(
            'post_type'      => 'articles',
            'posts_per_page' => 6,
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
        ?>
          <?php get_template_part('template-parts/acard'); ?>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
      <div class="link-center">
        <button type="button" class="button-second" id="load-more-articles" data-max-pages="<?php echo $query->max_num_pages; ?>">Показать еще</button>
      </div>
    </div>
  </section>

<?php if( have_rows('graph_cards') ): ?>
  <section class="graph-block">
    <div class="d-container">
      <div class="heading">
        <?php if (get_field('graph_title')) { ?><h2 class="section-title"><?php the_field('graph_title'); ?></h2><?php } ?>
        <?php 
        $graph_link = get_field('graph_link');
        if( $graph_link ): 
            $graph_link_url = $graph_link['url'];
            $graph_link_title = $graph_link['title'];
            $graph_link_target = $graph_link['target'] ? $graph_link['target'] : '_self';
            ?>
          <a href="<?php echo esc_url( $graph_link_url ); ?>" target="<?php echo esc_attr( $graph_link_target ); ?>" class="link"><?php echo esc_html( $graph_link_title ); ?></a>
        <?php endif; ?>
      </div>
      <div class="graph-block__cards">
        <?php while( have_rows('graph_cards') ): the_row(); ?>
          <div class="graph-item">
            <?php if (get_sub_field('graph_card_icon')) { ?><img src="<?php the_sub_field('graph_card_icon'); ?>" alt=""><?php } ?>
            <hr>
            <?php if (get_sub_field('graph_card_text')) { ?><p><?php the_sub_field('graph_card_text'); ?></p><?php } ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>