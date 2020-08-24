<?php
/*
 * Flexible block with Google map
 * 
 *
 */

$blockname = 'map';
$block_id  = $blockname . '-flexible';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$title     = hcc_get_acf_header( 'title text-left' );

$key       = get_field( 'google_key', 'options' );
if( !empty( $key ) ) {
  get_template_part('template-parts/google-map/google_map', 'many_maps'); // google API map render
}
else {
  $map = get_sub_field('map_html');
}

if( !empty( $map ) ) : 
/*
 * Map html render
 *
 */

$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
$output_id    = (!empty( $id )) ? $id : $blockname . '-' . $block_id_str; 
$output_class = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_section  = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section'; ?>

<section id="<?php echo $output_id; ?>" class="<?php echo $output_class . ' ' . $bem_section; ?> p-0">
  <?php if( $title !== false ) : ?>
    <div class="container">
      <div class="row">
        <?php echo $title; ?>
      </div>
    </div>
  <?php endif; ?>
   
  <div class="container-fluid p-0 m-0">
    <div class="row-fluid p-0 m-0">
      <?php echo $map; ?>
    </div>
  </div>
</section>

<?php endif;


