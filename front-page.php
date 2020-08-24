<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hcc
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
get_header();
if( have_posts() ) : 
    while ( have_posts() ) :
        the_post(); ?>
        <section id="content" class="container-fluid site-container page_front page">
              <div class="row">
                <div class="col-12 page__content page_front__content">
                  <?php the_content(); ?>
                </div>
              </div>
        </section>
    <?php endwhile;
    $flexible = get_field('flexible_content', get_the_ID());
        if ( $flexible ) :
                    while (has_sub_field('flexible_content', get_the_ID())) :
                                   $row_layout_slug = get_row_layout();
                                   get_template_part('template-parts/flexible/block', $row_layout_slug);
                    endwhile;
    endif;
else :
    get_template_part( 'template-parts/content', 'none' );
endif; 
get_footer();
