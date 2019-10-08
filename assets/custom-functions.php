<?php
function buildx_readmore( $id ){
	$taglist = get_the_tag_list( '<span class="fas fa-tags"></span>&nbsp;', ', ', '', $id );
	$readmore = '<span class="post-tags clearfix">'.$taglist.'<a class="moretag" href="'. get_permalink($id) . '">'.__( 'READ MORE', 'buildx' ).'</a></span>';
	return wp_kses(
		    $readmore,
            array(
                'span' => array(
                    'class' => array()
                ),
                'a' => array(
                    'href' => array(),
                    'class' => array(),
                    'rel' => array()
                )
            )
    );
}

function buildx_featured_image($post_id, $size){
	//if the post has a featured image
	if( has_post_thumbnail() ){
		$featured_image_blog = get_the_post_thumbnail( $post_id, $size );
		//if the post doesn't has a featured image
	}else{
		$args = array(
			'post_type'   => 'attachment',
			'numberposts' => 1,
			'post_mime_type' => 'image',
			'post_parent' => $post_id
		);
		$attachment = get_children( $args );
		//if the post has an uploaded or inserted image to the post
		if( !empty( $attachment ) ){
			$rekeyed_array = array_values( $attachment );
			$child_image   = $rekeyed_array[0];
			$featured_image_blog = wp_get_attachment_image( $child_image->ID,$size );
			//if the post doesn't has any uploaded or inserted images, continue to check an embedded image
		}else{
			$the_post = get_post($post_id);
			$content = $the_post->post_content;
			$imagefound = '';
			//if the post doesn't have any content
			if( !empty($content) ){
				$regex = '/< *img[^>]*src *= *["\']?([^"\']*)/i';
				preg_match( $regex, $content, $matches );
				if( !empty( $matches[1] ) ){
	                // reversing the matches array
	                $imagefound = $matches[1];
                }
			}
			//if the post has an embedded image
			if( !empty( $imagefound ) ){
				$featured_image_blog = '<img src="'.$imagefound.'" />';
				//ig the post doen't has any image
			}else{
				$featured_image_blog = '<img src="'. get_template_directory_uri() .'/assets/img/noimage.jpg" alt="no image avaiable"/>';
			}
		}
	}
	return wp_kses(
		$featured_image_blog,
		array(
			'img' => array(
				'width' => array(),
				'height' => array(),
				'src' => array(),
				'class' => array(),
				'alt' => array(),
				'srcset' => array(),
				'sizes' => array()
			)
		)
	);
}

if ( ! file_exists( get_template_directory() . '/assets/bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the bootstrap-navwalker.php file may be missing.', 'buildx' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/assets/bootstrap-navwalker.php';
}


function buildx_the_posts_navigation(){

	if( is_home() || is_archive() ){
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<div class="row buildx_pagenation">
			<div class="col-md-6 text-left"><?php previous_posts_link(); ?></div>
			<div class="col-md-6 text-right"><?php next_posts_link(); ?></div>
		</div>
		<?php
	}elseif( is_search() ){
		the_posts_pagination(array(
			'prev_text' => '&#xAB;',
			'next_text' => '&#xBB;'
		));
	}else{
		?>
            <div class="col-12 col-md-6 text-left mb-5"><?php next_post_link( "&laquo; %link" ) ?></div>
            <div class="col-12 col-md-6 text-right mb-5"><?php previous_post_link( "%link &raquo;" ) ?></div>
		<?php
	}

}

function buildx_load_dynamic_script(){

	$buildx_heading_color = empty( get_theme_mod( 'buildx_heading_color' ) ) ? '#f9b701' : esc_attr( get_theme_mod( 'buildx_heading_color' ) );
	$buildx_heading_hover_color = empty( get_theme_mod( 'buildx_heading_hover_color' ) ) ? '#f9b701' : esc_attr( get_theme_mod( 'buildx_heading_hover_color' ) );
	$buildx_text_color = empty( get_theme_mod( 'buildx_text_color' ) ) ? '#595b59' : esc_attr( get_theme_mod( 'buildx_text_color' ) );
	$buildx_link_color = empty( get_theme_mod( 'buildx_link_color' ) ) ? '#303842' : esc_attr( get_theme_mod( 'buildx_link_color' ) );
	$buildx_link_hover_color = empty( get_theme_mod( 'buildx_link_hover_color' ) ) ? '#f9b701' : esc_attr( get_theme_mod( 'buildx_link_hover_color' ) );
	$buildx_icon_color = empty( get_theme_mod( 'buildx_icon_color' ) ) ? '#7c81a0' : esc_attr( get_theme_mod( 'buildx_icon_color' ) );
	$buildx_footer_background_color = empty( get_theme_mod( 'buildx_footer_background_color' ) ) ? '#252d3a' : esc_attr( get_theme_mod( 'buildx_footer_background_color' ) );
	$buildx_footer_color = empty( get_theme_mod( 'buildx_footer_color' ) ) ? '#ffffff' : esc_attr( get_theme_mod( 'buildx_footer_color' ) );
	// all color use !important to overide bootstrap color style
	$buildx_color_css = '
		.moretag, .post-meta a, .post-tags a, #sidebar .widget-title,.post-line:before, .post-title a, .site-name, .buildx_pagenation a, .page-links a, .nav-links a, .copyright a{ color: '.$buildx_heading_color.' !important; }
		.moretag{ border: 1px '.$buildx_heading_color.' solid; }
		.moretag:hover, #sidebar .btn{border-color: '.$buildx_heading_color.'; background: '.$buildx_heading_color.' !important;}
		.moretag:hover, a:hover, .post-title a:hover, .buildx_pagenation a:hover, .page-links a:hover, .nav-links a:hover{ color: '.$buildx_heading_hover_color.' !important;} 
		body p,.post-tags, .post-meta{ color: '.$buildx_text_color.' !important;}
		#sidebar, #sidebar a, .main-menu ul li a{ color: '.$buildx_link_color.' !important;}
		footer .widget-wrapper ul li a:hover, #sidebar a:hover,
		.main-menu ul li a:hover, .main-menu ul li.current-menu-item a, .active{ color: '.$buildx_link_hover_color.' !important;}
		.post-tags span, .post-meta span{ color: '.$buildx_icon_color.' !important; }
		#footer-widgets{ background: '.$buildx_footer_background_color.' !important;  }
		footer .widget-wrapper ul li a, footer, footer p, .footer-menu ul li a{ color: '.$buildx_footer_color.' !important}
	';
	wp_register_style( 'buildx-custom-style', false );
	wp_enqueue_style( 'buildx-custom-style' );
	wp_add_inline_style( 'buildx-custom-style', $buildx_color_css );


	$buildx_fitvids = 'jQuery(document).ready(function(){jQuery(".is-type-video").fitVids({ customSelector: "iframe[src^=\'https://videopress.com\'], iframe[src^=\'http://videopress.com\']"})});';
	wp_register_script( 'fitvids-js-footer', false );
	wp_enqueue_script( 'fitvids-js-footer', false, array('jquery'), '1.0.0', true );
	wp_add_inline_script( 'fitvids-js-footer', $buildx_fitvids);

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'buildx_load_dynamic_script' );
?>