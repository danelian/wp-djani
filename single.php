<?php get_header(); ?>

  <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>

  <article class="single-post">
    <div class="d-container">
      <h1 class="section-title"><?php the_title(); ?></h1>
      <?php if( have_rows('single') ):
        while ( have_rows('single') ) : the_row();
          if( get_row_layout() == 'single_var1' ): ?>
            <div class="var1">
              <?php 
              $var1_image = get_sub_field('single_var1_image');
              if( !empty($var1_image) ): ?>
                <div class="image"><img src="<?php echo $var1_image['url']; ?>" alt="<?php echo $var1_image['alt']; ?>" /></div>
              <?php endif; ?>
              <div class="content">
                <?php the_sub_field('single_var1_content'); ?>
              </div>
            </div>
          <?php elseif( get_row_layout() == 'single_var2' ): ?>
            <div class="var2">
              <?php 
              $var2_image = get_sub_field('single_var2_image');
              if( !empty($var2_image) ): ?>
                <div class="image"><img src="<?php echo $var2_image['url']; ?>" alt="<?php echo $var2_image['alt']; ?>" /></div>
              <?php endif; ?>
              <div class="content">
                <?php the_sub_field('single_var2_content'); ?>
              </div>
            </div>
          <?php elseif( get_row_layout() == 'single_table' ): ?>
            <div class="table-wrapper">
              <?php 
              $table = get_sub_field('single_table_item');
              if ($table) : ?>
                <table>
                  <thead>
                    <tr>
                      <?php foreach ($table['header'] as $th) : ?>
                        <th><?php echo esc_html($th['c']); ?></th>
                      <?php endforeach; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($table['body'] as $tr) : ?>
                      <tr>
                        <?php foreach ($tr as $td) : ?>
                          <td><?php echo esc_html($td['c']); ?></td>
                        <?php endforeach; ?>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php endif; ?>
            </div>
          <?php endif;
        endwhile;
      else : endif; ?>
    </div>
  </article>

  <section class="news-block">
    <div class="d-container">
      <div class="heading">
        <h2 class="section-title">Лента новостей</h2>
        <a href="#" class="link">Все новости</a>
      </div>
      <div class="news-block__container">
      <?php
      $args = array(
          'post_type'      => 'news',
          'posts_per_page' => 3,
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post();
      ?>
        <?php get_template_part('template-parts/ncard'); ?>
      <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  <section class="blog-block">
    <div class="d-container">
      <div class="heading">
        <h2 class="section-title">Лента блога</h2>
        <a href="#" class="link">Перейти в блог</a>
      </div>
      <div class="blog-block__cards">
        <a href="#" class="bcard">
          <img src="/img/bcard-image-1.jpg" class="bcard__image" alt="">
          <h2>Блаженство Джан</h2>
          <p>Ум сосредоточен и сконцентрирован, он однонаправленно удерживает в фокусе внимания объект или мысль, не распаляясь на всеобъемлющее обилие информационного потока роя мыслей Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, veniam.</p>
          <div class="button-primary">Узнать подробнее</div>
        </a>
        <a href="#" class="bcard">
          <img src="/img/bcard-image-2.jpg" class="bcard__image" alt="">
          <h2>Эмоциональная чистота</h2>
          <p>Ум сосредоточен и сконцентрирован, он однонаправленно удерживает в фокусе внимания объект или мысль, не распаляясь на всеобъемлющее обилие информационного потока роя мыслей</p>
          <div class="button-primary">Узнать подробнее</div>
        </a>
        <a href="#" class="bcard">
          <img src="/img/bcard-image-3.jpg" class="bcard__image" alt="">
          <h2>Гармония Сознания</h2>
          <p>Ум сосредоточен и сконцентрирован, он однонаправленно удерживает в фокусе внимания объект или мысль, не распаляясь на всеобъемлющее обилие информационного потока роя мыслей</p>
          <div class="button-primary">Узнать подробнее</div>
        </a>
        <a href="#" class="bcard">
          <img src="/img/bcard-image-1.jpg" class="bcard__image" alt="">
          <h2>Блаженство Джан</h2>
          <p>Ум сосредоточен и сконцентрирован, он однонаправленно удерживает в фокусе внимания объект или мысль, не распаляясь на всеобъемлющее обилие информационного потока роя мыслей Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, veniam.</p>
          <div class="button-primary">Узнать подробнее</div>
        </a>
        <a href="#" class="bcard">
          <img src="/img/bcard-image-2.jpg" class="bcard__image" alt="">
          <h2>Эмоциональная чистота</h2>
          <p>Ум сосредоточен и сконцентрирован, он однонаправленно удерживает в фокусе внимания объект или мысль, не распаляясь на всеобъемлющее обилие информационного потока роя мыслей</p>
          <div class="button-primary">Узнать подробнее</div>
        </a>
        <a href="#" class="bcard">
          <img src="/img/bcard-image-3.jpg" class="bcard__image" alt="">
          <h2>Гармония Сознания</h2>
          <p>Ум сосредоточен и сконцентрирован, он однонаправленно удерживает в фокусе внимания объект или мысль, не распаляясь на всеобъемлющее обилие информационного потока роя мыслей</p>
          <div class="button-primary">Узнать подробнее</div>
        </a>
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

  <article class="single-post single-post-2">
    <div class="d-container">
      <h1 class="section-title">Текстовый блок 2</h1>
      <div class="var3">
        <div class="image">
          <img src="/img/bcard-image-1.jpg" alt="">
        </div>
        <div class="content">
          <h2>Джаны и счастье</h2>
          <p>Джаны — удивительные состояния сознания, которые раскрываются во время практики медитации и полного присутствия. В эти моменты человек погружается в глубокий восторг, блаженство и другие подобные факторы, создавая уникальный опыт внутреннего покоя и гармонии.</p>
          <p>Слово «Джана» само по себе обозначает «познание» или «знание». В медитативном контексте Джаны представляют собой особые уровни осознанности, когда ум становится полностью сосредоточенным, а сознание проникает в глубины внутреннего мира. Эти состояния восхищения внутренней гармонией и светом.</p>
          <p>Продолжительность Джанов обычно ограничена временем, составляя примерно два часа. За это короткое время практикующий может пережить поток блаженства, чувствуя, как каждая клетка тела наполняется покоем и радостью. Это уникальное состояние предоставляет возможность погрузиться в самые глубокие аспекты своего внутреннего «я» и осознать свою внутреннюю сущность.</p>
          <div class="row">
            <div class="col-12 col-lg-6">
              <blockquote class="wp-block-quote">
                <p>
                  «Слово “Джана” само по себе обозначает «познание» или «знание». В медитативном контексте Джаны представляют собой особые уровни осознанности, когда ум становится полностью сосредоточенным, а сознание проникает в глубины внутреннего мира. Эти состояния восхищения внутренней гармонией и светом.»
                </p>
              </blockquote>
            </div>
            <div class="col-12 col-lg-6">
              <p>Джаны — удивительные состояния сознания, которые раскрываются во время практики медитации и полного присутствия. В эти моменты человек погружается в глубокий восторг, блаженство и другие подобные факторы, создавая уникальный опыт внутреннего покоя и гармонии.</p>
              <p>Продолжительность Джанов обычно ограничена временем, составляя примерно два часа. За это короткое время практикующий может пережить поток блаженства, чувствуя, как каждая клетка тела наполняется покоем и радостью.</p>
            </div>
          </div>
          <p>Джаны — удивительные состояния сознания, которые раскрываются во время практики медитации и полного присутствия. В эти моменты человек погружается в глубокий восторг, блаженство и другие подобные факторы, создавая уникальный опыт внутреннего покоя и гармонии.</p>
          <p>Слово «Джана» само по себе обозначает «познание» или «знание». В медитативном контексте Джаны представляют собой особые уровни осознанности, когда ум становится полностью сосредоточенным, а сознание проникает в глубины внутреннего мира. Эти состояния восхищения внутренней гармонией и светом.</p>
          <p>Продолжительность Джанов обычно ограничена временем, составляя примерно два часа. За это короткое время практикующий может пережить поток блаженства, чувствуя, как каждая клетка тела наполняется покоем и радостью. Это уникальное состояние предоставляет возможность погрузиться в самые глубокие аспекты своего внутреннего «я» и осознать свою внутреннюю сущность.</p>
        </div>
      </div>
    </div>
  </article>

<?php get_footer(); ?>