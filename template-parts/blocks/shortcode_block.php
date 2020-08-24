<?php
/*
 * Gutenberg block with Shortcode applying
 *
 */

$blockname = 'shortcode_block';
$block     = get_field('shortcode_block');
$title     = hcc_get_acf_title( $block, 'title text-white text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-white text-center');
$shortcode = trim( $block['shortcode'] );

$blockName = 'shortcode_block';
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

if( !empty( $shortcode ) ) {
  @include( wp_normalize_path(__DIR__ .'/../output/shortcode-render.php'));
}
