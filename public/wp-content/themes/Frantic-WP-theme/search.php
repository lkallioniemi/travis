<?php
/**
 * Template for displaying Search Results pages
 */

get_header(); ?>

    <div class="l-constrained">

        <div role="main" class="l-main">

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'frantic' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to overload this in a child theme then include a file
                         * called content-___.php (where ___ is the Post Format name) and that
                         * will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );
                    ?>

                <?php endwhile; ?>

            <?php else : ?>

                <article id="post-0" class="post success no-results not-found">
                    <header class="entry-header">
                        <h2 class="entry-title"><?php _e( 'Nothing Found', 'frantic' ); ?></h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'frantic' ); ?></p>
                    </div><!-- .entry-content -->
                </article><!-- #post-0 -->

            <?php endif; ?>

</div><!-- end main -->

        <aside role="complementary" class="l-complementary">



        </aside><!-- end complementary -->

    </div><!-- end content -->

<?php get_footer(); ?>