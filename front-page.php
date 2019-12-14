<?php
/*
 * Template Name: Home Page
 * Description: A Home Page Template.
 */
?>
<?php get_header(); ?>
<main id="main" class="pure-g swiper-wrapper">
<?php
    $portfolio_title = ot_get_option('pp_header_text');
    $query = new WP_Query(array(
                'post_type' => 'theportfolio',
                'posts_per_page' => 6,
            ));
    if($query->have_posts()) {
?>
    <section id="portfolio" class="section-number pure-u-1 swiper-slide">
        <div class="portfolio-title pd40 fs">
            <h1><?php echo $portfolio_title; ?></h1>
        </div>
        <?php //} ?>
        <div class="gallery pure-g">
            <?php
            while ($query->have_posts()): $query->the_post();
                ?>
                <figure class="effect-hera inside pure-u-lg-1-3 element-item design development">
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
            <?php
            endwhile;
            wp_reset_query();
            ?>	
        </div>
    </section>
    <?php } ?>
    <?php
        $features_title = ot_get_option('pp_features_title');
        $features_subtitle = ot_get_option('pp_features_subtitle');
        $query = new WP_Query(array(
                'post_type' => 'features',
                'posts_per_page' => -1,
        ));
        if($query->have_posts()) {
    ?>
    <section id="work" class="section-number pure-u-1 pd30 swiper-slide">
        <div id="work-header" class="pd30">
            <div class="work-inner fs">
                <h1 class="work-title"><?php echo $features_title; ?></h1>
                <div class="bar-title"><span></span><span></span></div>
                <h2 class="work-subtitle"><?php echo $features_subtitle; ?></h2>
            </div>
        </div>
        <ul class="pure-u-1">
            <?php
            $counter = 50;
            while ($query->have_posts()): $query->the_post();
                ?>                                  
                <li class="works pure-u-md-1-5 pd30 fsI visibility-check" data-vp-add-class="fadeUp" data-vp-offset="<?php echo ($counter + 100);
                $counter = $counter + 35; ?>">
                    <div class="works-icons" style='background-image:url(<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                echo $url; ?>);'>
                        <h1 class="works-title"><?php the_title(); ?></h1>
                    </div>
                    <h2 class="works-subtitle"><?php the_content(); ?></h2>			
                </li>
                <?php endwhile;
                wp_reset_query(); ?>	   
        </ul>
    </section>
    <?php } ?>
    <?php
        $pp_posts_title = ot_get_option('pp_posts_title');
        $pp_posts_title = ot_get_option('pp_posts_subtitle');
        $query = new WP_Query(array(
                'posts_per_page' => 2
        )); 
        if($query->have_posts()) {
    ?>
    <section id="posts" class="section-number pure-u-1">
        <div id="posts-header" class="content-slide pd30">
            <div class="content-inner fs">
                <h1 class="slide-title"><?php echo $pp_posts_title; ?></h1>
                <div class="bar-title"><span></span><span></span></div>
                <h2 class="slide-subtitle"><?php echo $pp_posts_title; ?></h2>
            </div>
        </div>
                <?php
                $thePosts = query_posts($query);
                global $wp_query; 
                $postsNum = $wp_query->found_posts;
                $postsNum > 1 ? $total_posts_count = 2 : $total_posts_count = 1;

                ?>
                <ul class="recent pure-g">
                <?php while ($query->have_posts()): $query->the_post(); ?>
                    <li class="pure-u-lg-1-<?php echo $total_posts_count; ?> posts-list" style='background-image:url(<?php
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
                            echo $url[0];
                            ?>);'>
                        <figure>
                            <figcaption>
                                    <h2>
                                       <span><?php the_title(); ?></span>
                                    </h2>
                                    <span class="posts-author"><?php the_author(); ?></span>
                                    <span class="posts-divider"> | </span>
                                    <span class="posts-date"><?php echo get_the_date(); ?></span>
                                    <span class="posts-comments"><?php comments_number( 'no responses', 'one response', '% responses' ); ?></span>
                            </figcaption>   
                        </figure>   
                        <a href="<?php the_permalink(); ?>" class="posts-link"><i class="icon icon-link"></i></a>
                    </li>
                <?php endwhile; ?>
            </ul>
    </section>
    <?php } ?>
    <?php
        $skills_title = ot_get_option('pp_skills_title');
        $skills_subtitle = ot_get_option('pp_skills_subtitle');
        $query = new WP_Query(array(
                'post_type' => 'skills',
                'posts_per_page' => -1,
                'order' => 'DESC',
                'orderby' => 'meta_value_num',
                'meta_key' => '_skill'
        ));
        if($query->have_posts()) {
    ?>
    <section id="skills" class="section-number skills pure-u-1 swiper-slide">
        <div class="content-slide pd30 clients-header">
            <div class="content-inner fs">
                <h1 class="slide-title"><?php echo $skills_title; ?></h1>
                <div class="bar-title"><span></span><span></span></div>
                <h2 class="slide-subtitle"><?php echo $skills_subtitle; ?></h2>
            </div>
        </div>   
        
        <ul id="canvas" class="pure-u-1">
            <?php
            $counter = 1;
            $animation = 20;
            
            while ($query->have_posts()): $query->the_post();
                ?>   
                <li class="skill pure-u-lg-1-6 visibility-check" data-vp-add-class="fadeUp" data-vp-offset="<?php echo ($animation + 20);
                $animation = $animation + 15; ?>">
                    <p class="circle" id="circles-<?php echo $counter; $counter++; ?>" data-value="<?php echo get_post_meta($post->ID, "_skill", true); ?>"></p>
                    <span class="skill-title"><?php the_title(); ?></span>
                </li>            
                <?php endwhile;
                wp_reset_query(); ?>	   
        </ul>        
    </section>
    <?php } ?>
    <?php
        $query = new WP_Query(array(
            'post_type' => 'recommendations',
            'posts_per_page' => -1,
        ));
        if($query->have_posts()) {
    ?>
    <section id="quotes" class="section-number pure-u-1 swiper-slide">
        <div id="clients-swp" class="swiper-container2">
            <div class="swiper-wrapper">
                <?php
                while ($query->have_posts()): $query->the_post();
                    ?>  

                    <div class="swiper-slide" style='background-image:url(<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    echo $url; ?>);'>
                        <div class="content-slide pd30 center-parent">
                            <div class="content-inner fs center-child">
                                <h1 class="slide-title"><?php the_content(); ?></h1>
                                <h2 class="slide-subtitle">- <?php the_title(); ?></h2>
                            </div>
                        </div>
                    </div>
<?php
endwhile;
wp_reset_query();
?>     
            </div>                                                            
        </div>
        <div class="pagination2"></div>
    </section>  
    <?php } ?>

    <?php
        $query = new WP_Query(array(
            'post_type' => 'clients',
            'posts_per_page' => -1,
                ));
        if($query->have_posts()) {
    ?>
    <section id="clients" class="section-number pure-u-1 swiper-slide">
        <div class="content-slide pd30 clients-header">
            <div class="content-inner fs">
                <h1 class="slide-title"><?php $clients_title = ot_get_option('pp_clients_title'); echo $clients_title; ?></h1>
                <div class="bar-title"><span></span><span></span></div>
                <h2 class="slide-subtitle"><?php $clients_subtitle = ot_get_option('pp_clients_subtitle'); echo $clients_subtitle; ?></h2>
            </div>
        </div>
        <div id="clients-logos" class="swiper-container3">
            <div class="swiper-wrapper">

<?php
while ($query->have_posts()): $query->the_post();
    ?>
                    <div class="swiper-slide">
                        <div class="content-slide">
                            <a href="<?php echo get_post_meta($post->ID, "_client", true); ?>" target="blank" class="content-inner">
                                <img class="inside pure-u-lg-1-3" src="<?php
                $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                echo $url;
                ?>" width="220" height="80" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                            </a>
                        </div>
                    </div>
<?php
endwhile;
wp_reset_query();
?>	   	        	        	        
            </div>
        </div>
        <div class="pagination3"></div>
    </section>
    <?php } ?>
    <section id="contact" class="section-number about pure-u-1 swiper-slide">
        <?php 
        $google_map_location_x = ot_get_option('pp_map_x_coordinate');
        $google_map_location_y = ot_get_option('pp_map_y_coordinate');
        if ($google_map_location_x && $google_map_location_y) {
            ?>
            <input class="x-coordinate" type="hidden" value="<?php echo $google_map_location_x; ?>" />
            <input class="y-coordinate" type="hidden" value="<?php echo $google_map_location_y; ?>" />
        <?php } ?>
        <div class="content-slide pd30 clients-header">
            <div class="content-inner fs">
                <h1 class="contact-title"><?php $contact_title = ot_get_option('pp_contact_title'); echo $contact_title; ?></h1>
                <div class="bar-title"><span></span><span></span></div>
                <h2 class="contact-subtitle"><?php $contact_subtitle = ot_get_option('pp_contact_subtitle'); echo $contact_subtitle; ?></h2>
            </div>
        </div>
        <div class="pure-u-lg-1 contact-form">
<?php echo do_shortcode('[contact-form-7 id="179" title="Contact form 1"]'); ?>
        </div> 
        <div id="map" class="pure-u-lg-1 about-info">
            <div id="map-canvas"></div>
        </div>
    </section>
</main>
<!-- Add Pagination -->
<ul class="swiper-pagination"></ul>
<?php get_footer(); ?>