<?php
/*
 *The template used for displaying post page which using Front Page Template
 *
 * @package Buildx
 * @since 1.1.3
 */
?>
    <article class="col-12">
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