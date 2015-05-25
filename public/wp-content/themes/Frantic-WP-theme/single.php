<?php get_header(); ?>

    <div class="l-constrained">

        <div role="main" class="l-main">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <article <?php post_class(); ?>>

                        <h2><?php the_title(); ?></h2>

                            <?php if(has_post_thumbnail()): ?>
                                <?php echo get_the_post_thumbnail($post->ID, 'full', array('title' => "")); ?>
                            <?php endif; ?>

                            <?php the_content(); ?>


                        <!--section id="comments" class="hentry-comments">

                            <?php comments_template(); ?>

                        </section-->

                    </article>

                    <?php wp_list_categories(); ?>

                    <?php the_tags(); ?>


                <?php endwhile; ?>

            <?php endif; ?>

        </div><!-- end main -->

        <aside role="complementary" class="l-complementary">



        </aside><!-- end complementary -->

    </div><!-- end content -->

<?php get_footer(); ?>