<?php
 /*
  * Template name: ACF Mixed template
  * 
  */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
get_header();
global $post;

if(have_posts()) : while(have_posts()) : the_post();
         
          $content  = get_the_content();
          $content  = apply_filters( 'the_content', $content );
          $flexible = get_field('flexible_content', get_the_ID();

          if( $flexible || $content ) :
            if ($flexible) :
                      while (has_sub_field('flexible_content', get_the_ID())) :
                                     $row_layout_slug = get_row_layout();
                                     get_template_part('template-parts/flexible/block', $row_layout_slug);
                      endwhile;
            else : 
                      get_template_part('template-parts/content', 'none');
            endif;

            if ( $content ) :
                  echo $content;
            endif;
          else : 
                get_template_part('template-parts/content', 'none');
          endif;

          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
				comments_template();
          endif;

endwhile; endif; get_footer(); ?>