<?php get_header(); ?>
<main id="main" class="pure-g search">
		<h1 class="entry-title pd30"><?php _e( 'Not Found', 'blankslate' ); ?>
        <?php $pp_breadcrumbs = ot_get_option('pp_breadcrumbs');
        if ($pp_breadcrumbs === "on") {
            ?>
            <span class="breadcrumb"><?php MyBreadcrumb(); ?></span>
    	<?php } ?>
		</h1>
		<section class="entry-content">
		<h1 class="pd30 the-subtitle"><?php _e( 'Nothing found for the requested page. Try a different page?', 'blankslate' ); ?></h1>
		</section>
</main>
<?php get_footer(); ?>