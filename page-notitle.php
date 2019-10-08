<?php
/**
 *Template Name: Front Page template
 *
 *@package Buildx
 */

get_header();
?>

<div id="page" class="content-area">

	<?php
	/* Start the Loop */
	while ( have_posts() ) :

		the_post();
		get_template_part( 'template-parts/content', 'page-notitle' );

	endwhile;
	?>

</div>

<?php get_footer(); ?>
