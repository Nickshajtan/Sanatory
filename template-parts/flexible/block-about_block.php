<?php
/*
 * Flexible block about us
 *
 */

$blockname = 'about_block';
$block_id  = $blockname . '-flexible';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_sub_field('about_block');
$title     = hcc_get_acf_title( $block, 'title text-white text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-white text-center');
$text      = wp_kses_post( $block['text'] );
$cycle     = $block['cycle'];

if( !empty( $block ) ) {
  @include( wp_normalize_path(__DIR__ .'/../output/advantages.php'));
}
