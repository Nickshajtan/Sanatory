<?php
/*
 * Flexible block with table
 *
 */

$blockname = 'table';
$block_id  = $blockname . '-flexible';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_sub_field('block_table');

$title     = hcc_get_acf_title( $block, 'title text-white text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-white text-center');
$table     = $block['table'];

if( $block ) :
  @include( wp_normalize_path(__DIR__ .'/../output/table-render.php'));
endif;
