<?php
/*
 * Gallery block render
 *
 */

$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
$output_id    = (!empty( $id )) ? $id : $blockname . '-' . $block_id_str; 
$output_class = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_section  = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section';

// Pagination
if( get_query_var('page') ) {
  $page = get_query_var( 'page' );
} else {
  $page = 1;
}
$row    = 0; 
$images = ( !empty( $gallery ) ) ? $gallery : false;

if( $images ) {
  $total  = count( $images );
  $pages  = ceil( $total / $images_per_page );
  $min    = ( ( $page * $images_per_page ) - $images_per_page ) + 1;
  $max    = ( $min + $images_per_page ) - 1;
  $images_per_page = 4;
} ?>

<section id="<?php echo $output_id; ?>" class="<?php echo $output_class . ' ' . $bem_section; ?>">
  <div class="container-fluid">
    <div class="row-fluid d-flex justify-content-center flex-column">
      <?php if( !empty( $title ) ) : ?>
        <div class="col-12 text-center <?php echo $bem_section . '__title'; ?>"><?php echo $title; ?></div>
      <?php endif;
      if( !empty( $subtitle ) ) : ?>
        <div class="col-12 text-center <?php echo $bem_section . '__subtitle'; ?>"><?php echo $subtitle; ?></div>
      <?php endif;
      if( !empty( $text ) ) : ?>
        <div class="col-12 text-center <?php echo $bem_section . '__content'; ?>"><?php echo $text; ?></div>
      <?php endif;
      if( is_array( $gallery ) ) : ?>
        <ul class="<?php echo $bem_section . '__list'; ?> d-flex flex-wrap">
          <?php foreach( $gallery as $image_id ) : ?>
          <li class="col-12 col-md-6 col-lg-4 col-xl-3 p-0 m-0 d-block <?php echo $bem_section . '__list__item'; ?>">
            <a href="<?php echo wp_get_attachment_image_url( $image_id, 'large' ); ?>" data-fancybox="<?php echo $blockname; ?>" class="fancybox">
              <?php echo wp_get_attachment_image( $image_id, 'medium' ); ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php if( (boolean) $total !== false ) : ?>
        <div class="col-12 pagination justify-content-center align-items-center">
             <?php echo paginate_links( array(
                'base'    => get_permalink() . '%#%' . '/',
                'format'  => '?page=%#%',
                'current' => $page,
                'total'   => $pages
              ) );
              ?>
        </div>
       <?php endif; ?>
        
      <?php endif;
      if( !empty( $video ) && is_array( $video ) && !empty( $video_src ) ) : ?>
        <video class="col-12 p-0 m-0 <?php echo $bem_section . '__video'; ?>">
          <source src="<?php echo $video_src; ?>">
          <?php echo __('Тег video не поддерживается вашим браузером.', 'hcc'); ?>
          <a href="<?php echo $video_src; ?>"><?php echo __('Скачайте видео ' . $video_name, 'hcc'); ?></a>.
        </video>
      <?php endif;
      if( is_array( $link ) ) : ?>
        <div class="col-12 d-flex justify-content-center align-items-center <?php echo $bem_section . '__link'; ?>">
          <a href="<?php echo $link_url; ?>" class="button" target="<?php echo $link_trg; ?>"><?php echo $link_ttl; ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
