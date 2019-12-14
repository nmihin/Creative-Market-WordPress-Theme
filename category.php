<?php get_header(); ?>
<main id="main" class="pure-g blog">
		<h1 class="blog-title pd40">Category Archives: <?php single_cat_title(); ?><span class="breadcrumb"><?php MyBreadcrumb(); ?></span></h1>
		<ul class="recent pure-g">
			<?php
			  // set up or arguments for our custom query
			  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			  $query_args = array(
			    'post_type' => 'post',
			    'posts_per_page' => 10,
			    'paged' => $paged
			  );
			  // create a new instance of WP_Query
			  //$the_query = new WP_Query( $query_args );
			?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // run the loop ?>
			    <li>
					<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,’thumbnail’, true); ?>
					<h1 class="pd30 the-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<h3  class="pd30 the-subtitle">Posted by <a href="<?php echo get_site_url(); ?><?php echo "/author/"; the_author(); ?>"><?php the_author(); ?></a> on <?php echo get_the_date(); ?> in <a href="<?php $category = get_the_category(); $firstCategory = $category[0]->cat_name; echo $firstCategory;?>"><?php the_category(); ?></a>| <?php comments_popup_link( __( 'Leave a comment', 'themename' ), __( '1 Comment', 'themename' ), __( '% Comments', 'themename' ) ) ?></h3>
					<?php if($image_url[0]){ ?>
					<figure style='background-image:url(<?php echo $image_url[0]; ?>);'>					
						<img src="<?php echo $image_url[0]; ?>" width="100%" height="auto" alt="" style="display:none;" />		
					</figure>
					<?php } ?>
					<div class="recent-excerpt pd30"><?php the_excerpt(); ?></div>
					<a class="recent-link pure-button pure-button-primary" href="<?php echo get_permalink(); ?>">Read More...</a>
			    </li>
			<?php endwhile; ?>

			<?php if ('max_num_pages > 1') { // check if the max number of pages is greater than 1  ?>
			  <nav class="prev-next-posts">
			    <div class="prev-posts-link">
			      <?php echo get_next_posts_link( 'Older Entries', 'max_num_pages' ); // display older posts link ?>
			    </div>
			    <div class="next-posts-link">
			      <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
			    </div>
			  </nav>
			<?php } ?>

			<?php else: ?>
			  <article>
			    <h1>Sorry...</h1>
			    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			  </article>
			<?php endif; ?>
		</ul>
</main>
<?php get_footer(); ?>