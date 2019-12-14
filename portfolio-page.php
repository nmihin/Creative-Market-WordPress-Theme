<?php
/*
 * Template Name: Portfolio Page
 * Description: A Portfolio Template for portfolio page.
 */
?>
<?php get_header(); ?>
<main id="main" class="portfolio pure-g">    
    <h1 class="portfolio-title pd40"><?php the_title(); ?>
        <?php $pp_breadcrumbs = ot_get_option('pp_breadcrumbs');
        if ($pp_breadcrumbs === "on") {
            ?>
            <span class="breadcrumb"><?php MyBreadcrumb(); ?></span>
    <?php } ?>
    </h1>      
    <section id="portfolio" class="pure-g">
        <div id="filters" class="button-group js-radio-button-group fs pure-g portfolio-links">
            <button id="show-all" class="button is-checked bttn active" data-filter="*">SHOW ALL</button>
            <?php    
            
            $the_query = new WP_Query( array(
                'post_type' => 'theportfolio',
                'posts_per_page' => -1,
                '_groupby' => 'ID',
                'nopaging' => true,
            ) );

            $itemsTag = array();
            $itemsName = array();

            while ($the_query->have_posts()): $the_query->the_post();

            $posttags = get_the_tags();
            if ($posttags) {
                foreach($posttags as $tag) {
                  $tag2 = $tag->name;
                  $tag = $tag->name; 
                  $itemsTag[] = strtolower($tag);
                  $itemsName[] = $tag2;
                }
            }
    
            endwhile;

            for($i=0; $i<sizeof($itemsTag); $i++) {
                $resultTag = array_unique($itemsTag);
                $resultName = array_unique($itemsName);
                echo "<button class='button bttn ".$resultName[$i]."hide' data-filter='.".$resultTag[$i]."-tag'>".$resultTag[$i]."</button>";
            }

            wp_reset_postdata();      
            
            ?>
        </div>
        <div class="gallery pure-g">
            <?php
            $pp_portfolio_number = ot_get_option('pp_portfolio_number');

            $query = new WP_Query(array(
                'post_type' => 'theportfolio',
                'posts_per_page' => $pp_portfolio_number,
                'paged' => $paged
            ));

            while ($query->have_posts()): $query->the_post();
                ?>

                <figure class="effect-hera inside pure-u-lg-1-3 element-item <?php $posttags = get_the_tags();
                if ($posttags) {
                  foreach($posttags as $tag) {
                    $tag = $tag->name . '-tag '; 
                    echo strtolower($tag);
                  }
                } ?>">
                    <figcaption class="center-parent gallery-layer">
                        <p>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="link-desc"><?php the_title(); ?></span><i class="icon icon-search"></i></a>
                            <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>" title="<?php the_title(); ?>" target="blank"><span class="link-desc"><?php the_title(); ?></span><i class="icon icon-link"></i></a>
                            <span><?php the_title(); ?></span>
                        </p>
                    </figcaption>   
                    <div class="faux-image" style='background-image:url(<?php
                    $url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
                    echo $url[0];
                    ?>);'></div>
                </figure>
<?php endwhile; ?>
                <div class="next-prev-portfolio">
                    <?php next_posts_link( '', $query->max_num_pages ); ?>
                    <?php previous_posts_link( '' ); ?>
                </div>
        </div>
    </section>	
</main>
<?php get_footer(); ?>