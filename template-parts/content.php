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
    <div class="post-item">
        <header class="entry-header">

                <?php echo buildx_featured_image( get_the_ID(), 'buildx-blog-image' ) ?>

                <div class="post-title">

                    <?php the_title( '<h2><a href="'.esc_url( get_permalink() ).'">','</a></h2>' ) ?><hr />
                    <div class="post-author"><?php esc_html_e( 'WRITTEN BY ', 'buildx' ); ?><?php echo get_the_author_posts_link(); ?></div>

                </div>

        </header>

        <div class="entry-content">

            <div class="post-meta">

                <span class="fas fa-calendar-alt"></span>&nbsp;<?php echo get_the_date(); ?> <i></i>
                <span class="fas fa-folder-open"></span>&nbsp;<?php echo the_category('<span class="meta-dots"> &#x2022; </span>'); ?> <i></i>

            </div>

            <p><?php echo get_the_excerpt(); ?></p>

            <?php echo buildx_readmore( get_the_ID() ); ?>

        </div>

    </div>
</article>
<hr class="post-line" />

