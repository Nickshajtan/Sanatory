<?php
/**
 * Template name: Privacy
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package hhc
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
get_header();

if(have_posts()) : while ( have_posts() ) : the_post();
    
          $content = get_the_content();
          $content = apply_filters( 'the_content', $content );

          if ( $content ) : ?>
               <section class="content-wrapper privacy-page d-flex align-items-center justify-content-center">
                  <div class="container">
                    <?php echo $content; ?>
                  </div>
                </section>
          <?php else : ?>
                <section class="content-wrapper no-content d-flex align-items-center justify-content-center">
                  <?php get_template_part('template-parts/content', 'none'); ?>
                </section>
          <?php endif;

endwhile; endif;
get_footer();
