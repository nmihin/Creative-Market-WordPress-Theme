<?php
/*
 * Template Name: About Page
 * Description: A About Template for about page.
 */
?>
<?php get_header(); ?>
<section id="content" class="about pure-g">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="header">
                <h1 class="about-title pd40"><?php the_title(); ?>
                    <?php $pp_breadcrumbs = ot_get_option('pp_breadcrumbs');
                    if ($pp_breadcrumbs === "on") {
                        ?>
                        <span class="breadcrumb"><?php MyBreadcrumb(); ?></span>
            <?php } ?>
                </h1>  
                </header>
                <section id="about" class="pure-g">
                    <div class="about-info d30">
                        <div class="pure-u-sm-1 pd30">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </section>

            </article>
        <?php endwhile;
    endif;
    ?>
</section>
<?php get_footer(); ?>


