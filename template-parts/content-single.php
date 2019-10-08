<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildx
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header id="post-header" class="row">

		<div class="col-12 col-md-6 col-lg-4 post-title">

			<div class="post-category"><?php echo the_category(', '); ?></div>
			<?php the_title( '<h1>', '</h1>' ); ?>
			<div class="post-meta"><?php esc_html_e( 'Written By ', 'buildx' ); echo get_the_author_link(); esc_html_e( ' on ', 'buildx' ); echo get_the_date(); ?></div>

		</div>

		<div class="col-12 col-md-6 col-lg-8 post-featured-image"><?php echo buildx_featured_image(get_the_ID(), 'large'); ?></div>

	</header>

	<div id="post-content" class="container">
		<div class="row">
			<div class="col-12">

				<?php

                the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'buildx' ),
					'after'  => '</div>',
				) );

				?>

                <div class="clearfix"></div><!--to clear floats at the bottom of content-->

                <div class="post-meta">
                    <?php echo get_the_tag_list('<span class="fas fa-tags"></span>&nbsp;', ', ', '', $post->ID); ?>
                </div>

			</div>
		</div>
	</div>

</article>
