<?php
/*
 * Flexible block with products cpt cycle
 *
 */

$blockname = 'reviews';
$block_id  = $blockname . '-block';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_sub_field('reviews');
$title     = hcc_get_acf_title( $block, 'title text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-center');
$link      = $block['btn'];

if( $link ){
  $link_url    = esc_url( $link['url'] );
  $link_title  = esc_html( $link['title'] );
  $link_target = $link['target'] ? esc_attr( $link['target'] ) : '_self';
}

$grid       = wp_kses_post( $block['columns'] );
if( $grid && count( $grid ) >= 1 ){
  $grid_set = 'grid-column-' . $grid;
}

$per_option = ( get_option('post_per_page') >= 1 ) ? get_option('post_per_page') : 4;
$per_page   = ( count( $block['posts'] ) >= 1 ) ? $block['posts'] : $per_option;
$per_page   = (int) $per_page;

if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} 
elseif ( get_query_var('page') ) {  
    $paged = get_query_var('page');
} 
else {
    $paged = 1;
}

$args = array(
                'numberposts'      => 0,
                'posts_per_page'   => $per_page ? $per_page : 4,
                'paged'            => $paged,
                'post_type'        => 'reviews',
                'orderby'          => 'status',
                'order'            => 'ASC',
                'suppress_filters' => true,
);

$id = null;

if( $block ) :
  @include( wp_normalize_path(__DIR__ .'/../output/cpt-render.php'));
endif;
