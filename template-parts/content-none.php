<?php if ( is_home() || is_archive()) : ?>

	<p><?php esc_html_e( 'There is nothing yet to displayed!', 'buildx' ) ?></p>

<?php elseif ( is_search() ) : ?>

	<p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again with some different keywords.', 'buildx' ); ?></p>

<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'buildx' ); ?></p>

<?php endif; ?>