<?php
/**
 * Template part for displaying post pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildx
 * @since 1.0.0
 */

global $buildx_thumbnail_url;
?>

<article class="col-12">

    <div class="page-title text-center">

        <?php if( has_post_thumbnail() ): ?>
        <div class="featured-image-page text-white" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('<?php echo $buildx_thumbnail_url ?>') no-repeat; background-position: center; background-size: cover;">
        <?php else: ?>
        <div class="featured-image-page text-dark">
        <?php endif; ?>

            <?php the_title( '<h1>', '</h1>' ); ?>
            <div class="page-meta"><?php esc_html_e( 'Written by ', 'buildx' ); echo get_the_author_link(); esc_html_e( ' on ', 'buildx' ); echo get_the_date(); ?></div>
        </div>

    </div>

    <div class="container">

		<div class="row">
			<div class="col-12">
				<?php

                the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'buildx' ),
					'after'  => '</div>',
				) );

                ?>
			</div>
		</div>

	</div>

</article>