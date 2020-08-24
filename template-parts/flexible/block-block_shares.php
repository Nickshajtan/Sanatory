<?php
/*
 * Flexible block with shares cpt cycle
 *
 */

$blockname = 'shares';
$block_id  = $blockname . '-flexible';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_sub_field('shares_block');

$title     = hcc_get_acf_title( $block, 'title text-left' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-left');

$args = array(
                'post_type'        => 'shares',
                'orderby'          => 'status',
                'order'            => 'ASC',
);
global $post;
$tmp_post = $post;
$shares   = get_posts( $args );

$id = null;

if( $block ) :
  @include( wp_normalize_path(__DIR__ .'/../output/shares-render.php'));
endif;
