<?php
/*
 * Output Left text postion block render
 *
 */

$row_layout = get_row_layout();
$block_id   = str_replace('_', '-', $block_id);
$blockname  = str_replace('_', '-', $blockname);

switch( $row_layout ) {
  case 'text_right_block' :
    $justify   = 'end';
    $img_order = 'order-1';
    $txt_order = 'order-2';
    break;
  case 'text_left_block' :
    $justify = 'start';
    $img_order = 'order-2';
    $txt_order = 'order-1';
    break;
  case 'text_center_block' :
    $justify = 'center';
    $img_order = '';
    $txt_order = '';
    break;
  default:
    $justify = 'center';
    $img_order = '';
    $txt_order = '';
} 

$first_col_class  = $bem_block . '__img-part ' . $img_order;
$second_col_class = $bem_block . '__text-part ' . $txt_order;
$block_id_str     = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
$output_id        = (!empty( $id )) ? $id : $blockname . '-' . $block_id_str; 
$output_class     = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_block        = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section';
$bem_mod          = $blockname . $class_mod; ?>

<section id="<?php echo $output_id; ?>" class="<?php echo $bem_block . ' ' . $bem_mod . ' ' . $output_class; ?> d-flex align-items-center justify-content-center">
  <div class="container d-flex align-items-center">
    <div class="row d-flex align-items-center justify-content-<?php echo $justify; ?>">
      <?php 
      if( $row_layout === 'text_right_block' || $row_layout === 'text_left_block' ) :
        /* --- Two columns ---*/
        if( $image ) : ?>
          <div class="col-12 col-md-6 col-lg-6 <?php echo $first_col_class; ?> d-flex flex-column align-items-center">
            <img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>" class="img-responsive img-inner <?php echo $bem_block . '__img-part__img'; ?>">
          </div>
        <?php endif; 
        if( !empty( $subtitle ) || !empty( $title ) || !empty( $content ) ) : ?>
        <div class="col-12 col-md-6 col-lg-6 <?php echo $second_col_class; ?>  d-flex flex-column align-items-center">
          <?php if( !empty( $title ) ) : ?>
          <div class="w-100 <?php echo $bem_block . '__text-part__title'; ?>">
            <?php echo $title; ?>
          </div>
          <?php endif;
          if( !empty( $subtitle ) ) : ?>
          <div class="w-100 <?php echo $bem_block . '__text-part__subtitle'; ?>">
            <?php echo $subtitle; ?>
          </div>
          <?php endif;
          if( !empty( $content ) ) : ?>
          <div class="w-100 <?php echo $bem_block . '__text-part__content'; ?>">
            <?php echo $content; ?>
          </div>
          <?php endif; ?>
        </div>
        <?php endif;
      endif;
      /* --- END ---*/
      /* --- Three columns ---*/
      if( $row_layout === 'text_center_block' ) :
        if( !empty( $subtitle ) || !empty( $title ) || !empty( $content ) ) : ?>
        <div class="col-12 col-md-6 col-lg-4 d-flex flex-column order-1 order-md-3 order-lg-2 <?php echo $bem_block . '__text-part '; ?>">
          <?php if( !empty( $title ) ) : ?>
          <div class="w-100 <?php echo $bem_block . '__text-part__title'; ?>">
            <?php echo $title; ?>
          </div>
          <?php endif;
          if( !empty( $subtitle ) ) : ?>
          <div class="w-100 <?php echo $bem_block . '__text-part__subtitle'; ?>">
            <?php echo $subtitle; ?>
          </div>
          <?php endif;
          if( !empty( $content ) ) : ?>
          <div class="w-100 <?php echo $bem_block . '__text-part__content'; ?>">
            <?php echo $content; ?>
          </div>
          <?php endif; ?>
        </div>
        <?php endif;
        if( $image_l ) : ?>
        <div class="col-12 col-md-6 col-lg-4 d-flex order-2 order-md-1 order-lg-1 <?php echo $bem_block . '__img-part '; ?>">
          <img src="<?php echo $img_l_src; ?>" alt="<?php echo $img_l_alt; ?>" title="<?php echo $img_l_title; ?>" class="img-responsive img-inner <?php echo $bem_block . '__img-part__img'; ?>">
        </div>
        <?php endif;
        if( $image_r ) : ?>
        <div class="col-12 col-md-6 col-lg-4 d-none d-md-flex order-3 order-md-2 order-lg-3 <?php echo $bem_block . '__img-part '; ?>">
          <img src="<?php echo $img_r_src; ?>" alt="<?php echo $img_r_alt; ?>" title="<?php echo $img_r_title; ?>" class="img-responsive img-inner <?php echo $bem_block . '__img-part__img'; ?>">
        </div>
        <?php endif;
        /* --- END ---*/
      endif; ?>
    </div>
  </div>
</section>

<?php 
unset($bem_block);
unset($bem_mod);
unset($first_col_class);
unset($second_col_class);
