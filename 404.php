<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Buildx
 * @since 1.0.0
 */

get_header();
?>

<div class="container mb-5">
	<div class="row">
		<div class="col-12 text-center">
			<div class="error-template">

				<h1><?php esc_html_e( 'Oops!', 'buildx' ); ?></h1>

				<h2><?php esc_html_e( '404 Not Found', 'buildx' ); ?></h2>

				<div class="error-details">
                    <?php esc_html_e( 'Sorry, an error has occured, Requested page not found!', 'buildx' ); ?>
				</div>

				<div class="error-actions">
					<a href="<?php echo esc_url( site_url() ); ?>" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-home"></span><?php esc_html_e( 'Take Me Home', 'buildx' ); ?></a>
				</div>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
