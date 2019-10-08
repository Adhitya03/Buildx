<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildx
 * @since 1.0.0
 */

get_header();
?>

    <section id="primary" class="content-area">
        <div class="container">
            <div class="row">

                <main id="post-feed" class="col-12 col-md-8">

                    <?php
                    //if there are any post
                    if( have_posts() ){
                        //while have post, show them post to us
                        while( have_posts() ) {

                            the_post();
                            get_template_part( 'template-parts/content' );

                        }

	                    // Previous/next page navigation.
	                    buildx_the_posts_navigation();

                    }else{

                        get_template_part( 'template-parts/content', 'none' );

                    }
                    ?>

                </main>

                <div id="sidebar" class="col-12 col-md-4">
                    <?php get_sidebar(); ?>
                </div>

            </div>
        </div>
    </section>

<?php get_footer(); ?>