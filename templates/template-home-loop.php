<?php
/**
 * Template name: Blog Loop
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
get_header();
if( have_posts() ) : 
    if ( get_query_var('paged') ) {
          $paged = get_query_var('paged');
    } elseif ( get_query_var('page') ) {  
          $paged = get_query_var('page');
    } else {
          $paged = 1;
    }
    $args = array(
                    'numberposts' => 0,
                    'posts_per_page' => trim(get_option('posts_per_page')),
                    'paged' => $paged,
                    'post_type'   => 'post',
                    'orderby'     => 'status',
                    'order'       => 'ASC',
                    'suppress_filters' => true,
    );
    query_posts( $args );
    while ( have_posts() ) :
        the_post();
        global $post;
        $content = get_the_content();
        $content = apply_filters( 'the_content', $content );

          if ( $content ) : ?>
                <section class="content-wrapper blog-page d-flex align-items-center justify-content-center">
                  <div class="container">
                    <?php echo $content; ?>
                  </div>
                </section>
          <?php else : ?>
                <section class="content-wrapper no-content d-flex align-items-center justify-content-center">
                  <?php get_template_part('template-parts/content', 'none'); ?>
                </section>
          <?php endif; 
    endwhile; 
    <?php if( function_exists( 'the_posts_pagination' ) ) : ?>
        <div class="container pagination-wrapper">
                    <div class="row">
                        <div class="col-12 d-none justify-content-center align-items-center">
                            <?php the_posts_pagination(); ?>
                        </div>
                    </div>
        </div>
    <?php endif; ?>
endif; 
get_footer();
