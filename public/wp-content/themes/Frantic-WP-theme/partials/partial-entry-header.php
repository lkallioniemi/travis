<?php
/**
 * Partial template for displaying entry headers
 */
?>

	<?php if ( ! is_singular() ) : ?>

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( get_post_type() === 'post' ) : ?>

		<div class="entry-meta">
			<?php theme_posted_on(); ?>
		</div>

		<?php endif; ?>

	<?php else : ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( get_post_type() === 'post' ) : ?>

		<div class="entry-meta">
			<?php theme_posted_on(); ?>
		</div>

		<?php endif; ?>

	<?php endif; ?>
