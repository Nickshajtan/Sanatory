<?php
/*
 * Gutenberg block with reviews cpt cycle
 *
 */

$blockname = 'slider';
$block_id  = $blockname . '-block';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_sub_field('slider');

$blockName = 'slider';
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

$title     = hcc_get_acf_title( $block, 'title text-white text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-white text-center');

$args = array(
                'post_type'        => 'Slider',
                'orderby'          => 'status',
                'order'            => 'ASC',
);
global $post;
$tmp_post = $post; 
$slides   = get_posts( $args );

if( $block ) :
  @include( wp_normalize_path(__DIR__ .'/../output/slider-render.php'));
endif;
