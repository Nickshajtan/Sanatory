<?php
/*
 * Including addresses, phones & emails info
 *
 *
 */

$phones      = hcc_get_option_field( 'options_phone_nums', 
    array(
      'phone_num' => 'text-type',
    ), 
false );
$emails      = hcc_get_option_field( 'options_emails', 
    array(
      'email' => 'text-type',
    ), 
false );
$addresses   = hcc_get_option_field( 'options_addresses', 
    array(
      'adress' => 'text-type',
      'g_href' => 'text-type',
    ), 
false );

$phones_check    = get_option('options_phones_display');
$emails_check    = get_option('options_emails_display');
$addresses_check = get_option('options_addresses_display');

$phones_display    = ( is_array( $phones_check ) && in_array('footer', $phones_check ) )    ? true : false; 
$emails_display    = ( is_array( $emails_check ) && in_array('footer', $emails_check ) )    ? true : false; 
$addresses_display = ( is_array( $addresses_check ) && in_array('footer', $addresses_check ) ) ? true : false; 

if( $phones && !empty( $phones ) && $phones_display || 
    $emails && !empty( $phones ) && $emails_display || 
    $addresses && !empty( $addresses ) && $addresses_display ) : ?>
                      <div class="site-footer__middle">
                        <div class="container-fluid site-container">
                          <div class="row d-flex align-items-center">
                           <?php if( $phones && is_array( $phones ) ) : ?>
                              <div class="col-12 col-md-6  col-lg-4 order-1 site-footer__footer-block">
                                  <div class="w-100 phones">
                                          <?php foreach( $phones as $phone ) : ?>
                                              <?php $tel  = sanitize_text_field( trim( $phone['phone_num'] ) );
                                                    $href = preg_replace( '~[^0-9]+~', '', $tel ); 
                                                    $icon_path  = '/assets/public/img/icons/proto-telephone.svg';
                                                    $icon_src   = hcc_isset_img( dirname(__FILE__), '../..', $icon_path );
                                              if( !empty( $tel ) ) : ?>
                                                  <a href="tel:<?php echo $href; ?>" class="d-flex align-items-center justify-content-center ml-auto link_el">
                                                      <?php if( $icon_src !== false ) : ?>
                                                        <img src="<?php echo $icon_src; ?>" alt="<?php echo __('Phone icon'); ?>" title="<?php echo __('Phone icon') . '|' . SITE_NAME; ?>" class="icon">
                                                      <?php endif; ?>
                                                      <span class="body"><?php echo $tel; ?></span>
                                                  </a>
                                              <?php endif; ?>
                                          <?php endforeach; ?>
                                  </div>
                              </div>
                            <?php endif;
                            if( $emails && is_array( $emails ) ) : ?>
                            <div class="col-12 col-md-6  col-lg-4 order-2 site-footer__footer-block">
                                <div class="w-100 emails">
                                          <?php foreach( $emails as $email ) : ?>
                                              <?php $email = wp_kses_post( trim( $email['email'] ) ); 
                                                    $icon_path  = '/assets/public/img/icons/proto-mail.svg';
                                                    $icon_src   = hcc_isset_img( dirname(__FILE__), '../..', $icon_path );
                                              if( !empty( $email ) ) : ?>
                                                  <a href="mailto:<?php echo $email; ?>" class="d-flex align-items-center justify-content-center ml-auto link_el">
                                                      <?php if( $icon_src !== false ) : ?>
                                                          <img src="<?php echo $icon_src; ?>" alt="<?php echo __('Mail icon'); ?>" title="<?php echo __('Mail icon') . '|' . SITE_NAME; ?>" class="icon">
                                                      <?php endif; ?>
                                                      <span class="body"><?php echo $email; ?></span>
                                                  </a>
                                              <?php endif; ?>
                                          <?php endforeach; ?>
                                </div> 
                            </div>
                            <?php endif;
                            if( $addresses && is_array( $addresses ) ) : ?>
                              <adress class="col-12 col-md-12 col-lg-4 order-3 site-footer__footer-block">
                                        <div class="w-100 addresses d-block d-md-flex flex-md-column d-lg-block">
                                            <?php foreach( $addresses as $adres ) : ?>
                                                <?php $adress = wp_kses_post( trim( $adres['adress'] ) );
                                                $href = esc_url( wp_kses_post( trim( $adres['g_href'] ) ) ); 
                                                $icon_path  = '/assets/public/img/icons/location-64.png';
                                                $icon_src   = hcc_isset_img( dirname(__FILE__), '../..', $icon_path );
                                                if( !empty( $adress ) ) : ?>
                                                    <a href="<?php echo ( !empty( $href )  ) ? $href : '#'; ?>" target="_blank" rel="nofollow" class="d-flex align-items-center justify-content-center ml-auto link_el">
                                                        <?php if( $icon_src !== false ) : ?>
                                                          <img src="<?php echo $icon_src; ?>" alt="<?php echo __('Geo icon'); ?>" title="<?php echo __('Geo icon') . '|' . SITE_NAME; ?>" class="icon">
                                                      <?php endif; ?>
                                                      <span class="body"><?php echo $adress; ?></span>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                              </adress>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
<?php endif; 

unset( $phones_check );
unset( $emails_check );
unset( $addresses_check );

?>
