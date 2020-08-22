<?php
/*
 * Gutenberg block with Center text postion
 *
 */

$blockname = 'text_block';
$class_mod = '_center-position';
$block_id  = $blockname . '-block';
$block     = get_field('content_center_block');
$title     = hcc_get_acf_title( $block, 'title text-white text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-white text-center');
$content   = wp_kses_post($block['text']);

$blockName = 'text_block';
// Create id attribute allowing for custom "anchor" value.
$id = $blockName.'-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = $blockName;
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$image_l     = $block['image_left'];
$img_l_alt   = ( is_array( $image_l ) ) ? esc_attr( $image_l['alt'] )   : '';
$img_l_title = ( is_array( $image_l ) ) ? esc_attr( $image_l['title'] ) : '';
$img_l_src   = ( is_array( $image_l ) ) ? esc_url(  $image_l['url'] )    : esc_url( $image_l );
$img_l_src   = aq_resize( $img_src, 680, 500, true, true, true);

$image_r     = $block['image_right'];
$img_r_alt   = ( is_array( $image_r ) ) ? esc_attr( $image_r['alt'] )   : '';
$img_r_title = ( is_array( $image_r ) ) ? esc_attr( $image_r['title'] ) : '';
$img_r_src   = ( is_array( $image_r ) ) ? esc_url(  $image_r['url'] )    : esc_url( $image_r );
$img_r_src   = aq_resize( $img_src, 680, 500, true, true, true);

if( is_array( $block ) && !is_null( $block ) ) {
  @include( wp_normalize_path(__DIR__ . "/../output/$blockname-render.php"));
}
