<?php
/**
 * Template name: Thank you
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
get_header();
if( have_posts() ) : 
    while ( have_posts() ) :
        the_post();
        $content  = get_the_content();
        $content  = apply_filters( 'the_content', $content );
        $flexible = get_field('flexible_content', get_the_ID());

          if ( $content ) : ?>
                <section class="content-wrapper thanks-page d-flex align-items-center justify-content-center">
                  <div class="container">
                    <?php echo $content; ?>
                  </div>
                </section>
          <?php else : ?>
                <section class="content-wrapper no-content d-flex align-items-center justify-content-center">
                  <div class="w-100 d-flex justify-content-center align-items-center flex-column">
                    <h1 class="title"><?php echo __('Спасибо за Вашу заявку!', 'hcc'); ?></h1>
                    <p class="subtitle d-block"><?php echo __('Мы свяжемся с Вами в ближайшее время', 'hcc'); ?></p>
                  </div>
                </section>
          <?php endif; 
        
    endwhile; 
    if ( $flexible ) :
                    while (has_sub_field('flexible_content', get_the_ID())) :
                                   $row_layout_slug = get_row_layout();
                                   get_template_part('template-parts/flexible/block', $row_layout_slug);
                    endwhile;
    endif;
endif; 
get_footer();
