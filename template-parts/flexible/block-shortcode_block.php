<?php
/*
 * Flexible block with Shortcode applying
 *
 */

$blockname = 'contact_block';
$block     = get_sub_field('shortcode_block');
$title     = hcc_get_acf_title( $block, 'title text-white text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-white text-center');
$shortcode = trim( $block['shortcode'] );

if( !empty( $shortcode ) ) {
  @include( wp_normalize_path(__DIR__ .'/../output/shortcode.php'));
}
