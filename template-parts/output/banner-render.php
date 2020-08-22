<?php
/*
 * Banner blocks render
 *
 */

$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
$output_id    = (!empty( $id )) ? $id : $blockname . '-' . $block_id_str; 
$output_class = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_section  = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section';

$bem_mode_height  = (!empty( $bem_mode_height ) ) ? $bem_mode_height : '';
$bem_mode_align   = (!empty( $bem_mode_align ) )  ? $bem_mode_align : ''; ?>

<section id="<?php echo $output_id; ?>" class="d-flex justify-content-center flex-column <?php echo $output_class . ' ' . $bem_section . ' ' .$bem_mode_height . ' ' . $bem_mode_align; ?>" <?php if( $bg_type === 'image' ) : ?> style="background-image: url('<?php echo $bg_url; ?>);"<?php endif; ?>>
  <div class="container-fluid">
    <div class="row-fluid d-flex align-items-center justify-content-<?php echo $align; ?>">
      <?php if( !empty( $title ) ) : ?>
        <div class="col-12 <?php echo $bem_section . '__title'; ?>">
          <?php echo $title; ?>
        </div>
      <?php endif; 
      if( !empty( $subtitle ) ) : ?>
        <div class="col-12 <?php echo $bem_section . '__subtitle'; ?>">
          <?php echo $subtitle; ?>
        </div>
      <?php endif;
      if( !empty( $content ) ) : ?>
        <div class="col-12 <?php echo $bem_section . '__content'; ?>">
          <?php echo $content; ?>
        </div>
      <?php endif;
      if( is_array( $image ) ) : ?>
        <div class="col-12 <?php echo $bem_section . '__img'; ?>">
          <img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>" class="img-inner img-responsive">
        </div>
      <?php endif;
      if( is_array( $image ) ) : ?>
        <div class="col-12 <?php echo $bem_section . '__link'; ?>">
          <a href="<?php echo $link_url; ?>" class="button" target="<?php echo $link_trg; ?>"><?php echo $link_ttl; ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php if( $bg_type === 'video' && is_array( $bg ) ) : ?>
        <video class="col-12 p-0 m-0 <?php echo $bem_section . '__video'; ?>">
          <source src="<?php echo $bg_url; ?>">
          <?php echo __('Тег video не поддерживается вашим браузером.', 'hcc'); ?>
        </video>
  <?php endif;
  if( $arrow_visibility ) : ?>
    <div class="w-100 p-absolute d-flex align-items-center justify-content-<?php echo $dalign; ?>">
      <?php if( $icon_src !== false ) : ?>
          <img src="<?php echo $icon_src; ?>" alt="" class="arrow-down">
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>
