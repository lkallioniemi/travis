<?php
/**
 * Partial template displaying a post thumbnail
 */
?>

	<?php if ( ! is_singular() ) : ?>

		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>

	<?php else : ?>

		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>

	<?php endif; ?>