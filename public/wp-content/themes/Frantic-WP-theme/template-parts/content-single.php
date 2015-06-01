<?php
/**
 * Template used for displaying content in single.php
 *
 * @package _frc
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php get_template_part( 'partials/partial', 'entry-header' ); ?>
		</header>

		<?php if ( has_post_thumbnail() ) get_template_part( 'partials/partial', 'entry-thumbnail' ); ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', '_frc' ) . '</span>',
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after' => '</span>'
				) );
			?>
		</div>

		<footer class="entry-footer">
			<?php theme_entry_footer(); ?>
		</footer>

	</article>
