<?php
/*
 * Apply shortcode
 *
 */

$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'); 
$output_id    = (!empty( $id )) ? $id : $blockname . '-' . $block_id_str; 
$output_class = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_section  = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section';

if( function_exists('apply_shortcode') || function_exists('do_shortcode') ) : ?>

<section id="<?php echo $output_id; ?>" class="<?php echo $output_class . ' ' . $bem_section; ?>">
  <div class="container-fluid">
    <div class="row-fluid">
      <?php if( function_exists('apply_shortcode') ) {
              apply_shortcode( $shortcode );
            }
            else {
              do_shortcode( $shortcode );
            }
      ?>
    </div>
  </div>
</section>

<?php endif; 
