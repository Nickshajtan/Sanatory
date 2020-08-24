<?php
/*
 * Flexible block with services
 *
 */

$blockname = 'cards_block';
$block_id  = $blockname . '-flexible';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_sub_field('cards_block');
$title     = hcc_get_acf_title( $block, 'title text-left' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-center');
$text      = wp_kses_post( $block['text'] );
$columns   = trim( $block['columns'] );
$cycle     = $block['cycle'];

$id = null;

if( !empty( $block ) ) {
  @include( wp_normalize_path(__DIR__ .'/../output/cards-render.php'));
}
