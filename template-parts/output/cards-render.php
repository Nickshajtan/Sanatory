<?php
/*
 * Render for the cards block
 *
 */

$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'); 
$output_id    = (!empty( $id ) && !is_null($id)) ? $id : $blockname . '-' . $block_id_str; 
$output_class = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_section  = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section';

?>
<section id="<?php echo $output_id; ?>" class="<?php echo $output_class . ' ' . $bem_section; ?>">
  <div class="container">
    <div class="row">
      <?php if( $title !== false ) : ?>
        <div class="col-12 <?php echo $bem_section . '__title'; ?>"><?php echo $title; ?></div>
      <?php endif;
      if( $subtitle !== false ) : ?>
        <div class="col-12 <?php echo $bem_section . '__subtitle'; ?>"><?php echo $subtitle; ?></div>
      <?php endif; 
      if( !empty( $text ) ) : ?>
        <div class="col-12 text-center <?php echo $bem_section . '__text'; ?>"><?php echo $text; ?></div>
      <?php endif;
      if( is_array( $cycle ) && !is_null( $cycle ) ) : ?>
      <div class="w-100 d-grid grid-column-<?php echo ( !empty($columns) ) ? $columns : 4; ?> <?php echo $bem_section . '__items'; ?>">
       
        <?php $counter = 1; 
        foreach( $cycle as $el ) : 
            
              $title  = hcc_get_acf_title( $el, 'text-center block-title' );
              $text   = wp_kses_post( $el['text'] );
              $text   = wp_trim_words($text, 30);
              $mime   = $el['icon']['mime_type'];
              $icon   = ( is_array( $el['icon'] ) )     ? esc_url( $el['icon']['url'] ) : esc_url( $el['icon'] );
              $icon   = ( !$mime === 'image/svg+xml' )  ? aq_resize( $icon, 300, 300, true, true, true ) : $icon;
              $mime   = $el['icon_two']['mime_type'];
              $icon_2 = ( is_array( $el['icon_two'] ) ) ? esc_url( $el['icon_two']['url'] ) : esc_url( $el['icon'] );
              $icon_2 = ( !$mime === 'image/svg+xml' )  ? aq_resize( $icon_2, 300, 300, true, true, true ) : $icon_2;
              $link   = ( $el['link'] ) ? esc_url( $el['link'] ) : '#';
            
              if( !empty($el) ) :
                if( get_row_layout() === 'about_block' || strpos( $blockName, 'about_block') !== false ) :
                  $class = 4;
                  $align = 'left';
                else :
                  $class = 3;
                  $align = 'center';
                endif;
              ?>
              <a href="<?php echo $link; ?>" class="d-flex align-items-center flex-column <?php echo $bem_section . '__items__element'; ?>" <?php echo ( $counter % 2 ===0 ) ? 'style="padding-top: 80px;"' : ''; ?>>
                <?php if( !empty($icon) || !empty($icon_2) ) : ?>
                <div class="w-100 d-flex align-items-center justify-content-center <?php echo $bem_section . '__items__element__icon'; ?>">
                    <?php if($icon) : ?>
                      <img src="<?php echo $icon; ?>" alt="" class="img-responsive img-inner icon">
                    <?php endif;
                    if($icon_2) : ?>
                      <img src="<?php echo $icon_2; ?>" alt="" class="img-responsive img-inner icon-hover">
                    <?php endif; ?>
                </div>
                <?php endif;
                if( !empty($title) ) : ?>
                  <div class="w-100 <?php echo $bem_section . '__items__element__title'; ?>">
                    <?php echo $title; ?>      
                  </div>
                <?php endif;
                if( !empty($text) ) : ?>
                  <div class="w-100 <?php echo $bem_section . '__items__element__text'; ?> text-<?php echo $align; ?>">
                    <?php echo $text; ?>      
                  </div>
                <?php endif; ?>
              </a>
              
              <?php endif;
            $counter++;
        endforeach; ?>
      </div>
      
      <?php endif; ?>
    </div>
  </div>
</section>