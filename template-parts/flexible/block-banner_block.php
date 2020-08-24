<?php
/*
 * Flexible block with banner
 *
 */

$blockname = 'banner';
$block_id  = $blockname . '-flexible';
$block_id  = str_replace('_', '-', $block_id);
$blockname = str_replace('_', '-', $blockname);
$block     = get_sub_field('banner_block');

$title     = hcc_get_acf_title( $block, 'title text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-center');
$text      = wp_kses_post( $block['text'] );

//additional image
$image     = $block['image_ad'];
$img_alt   = ( is_array( $image ) ) ? esc_attr( $image['alt'] )   : '';
$img_title = ( is_array( $image ) ) ? esc_attr( $image['title'] ) : '';
$img_src   = ( is_array( $image ) ) ? esc_url( $image['url'] )    : esc_url( $image );
$img_src   = aq_resize( $img_src, 400, 400, true, true, true);

//link
$link      = $block['btn'];
$link_url  = ( $link ) ? esc_url( $link['url'] ) : '';
$link_ttl  = ( $link ) ? esc_html( $link['title'] ) : '';
$link_trg  = ( $link && $link['target'] ) ? esc_attr( $link['target'] ) : '_self';

//BG
$bg_type   = $block['bg'];
switch( $bg_type ) {
  case 'image' :
    $bg     = $block['image_bg'];
    $bg_url = ( is_array( $bg ) ) ? esc_url( $ibg['url'] )    : esc_url( $bg );
    break;
  case 'video' :
    $bg      = $block['video'];
    $bg_url  = ( $video ) ? esc_url( $video['url'] ) : '';
    $bg_name = ( $video ) ? esc_html( $video['filename'] ) : '';
    break;
  default:
    $bg     = $block['image_bg'];
    $bg_url = ( is_array( $bg ) ) ? esc_url( $ibg['url'] )    : esc_url( $bg );
}

//arrow
$arrow_visibility = ( $block['display_arrow'] === 'show' ) ? true : false;
$icon_path        = '/assets/public/img/icons/proto-arrow.svg';
$icon_src         = hcc_isset_img( dirname(__FILE__), '../..', $icon_path );

$bem_mode_height  = 'height_' . $block['block_height'];
$align            = $block['block_align'];
$bem_mode_align   = 'align_' . $align;

switch( $align ) {
  case 'left' :
    $align  = 'start';
    $dalign = 'end';
    break;
  case 'right' :
    $align  = 'end';
    $dalign = 'start';
    break;
  case 'center' :
    $align  = 'center';
    $dalign = 'center';
    break;
  default :
    $align  = 'start';
    $dalign = 'end';
    break;
}

if( $block ) :
  @include( wp_normalize_path(__DIR__ .'/../output/banner-render.php'));
endif;