<?php 
/*
 * Theme supports
 *
 */
add_action( 'after_setup_theme', 'hcc_setup' );
if ( ! function_exists( 'hcc_setup' ) ) {
	function hcc_setup() {
		load_theme_textdomain( 'hcc', THEME . '/languages' );
        add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', array(
            'height'      => 57,
	        'width'       => 168,
			'flex-width'  => true,
			'flex-height' => true,
            'header-text' => '',
		) );
        
        if( version_compare('5.0.0', get_bloginfo('version'), '>=') ) {
          add_theme_support( 'align-wide' );
          add_theme_support( 'editor-styles' );
          add_theme_support( 'wp-block-styles' );
          add_theme_support( 'responsive-embeds' );
        }
    }
}

$woo = ( defined('WOO_SUPPORT') ) ? WOO_SUPPORT : is_plugin_active( 'woocommerce/woocommerce.php' );
if ( $woo ) {
    
    add_action( 'after_setup_theme', 'hcc_setup_woocommerce_support' );
}
function hcc_setup_woocommerce_support() {
    add_theme_support('woocommerce');
}
unset( $woo );

/**
 * Disable the confirmation notices when an administrator
 * changes their email address.
 *
 * @see http://codex.wordpress.com/Function_Reference/update_option_new_admin_email
 */
