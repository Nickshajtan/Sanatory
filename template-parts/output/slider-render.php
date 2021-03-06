<?php
/*
 * Slider cpt render
 * 
 *
 */ 

$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
$output_id    = (!empty( $id ) && !is_null( $id ) ) ? $id : $blockname . '-' . $block_id_str; 
$output_class = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_section  = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section'; ?>

<section id="<?php echo $output_id; ?>" class="<?php echo $output_class . ' ' . $bem_section; ?>">
  <div class="container-fluid">
    <div class="slick-slider row-fluid p-relative <?php echo $bem_section . ' ' . '__slider'; ?>">
     <?php if( is_array( $slides ) || is_object( $slides ) && !is_null( $slides ) ) :
           $count = 1;
           $global_title    = $title;
           $global_subtitle = $subtitle;
      
           foreach( $slides as $post ) :
             setup_postdata($post);
             $post_type = get_post_type( get_the_ID() );
             $title     = wp_kses_post( get_the_title() ); 
             $content   = strip_tags( wp_kses_post( get_the_content() ) ); 
             $content   = wp_trim_words( $content, 50, '...');
             $image     = get_the_post_thumbnail_url( $post->ID, 'full' );
            
           ?>
   <div class="col-12 m-0 pl00 pr-0 d-flex justify-content-center align-items-center flex-column <?php echo $bem_section . ' ' . '__slider__slide slide' . $count; ?>" <?php if( $title ) : ?> data-title="<?php echo $title; ?>" <?php endif; ?> style="background-image: url('<?php echo $image; ?>');">
        <?php if( !empty( $content ) ) : ?>
        <div class="w-100 <?php echo $bem_section . '__slider__slide__content'; ?>">
          <?php echo $content; ?>
        </div>
        <?php endif; ?>
   </div>
           <?php $count++; endforeach; 
     endif; ?>
    
    </div>
    
    <?php if( $global_title || $global_subtitle ) : ?>
      <div class="p-absolute col-12 <?php echo $bem_section . '__title-block'; ?>">
        <div class="row">
          <?php if( $global_title !== false ) : ?>
            <div class="col-12 <?php echo $bem_section . '__title-block__title'; ?>">
              <?php echo $global_title; ?>
            </div>
          <?php endif;
          if( $global_subtitle !== false ) : ?>
            <div class="col-12 <?php echo $bem_section . '__title-block__subtitle'; ?>">
              <?php echo $global_subtitle; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
    
  </div>
</section>
<?php $post = $tmp_post;
      wp_reset_postdata(); ?>
