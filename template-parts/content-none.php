<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EXPIRED_N_FABULOUS
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="notFound-title"><?php esc_html_e( 'Nothing Found', 'fabulous' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if (is_search() ) :
			?>

			<p class="notFound"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fabulous' ); ?></p>
			<?php

		else :
			?>

			<p class="notFound"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fabulous' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
