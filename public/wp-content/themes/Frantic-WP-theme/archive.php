<?php get_header(); ?>

    <div class="l-constrained">

        <div role="main" class="l-main">

                <?php if (have_posts()) : ?>

                    <?php $post = $posts[0]; ?>

                    <?php /* Category archive */ if (is_category()) { ?>
                        <h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>

                    <?php /* Tag archive */ } elseif( is_tag() ) { ?>
                        <h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

                    <?php /* Daily archive */ } elseif (is_day()) { ?>
                        <h1>Archive for <?php the_time('F jS, Y'); ?></h1>

                    <?php /* Monthly archive */ } elseif (is_month()) { ?>
                        <h1>Archive for <?php the_time('F, Y'); ?></h1>

                    <?php /* Yearly archive */ } elseif (is_year()) { ?>
                        <h1>Archive for <?php the_time('Y'); ?></h1>

                    <?php /* Author archive */ } elseif (is_author()) { ?>
                        <h1>Author Archive</h1>

                    <?php /* Paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                        <h1>Blog Archives</h1>

                <?php } ?>


                <section>

                <?php while (have_posts()) : the_post(); ?>

                    <article <?php post_class(); ?>>

                        <h2 id="post-<?php the_ID(); ?>" class="entry-title">
                            <a rel="bookmark" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        </h2>


                            <?php the_content(); ?>


                    </article>

                    <?php endwhile; ?>

                    <?php else : ?>

                        <h2>Nothing found</h2>

                    <?php endif; ?>


        </div><!-- end main -->

        <aside role="complementary" class="l-complementary">



        </aside><!-- end complementary -->

    </div><!-- end content -->

<?php get_footer(); ?>
















