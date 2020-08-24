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
  <div class="container">
    <?php if( $title || $subtitle ) : ?>
    <div class="row">
       <?php if( $title !== false ) : ?>
         <div class="col-12 <?php echo $bem_section . ' ' . '__title'; ?>">
           <?php echo $title; ?>
         </div>
       <?php endif;
       if( $subtitle !== false ) : ?>
         <div class="col-12 <?php echo $bem_section . ' ' . '__subtitle'; ?>">
           <?php echo $subtitle; ?>
         </div>
       <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
  
  <?php if( is_array( $shares ) || is_object( $shares ) && !is_null( $shares )) : ?>
  <div class="container-fluid">
    <div class="row-fluid d-flex justify-content-center align-items-center flex-row flex-wrap <?php echo $bem_section . ' ' . '__list'; ?>">
           <?php $count = 1;
           foreach( $shares as $post ) :
             setup_postdata($post); 

             $post_type = get_post_type( get_the_ID() );
             $title     = wp_kses_post( get_the_title() ); 
             $content   = strip_tags( wp_kses_post( get_the_content() ) ); 
             $content   = wp_trim_words( $content, 50, '...');
             $image     = get_the_post_thumbnail( $post->ID, 'full' );
            
           ?>
   <div class="col-12 col-md-6 col-xl-4 d-flex justify-content-center align-items-center flex-column <?php echo $bem_section . ' ' . '__list__item share' . $count; ?>">
      <div class="row">
        <?php if( $image ) : ?>
          <div class="col-12 <?php echo $bem_section . ' ' . '__list__item__img'; ?>">
            <?php echo $image; ?>
          </div>
        <?php endif;
        if( $title ) : ?>
          <div class="col-12 <?php echo $bem_section . ' ' . '__list__item__title'; ?>">
            <?php echo $title; ?>
          </div>
        <?php endif;
        if( $content ) : ?>
          <div class="col-12 <?php echo $bem_section . ' ' . '__list__item__content'; ?>">
            <?php echo $content; ?>
          </div>
        <?php endif; ?>
      </div>
   </div>
           <?php $count++; 
      endforeach; ?>
    </div>
  </div>
  <?php endif; ?>
  
</section>
<?php $post = $tmp_post;
      wp_reset_postdata(); ?>