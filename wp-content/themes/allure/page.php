<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- begin .post -->
    <article <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>


        <div class="post_content">
        <?php the_content(); ?>
        </div>

        <?php endwhile; ?>


        <?php //comments_template(); ?>

    </article>
    <!-- end .post -->
    <?php endif; ?>

<div class="clear"></div>
<?php get_footer(); ?>