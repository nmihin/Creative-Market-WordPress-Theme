<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<main id="main" class="pure-g blog">
				<h1 class="blog-title pd40">Portfolio<span class="breadcrumb"><?php MyBreadcrumb(); ?></span></h1>
				<div class="recent pure-g">
					<div class="recent-wrapp">
							<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,’thumbnail’, true); ?>
					        <h1 class="the-title pd30"><?php the_title(); ?></h1>
					        <h3 class="the-subtitle pd30">Posted by <?php echo get_the_author(); ?> on <?php echo get_the_date(); ?> in <?php $category = get_the_category(); $firstCategory = $category[0]->cat_name; echo $firstCategory;?>| in <?php comments_popup_link( __( 'Leave a comment', 'themename' ), __( '1 Comment', 'themename' ), __( '% Comments', 'themename' ) ) ?></h3>
					        <div class="pure-u-lg-1 half">
					        	<img class="single-img" src="<?php echo $image_url[0]; ?>" width="100%" height="auto" alt="" />
					        	<p class="recent-content">
					        		<?php the_content(); ?>
					        	</p>
					    	</div>
							<div class="reply pd30">
								<?php comments_template(); ?>
							</div>
					</div>
				</div>
		</main>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>