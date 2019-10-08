<?php
/**
 * The template for displaying all page posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package Buildx
 * @since 1.0.0
 */

get_header();
$buildx_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
?>

<div id="page" class="content-area">

	<?php
	/* Start the Loop */
	while ( have_posts() ) :

		the_post();
        get_template_part( 'template-parts/content', 'page' );

	endwhile;
	?>

</div>

<?php get_footer(); ?>
