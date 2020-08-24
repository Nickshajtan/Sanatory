<?php
/*
 * Gutenberg block with table
 *
 */

$blockname = 'table';
$block_id  = $blockname . '-block';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_field('block_table');

$title     = hcc_get_acf_title( $block, 'title text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-center');
$table     = $block['table'];

if( $block ) :
  @include( wp_normalize_path(__DIR__ .'/../output/table-render.php'));
endif;
