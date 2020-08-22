<?php 
/*
 * Render for table
 *
 *
 */

$block_id_str = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
$output_id    = (!empty( $id )) ? $id : $blockname . '-' . $block_id_str; 
$output_class = ( !empty( $className ) ) ? $className : $blockname . '-' . $block_id;
$bem_section  = ( !empty( $blockname ) ) ? $blockname . '-section': $blockName  . '-section'; ?>

<section id="<?php echo $output_id; ?>" class="<?php echo $output_class . ' ' . $bem_section; ?>">
  <div class="container">
    <?php if( !empty( $title ) || !empty( $subtitle ) ) : ?>
      <div class="row">
        <?php if( !empty( $title ) ) : ?>
          <div class="col-12 <?php echo $bem_section . ' ' . '__title'; ?>">
            <?php echo $title; ?>
          </div>
        <?php endif; 
        if( !empty( $title ) ) : ?>
          <div class="col-12 <?php echo $bem_section . ' ' . '__subtitle'; ?>">
            <?php echo $subtitle; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif;
    if( !empty( $table ) ) : 
      $caption = $table['caption'];
      $header  = $table['header'];
      $body    = $table['body'];
    ?>
    <div class="row <?php echo $bem_section . ' ' . '__table'; ?> table-responsive-lg">
      <table class="col-12 table table-borded table-hover table-responsive-lg">
       <?php if( !empty( $caption ) ) : ?>
          <caption><?php echo $caption; ?></caption>
       <?php endif;
       if( !empty( $header ) ) : ?>
        <thead class="thead-dark">
          <tr>
            <?php foreach( $header as $th ) :
 
                        echo '<th>';
                            echo $th['c'];
                        echo '</th>';
            
            endforeach; ?>
          </tr>
        </thead>
        <?php endif; 
        if( !empty( $body ) ) : ?>
        <tbody>
          <?php $counter = 1;
          foreach( $body as $tr ) : 
          
            echo '<tr>';
              echo '<th scope="row">' . $counter . '</th>';
              foreach( $tr as $td ) :
 
                        echo '<td>';
                            echo $td['c'];
                        echo '</td>';
          
              endforeach;
            echo '</tr>';
          
          $counter++; 
          endforeach; ?>
        </tbody>
        <?php endif; ?>
      </table>
    </div>
    <?php endif; 
      unset( $caption ); 
      unset( $header ); 
      unset( $body ); 
    ?>
  </div>
</section>