<?php
/*
 * Flexible block with shares cpt cycle
 *
 */

$blockname = 'shares';
$block_id  = $blockname . '-block';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_field('shares_block');

$title     = hcc_get_acf_title( $block, 'title text-left' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-left');

$blockName = 'shares';
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

$args = array(
                'post_type'        => 'Shares',
                'orderby'          => 'status',
                'order'            => 'ASC',
);
global $post;
$tmp_post = $post;
$shares   = get_posts( $args );

if( $block ) :
  @include( wp_normalize_path(__DIR__ .'/../output/shares-render.php'));
endif;
