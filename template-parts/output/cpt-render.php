<?php 
/*
 * Custom Post types render cycle
 *
 *
 */

$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
$output_id    = ( !empty( $id ) && !is_null( $id ) ) ? $id : $blockname . '-' . $block_id_str;
$output_class = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_section  = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section';
$post_wrap_md = ( !empty( !$grid_set ) ) ? $bem_section . '__posts_grid' : $bem_section . '__posts_flex';
$post_wrap_cl = ( !empty( !$grid_set ) ) ? $grid_set . ' ' . $bem_section . '__posts' . ' ' . $post_wrap_md 
                                         : 'col-12' . $bem_section . '__posts'  . ' ' . $post_wrap_md;
$ajax = get_option('hcc-ajax-load');

global $post;
$tmp_post = $post;
query_posts( $args );
?>


<section id="<?php echo $output_id; ?>" class="<?php echo $output_class . ' ' . $bem_section; ?>">
  <div class="container-fluid">
    <div class="row-fluid">
      <?php if( $title !== false ) : ?>
        <div class="col-12 <?php echo $bem_section . '__title'; ?>"><?php echo $title; ?></div>
      <?php endif; 
      if( $subtitle !== false ) : ?>
        <div class="col-12 <?php echo $bem_section . '__subtitle'; ?>"><?php echo $subtitle; ?></div>
      <?php endif; 
      if( have_posts() ) : ?>
        <div class="<?php echo $post_wrap_cl; ?>">
          <?php if( !$grid_set ) : ?>
           <div class="row ajax-container d-flex flex-wrap justify-content-center">
          <?php endif; 
                while (have_posts()) : the_post();
                  global $post;
                  
                  $post_type = get_post_type( get_the_ID() );
                  $title     = wp_kses_post( get_the_title() ); 
                  $content   = strip_tags( wp_kses_post( get_the_content() ) ); 
                  $content   = ( $post_type === 'post' ) ? wp_trim_words( $content, 50, '...') : $content;
                  $image     = get_the_post_thumbnail( $post->ID, 'medium', array('class' => "img-inner cpt-image $post_type-image") );
                  $image_big = ( get_the_post_thumbnail_url() ) ? esc_url( get_the_post_thumbnail_url('large') ) : '#';
                  $post_link = get_permalink();
                  $permalink = (!empty( $post_link ) ) ? esc_url( get_permalink() ) : '#';

                  ?>
                  
              <?php if( !$grid_set ) : ?>
              <article class="col-12 col-md-6 col-lg-4 col-xl-3 <?php echo $bem_section . '__list' . '__item'; ?>" data-link="<?php echo $permalink; ?>">
                      <?php if( $post_type === 'post' ) : ?><a href="<?php echo $permalink; ?>" class="w-100 d-block card-block"><?php endif; ?>
                     
                       <?php if( !empty( $title ) ) : ?>
                          <div class="w-100 block-title <?php echo $bem_section . '__list' . '__item__title'; ?>">
                            <?php echo $title; ?>
                          </div>
                        <?php endif;
                        if( !empty( $content ) ) : ?>
                          <div class="w-100 <?php echo $bem_section . '__list' . '__item__content'; ?>">
                            <?php echo $content; ?>
                          </div>
                        <?php endif; ?>
                      <?php if( $image ) : ?>
                          <div class="w-100 img-wrap <?php echo $bem_section . '__list' . '__item__img'; ?>">
                            <?php echo $image; ?>
                          </div>
                       <?php endif; ?>
                      <?php if( $post_type === 'post' ) : ?>
                         <div data-href="<?php echo $permalink; ?>" class="button w-100 <?php echo $bem_section .  '__list__item__link'; ?>">
                          <?php echo __('Узнать больше', 'hcc'); ?>
                         </div>
                      </a>
                      <?php endif; ?>
              </article>
              <?php endif; ?>
                  
            <?php endwhile;
            if( !$grid_set ) : ?>
            </div>
          <?php endif; 
          if( function_exists( 'the_posts_pagination' ) && $ajax ) : ?>
            <div class="col-12 pagination-wrapper">
              <div class="w-100 d-none justify-content-center align-items-center">
                  <?php the_posts_pagination(); ?>
              </div>
            </div>
        <?php endif; ?>
        <div class="col-12 pagination-wrapper">
            <div class="row load-container <?php echo $bem_section . '__posts' . '__btns'; ?>">
                <?php $count_service = wp_count_posts($post_type); 
                if ( $ajax && ( $count_service->publish > $per_page ) ) : ?>
                        <div class="col-12 d-flex justify-content-center align-items-center">
                           <div class="load-loder d-flex justify-content-center align-items-center"></div>
                        </div>
                        <div class="col-12 col-md-<?php echo ( $link ) ? 6 : 12; ?> d-flex flex-column justify-content-end align-items-center align-items-md-<?php echo ( $link ) ? 'end' : 'center'; ?>">
                            <div class="load-more">
                               <div class="button box-button"><?php echo __('Показать ещё', 'hcc'); ?></div>
                            </div>
                            <div class="load-error d-none"><?php echo __('Невозможно выполнить запрос. Попробуйте, пожалуйста, позже', 'hcc'); ?></div>
                        </div>
                        <script>
                            var <?php echo $post_type; ?>_posts        = '<?php echo serialize($args); ?>';
                            var <?php echo $post_type; ?>_current_page = '<?php echo $paged; ?>';
                            var <?php echo $post_type; ?>_max_pages    = '<?php echo ceil( $count_service->publish / $per_page ); ?>';
                        </script>
                 <?php endif; ?>
                 <?php if( $link ): ?>
                    <div class="col-12 col-md-<?php echo ( $ajax ) ? 6 : 12; ?> d-flex flex-column justify-content-end align-items-center align-items-md-<?php echo ( $ajax ) ? 'start' : 'center'; ?>">
                        <a class="button d-flex align-items-center justify-content-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                            <?php echo $link_title; ?>
                        </a>
                    </div>
                  <?php endif; ?>
            </div>
         </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php 
unset( $link );
$post = $tmp_post;
//wp_reset_postdata(); ?>