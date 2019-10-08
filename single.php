<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Buildx
 * @since 1.0.0
 */


get_header();
?>

<div id="single-post">
    <div class="col-12 content-area">

        <?php
        /* Start the Loop */
        while ( have_posts() ) :

            the_post();
            get_template_part( 'template-parts/content', 'single' );

        ?>

            <div class="container">
                <div class="row buildx_pagenation"">

                    <?php

                    buildx_the_posts_navigation();

                    if( comments_open() || get_comments_number() ):
                        comments_template();
                    endif;

                    ?>

                </div>
            </div>

        <?php endwhile; ?>

    </div>
</div>

<?php get_footer(); ?>
