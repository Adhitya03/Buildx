<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Buildx
 * @since 1.0.0
 */

get_header();
?>

	<div class="content-area">
		<div class="container">
			<div class="row">

				<div id="post-feed" class="col-12 col-md-8">

                    <h1 class="search-title"><?php esc_html_e( 'Search Result For : ', 'buildx' ); echo get_search_query(); ?></h1>
                    <hr class="search-line" />
					<?php
					//if there are any post
					if( have_posts() ):
						//while have post, show them post to us
						while( have_posts() ): the_post();

							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						buildx_the_posts_navigation();

					else:

						get_template_part( 'template-parts/content', 'none' );

                    endif;

                    ?>

				</div>

				<div id="sidebar" class="col-12 col-md-4 sidebar">
					<?php get_sidebar(); ?>
				</div>

			</div>
		</div>
	</div>

<?php get_footer(); ?>