function wpdocs_update_option_new_admin_email( $old_value, $value ) {
    update_option( 'admin_email', $value );
}
add_action( 'add_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );
add_action( 'update_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );

/**
 * No slash in th end of URL
 *
 * @see http://codex.wordpress.com/Function_Reference/update_option_new_admin_email
 */
add_filter('user_trailingslashit', 'no_page_slash', 70, 2);
function no_page_slash( $string, $type ){
   global $wp_rewrite;
	if( $type == 'page' && $wp_rewrite->using_permalinks() && $wp_rewrite->use_trailing_slashes )
		$string = untrailingslashit($string);
   return $string;
}

/**
 * Is mobile device
 *
 */
function is_mobile(){
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	if(
		// add '|android|ipad|playbook|silk' for tablet detected
		@ preg_match(
			'/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i|android|ipad|playbook|silk',
			$useragent
		)
		||
		@ preg_match(
			'/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',
			substr($useragent,0,4)
		)
	)
		return true;
	return false;   
}

/**
 * This debug function show code names of admin pages
 *
 */
//add_action( 'admin_init', 'hcc_debug_admin_menu' );
function hcc_debug_admin_menu() {
    echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre><style>#adminmenuback{background:transparent!important}</style>';
    //echo '<pre>' . print_r( $GLOBALS[ 'submenu' ], TRUE) . '</pre><style>#adminmenuback{background:transparent!important}</style>';
}

/**
 * Disable file editors by role
 * 
 */
add_action('admin_init', 'hcc_disable_file_editors');
function hcc_disable_file_editors() {
    //for editors, etc.
    if ( ! current_user_can('manage_options') && !defined('DISALLOW_FILE_EDIT') ) {
        // Not disabling Yoast SEO file editors
        add_filter('current_screen', function($current_screen){
            if ( 'seo_page_wpseo_tools' != $current_screen->base && !defined('DISALLOW_FILE_EDIT') ){
                define( 'DISALLOW_FILE_EDIT', true );
            }
        }, 10, 2);
    }   
    // for autors, etc.
    if ( ! current_user_can('delete_others_posts') ) {
        define( 'DISALLOW_FILE_EDIT', true );
    }
}

/**
 * Remove admin pages
 *
 */
add_action( 'admin_menu', 'hcc_remove_menus', 999 );
function hcc_remove_menus(){
    if ( function_exists('remove_menu_page') ) {
        if( is_user_logged_in() && !current_user_can('manage_options') ){
            /** CPTui plugin page **/
            remove_menu_page( 'cptui_main_menu' );
            /** ACF groups menu page **/
            remove_menu_page( 'edit.php?post_type=acf-field-group' );
        }
        if( is_user_logged_in() && !current_user_can('edit_pages') ){
            /** Comments **/
            remove_menu_page( 'edit-comments.php' );
            /** Users **/
            remove_menu_page( 'users.php' );
            /** Contact form 7 **/
            remove_menu_page('wpcf7');
        }
        if( is_user_logged_in() && !current_user_can('edit_posts') ){
            /** Smush page **/
            remove_menu_page( 'smush' );
        }
        /** Post pages **/
        //remove_menu_page( 'edit.php' );
    }
    if ( function_exists('remove_submenu_page') ) {
      if( !current_user_can('manage_options') ) {
          /** Plugin Editor Menu subpage **/
          remove_submenu_page('themes.php','theme-editor.php');
          /** Theme Editor Menu subpage **/
          remove_submenu_page('plugins.php','plugin-editor.php'); 
          /** Media files options **/
          remove_submenu_page('options-general.php','options-media.php');
      }
    }
}

/**
 * Remove toolbar items
 * https://digwp.com/2016/06/remove-toolbar-items/
 */
$customizing = ( defined( 'SITE_CUSTOMIZE' ) ) ? SITE_CUSTOMIZE : get_option('hcc-theme-wp-customizing'); 
if( !$customizing ) {
  add_action('admin_bar_menu', 'hcc_remove_toolbar_nodes', 999);
}

function hcc_remove_toolbar_nodes($wp_admin_bar) {
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('customize');
	$wp_admin_bar->remove_node('customize-background');
	$wp_admin_bar->remove_node('customize-header');
}

/**
 * No robots for site pages
 *
 */
add_action('wp_head', 'hcc_meta_robots');
function hcc_meta_robots () {
    if ( !is_page() && !is_attachment() && !is_single() ){
        echo "".'<meta name="robots" content="noindex,nofollow" />'."\n";
    } 
}

/**
 * Set default thumbnail for empty post thumbnail
 *
 * @param string/int $ post_id
 *
 */

add_action( 'save_post', 'hcc_default_thumbnail' );
function hcc_default_thumbnail( $post_id ){
    $post_thumbnail = get_post_thumbnail_id( $post_id );
    if ( is_admin() && !wp_is_post_revision( $post_id ) ) {
        if ( empty( $post_thumbnail ) ) {
          
             $old_saved = get_page_by_title( 'Default thumbnail', 'ARRAY_A', 'attachment' )['ID'];
          
             if( empty( $old_saved ) || is_null( $old_saved ) ) {
               $path     = ( defined( THEME_URI ) ) ? THEME_URI . '/assets/' : get_template_directory_uri() . '/assets/';
               $filename = wp_normalize_path( $path . 'wp-header-logo.png' );

               if( file_exists($filename) && filesize($filename) > 0 ){
                 $url = $filename;
               }
               else {
                 $default =  wp_get_attachment_image(2533);
                 if( empty( $default ) ){
                     $url = wp_normalize_path( 'http://s.w.org/style/images/wp-header-logo.png' );
                 }
                 else {
                     set_post_thumbnail( $post_id, 2533 );
                 }
               }

               $attach_id = media_sideload_image( $url, $post_id, 'Default thumbnail', 'id' );
             }
             else {
               $attach_id = $old_saved;
             }

             if( !empty( $attach_id ) ){
               set_post_thumbnail( $post_id, $attach_id );   
             }   
        }
    }
}   

/**
 * Rename posts labels. 
 * You be able to use this function to any post type with changing post_type in filter.
 * @param  object/array $ labels of posts
 * @return object of labels
 */
add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels( $labels ){
 
	$new = array(
		'name'                  => __('Номера', 'hcc'),
		'singular_name'         => __('Номер', 'hcc'),
		'add_new'               => __('Добавить номер', 'hcc'),
		'add_new_item'          => __('Добавить номер', 'hcc'),
		'edit_item'             => __('Редактировать номер', 'hcc'),
		'new_item'              => __('Новый номер', 'hcc'),
		'view_item'             => __('Смотреть', 'hcc'),
		'search_items'          => __('Искать среди номеров', 'hcc'),
		'not_found'             => __('Не найдено', 'hcc'),
		'not_found_in_trash'    => __('Не найдено в крозине', 'hcc'),
		'parent_item_colon'     => __('', 'hcc'),
		'all_items'             => __('Все номера', 'hcc'),
		'archives'              => __('Архивы номеров', 'hcc'),
		'insert_into_item'      => __('Вставить', 'hcc'),
		'uploaded_to_this_item' => __('Загрузить', 'hcc'),
		'featured_image'        => __('Миниатюра', 'hcc'),
		'filter_items_list'     => __('Фильтровать', 'hcc'),
		'items_list_navigation' => __('Навигация', 'hcc'),
		'items_list'            => __('Список номеров', 'hcc'),
		'menu_name'             => __('Номера', 'hcc'),
		'name_admin_bar'        => __('Номер', 'hcc'),
	);
 
	return (object)array_merge( (array)$labels, $new );
}

/**
 * disable scrset & sizes attributes for images
 *
 */
remove_filter( 'the_content', 'wp_make_content_images_responsive' );