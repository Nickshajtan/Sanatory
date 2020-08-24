<?php
/*
 * Gutenberg block with Left text postion
 *
 */

$blockname = 'text_block';
$class_mod = '_right-position';
$block_id  = $blockname . '-block';
$block     = get_field('content_right_block');
$title     = hcc_get_acf_title( $block, 'title text-right' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-left');
$content   = wp_kses_post($block['text']);
$image     = $block['image'];
$img_alt   = ( is_array( $image ) ) ? esc_attr( $image['alt'] )   : '';
$img_title = ( is_array( $image ) ) ? esc_attr( $image['title'] ) : '';
$img_src   = ( is_array( $image ) ) ? esc_url( $image['url'] )    : esc_url( $image );
$img_src   = aq_resize( $img_src, 680, 500, true, true, true);

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

if( is_array( $block ) && !is_null( $block ) ) {
  @include( wp_normalize_path(__DIR__ . "/../output/$blockname-render.php"));
}
