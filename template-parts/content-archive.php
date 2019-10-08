<?php
/**
 * The template for displaying post archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildx
 * @since 1.0.0
 */
?>
<article <?php post_class(); ?>>
    <div class="post-item archive">

        <header class="entry-header">

            <?php echo buildx_featured_image( get_the_ID(), 'buildx-blog-image' ) ?>

            <div class="post-title">
                <?php the_title( '<h2><a href="'.esc_url( get_permalink() ) .'">', '</a></h2>' ); ?><hr />
            </div>

        </header>

        <div class="entry-content">

            <div class="post-meta">

                <span class="dashicons dashicons-calendar-alt"></span> <?php echo get_the_date(); ?> <i></i>
                <span class="dashicons dashicons-portfolio"></span> <?php echo the_category('<span class="meta-dots"> &#x2022; </span>'); ?> <i></i>

            </div>


            <p><?php echo get_the_excerpt(); ?></p>

            <?php echo buildx_readmore( get_the_ID() ); ?>

        </div>

    </div>
</article>
<hr class="post-line" />