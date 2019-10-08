<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Buildx
 * @since 1.0.0
 */

?>

	<footer>
        <div id="footer-widgets">
            <div class="container">
                <div class="row">
                    <?php get_template_part( 'template-parts/footer', 'widgets' ); ?>
                </div>
            </div>
        </div>
        <div id="footer-copyright">
             <div class="container">
                 <div class="row">

                     <div class="col-12 col-md-6 text-left copyright">
                         <?php
                         echo sprintf(
                                /* translators: %s: WordPress url.*/
	                         __( 'All rights reserved. Powered by <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'buildx' ), 'https://www.wordpress.org'
                         );
                         ?>
                     </div>

                     <div class="col-12 col-md-6 text-right footer-menu">
                        <?php wp_nav_menu( array(
	                        'theme_location'    => 'footer_menu',
	                        'depth'             => 1,
	                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
	                        'walker'            => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>
                     </div>

                 </div>
             </div>
        </div>
    </footer>
	<?php wp_footer(); ?>
</body>
</html>