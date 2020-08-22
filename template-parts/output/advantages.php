<?php
/*
 * Render for About & Service blocks
 *
 */

$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'); 
$output_id    = (!empty( $id )) ? $id : $blockname . '-' . $block_id_str; 
$output_class = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_section  = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section'; ?>

<section id="<?php echo $output_id; ?>" class="<?php echo $output_class . ' ' . $bem_section; ?>">
  <div class="container">
    <div class="row">
      <?php if( !empty( $title ) ) : ?>
        <div class="col-12 <?php echo $bem_section . '__title'; ?>"><?php echo $title; ?></div>
      <?php endif;
      if( !empty( $subtitle ) ) : ?>
        <div class="col-12 <?php echo $bem_section . '__subtitle'; ?>"><?php echo $subtitle; ?></div>
      <?php endif; 
      if( !empty( $text ) ) : ?>
        <div class="col-12 <?php echo $bem_section . '__text'; ?>"><?php echo $text; ?></div>
      <?php endif; 
      if( is_array( $cycle ) && !is_null( $cycle ) ) : ?>
        <div class="col-12 <?php echo $$bem_section . '__items'; ?>">
          <div class="row d-flex flex-wrap justify-content-center">
            <?php foreach( $cycle as $el ) : 
            
              $title  = hcc_get_acf_title( $el, '' );
              $text   = wp_kses_post( $el['text'] );
              $icon   = ( is_array( $el['icon'] ) ) ? esc_url( $el['icon']['url'] ) : esc_url( $el['icon'] );
              $icon_2 = ( is_array( $el['icon'] ) ) ? esc_url( $el['icon']['url'] ) : esc_url( $el['icon'] );
            
              if( !empty($el) ) : ?>
              <div class="col-12 col-md-6 col-lg-4 <?php echo $bem_section . '__items__element'; ?>">
                <?php if( !empty($title) ) : ?>
                  <div class="w-100 <?php echo $bem_section . '__items__element__title'; ?>">
                    <?php echo $title; ?>      
                  </div>
                <?php endif;
                if( !empty($text) ) : ?>
                  <div class="w-100 <?php echo $bem_section . '__items__element__text'; ?>">
                    <?php echo $text; ?>      
                  </div>
                <?php endif;
                if( !empty($icon) || !empty($icon_2) ) : ?>
                <div class="w-100 d-flex align-items-center justify-content-center <?php echo $bem_section . '__items__element__icon'; ?>">
                    <?php if($icon) : ?>
                      <img src="<?php echo $icon; ?>" alt="" class="img-responsive img-inner icon">
                    <?php endif;
                    if($icon_2) : ?>
                      <img src="<?php echo $icon_2; ?>" alt="" class="img-responsive img-inner icon-hover">
                    <?php endif; ?>
                </div>
                <?php endif; ?>
              </div>
              
              <?php endif;
            endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>