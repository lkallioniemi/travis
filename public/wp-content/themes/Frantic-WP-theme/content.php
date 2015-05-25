<?php
/**
 * Template for displaying content
 *
 * (Default render for search results)
 *
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <div class="entry-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>

        <?php if ( is_single() ) : ?>
            <h2 class="entry-title"><?php the_title(); ?></h2>
        <?php else : ?>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php endif; // is_single() ?>

    </header><!-- .entry-header -->

    <?php if ( is_search() ) : // Only display Excerpts for Search ?>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

    <?php else : ?>

        <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'frantic' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
        </div><!-- .entry-content -->

    <?php endif; ?>

    <?php /*  if ( comments_open() && ! is_single() ) : ?>

        <section id="comments" class="hentry-comments">

            <?php comments_template(); ?>

        </section>

    <?php endif; */ ?>

</article><!-- #post -->