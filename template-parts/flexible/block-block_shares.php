<?php
/*
 * Flexible block with shares cpt cycle
 *
 */

$blockname = 'shares';
$block_id  = $blockname . '-flexible';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_sub_field('shares');

$title     = hcc_get_acf_title( $block, 'title text-white text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-white text-center');

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
