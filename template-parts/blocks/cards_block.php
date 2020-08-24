<?php
/*
 * Gutenberg block with cards
 *
 */

$blockname = 'cards_block';
$block_id  = $blockname . '-block';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_field('cards_block');
$title     = hcc_get_acf_title( $block, 'title text-left' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-center');
$text      = wp_kses_post( $block['text'] );
$columns   = trim( $block['columns'] );
$cycle     = $block['cycle'];

$blockName = 'cards_block';
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
  @include( wp_normalize_path(__DIR__ .'/../output/cards-render.php'));
}
