<?php
/* Register ACF blocks for gutenberg
* https://www.advancedcustomfields.com/resources/blocks/
* https://www.advancedcustomfields.com/resources/acf_register_block_type/
*/
if( function_exists('acf_register_block') || function_exists('acf_register_block_type') ) {
	add_action('init', 'hcc_register_acf_block_types');
}

function hcc_register_acf_block_types() {
        acf_register_block( 
		array(
			'name'						=> 'content_left_block',
			'title'						=> __('Content Left Block', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/content_left_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'content_center_block',
			'title'						=> __('Content Center Block', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/content_center_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'content_right_block',
			'title'						=> __('Content Right Block', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/content_right_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'services_block',
			'title'						=> __('Block Service', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/services_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'cards_block',
			'title'						=> __('Block Cards', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/cards_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'about_block',
			'title'						=> __('Block About', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/about_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'shortcode_block',
			'title'						=> __('Block Shortcode', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/shortcode_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'contact_block',
			'title'						=> __('Block Contact Form', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/contact_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'slider_block',
			'title'						=> __('Block Slider', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/slider_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'product_block',
			'title'						=> __('Block Products', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/product_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'shares_block',
			'title'						=> __('Block Shares', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/shares_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'reviews_block',
			'title'						=> __('Block Reviews', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/reviews_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'banner_block',
			'title'						=> __('Block Banner', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/banner_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'gallery_block',
			'title'						=> __('Block Gallery', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/banner_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        acf_register_block( 
		array(
			'name'						=> 'table_block',
			'title'						=> __('Block Table', 'hcc'),
			'description'			=> __('.','hcc'),
			'render_template'	=> 'template-parts/blocks/table_block.php', //source for rendering template
			'category'				=> 'acf-blocks',
			'icon'						=> 'format-status',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			// 'post_types'			=> array('post', 'page'),
		));
        
}

