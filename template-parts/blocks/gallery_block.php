<?php
/*
 * Gutenberg block with Gallery
 *
 */

$blockname = 'gallery_block';
$blockname = str_replace('_', '-', $blockname);
$block     = get_field('gallery');
$title     = hcc_get_acf_title( $block, 'title text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-center');
$text      = wp_kses_post( $block['text'] );
$gallery   = $block['gallery'];

$link      = $block['btn'];
$link_url  = ( $link ) ? esc_url( $link['url'] ) : '';
$link_ttl  = ( $link ) ? esc_html( $link['title'] ) : '';
$link_trg  = ( $link && $link['target'] ) ? esc_attr( $link['target'] ) : '_self';

$video      = $block['video'];
$video_src  = ( $video ) ? esc_url( $video['url'] ) : '';
$video_name = ( $video ) ? esc_html( $video['filename'] ) : '';

$blockName = 'gallery_block';
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

if( !empty( $block ) ) {
  @include( wp_normalize_path(__DIR__ .'/../output/gallery-render.php'));
}
