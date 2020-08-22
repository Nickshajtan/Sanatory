<?php
/*
 * Flexible block with Contact form
 *
 */

$blockname = 'contact_block';
$block     = get_sub_field('contact_block');
$title     = hcc_get_acf_title( $block, 'title text-white text-center' );
$subtitle  = hcc_get_acf_sub_title($block, 'subtitle text-white text-center');

@include( wp_normalize_path(__DIR__ .'/../form-custom-section.php'));
