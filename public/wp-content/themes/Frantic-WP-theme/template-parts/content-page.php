<?php
/**
 * Template used for displaying page content in page.php
 *
 * @package _frc
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php get_template_part( 'partials/partial', 'entry-header' ); ?>
		</header>

		<div class="entry-content">
			<?php the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_frc' ),
					'after'  => '</div>',
				) ); ?>
		</div>

		<footer class="entry-footer">
			<?php theme_entry_footer(); ?>
		</footer>

	</article>
