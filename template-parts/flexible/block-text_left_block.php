<?php
/*
 * Flexible block with Left text postion
 *
 */

$blockname = 'text_block';
$class_mod = '_left-position';
$block_id  = $blockname . '-flexible';
$block     = get_sub_field('content_left_block');
$title     = hcc_get_acf_title( $block, 'title text-left' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-right');
$content   = wp_kses_post($block['text']);
$image     = $block['image'];
$img_alt   = ( is_array( $image ) ) ? esc_attr( $image['alt'] )   : '';
$img_title = ( is_array( $image ) ) ? esc_attr( $image['title'] ) : '';
$img_src   = ( is_array( $image ) ) ? esc_url( $image['url'] )    : esc_url( $image );
$img_src   = aq_resize( $img_src, 680, 500, true, true, true);

$id = null;

if( is_array( $block ) && !is_null( $block ) ) {
  @include( wp_normalize_path(__DIR__ . "/../output/$blockname-render.php"));
}
