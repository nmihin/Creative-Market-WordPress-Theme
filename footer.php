<div class="clear"></div>
</div>
<footer id="footer">
    <section id="footer-boxes" class="pure-g">
        <div class="footer-column pure-u-lg-1-3 pd30 fs footer-info">
            <h1 class="footer-title">Contact</h1>
            <ul class="contact-info">                   
                    <?php
                    $contactName = ot_get_option('pp_contact_name');  
                    if ($contactName) { ?>
                        <li><i class="slide-icon icon-user"></i><p><?php echo $contactName;  ?></p></li>                       
                    <?php } ?>
                    <?php
                    $contactMail = ot_get_option('pp_contact_mail');  
                    if ($contactMail) { ?>
                        <li><i class="slide-icon icon-mail"></i><p><?php echo $contactMail;  ?></p></li>                       
                    <?php } ?> 
                    <?php
                    $contactAddress = ot_get_option('pp_contact_address');  
                    if ($contactAddress) { ?>
                        <li><i class="slide-icon icon-office"></i><p><?php echo $contactAddress;  ?></p></li>                       
                    <?php } ?>
                    <?php
                    $contactPhone = ot_get_option('pp_contact_phone');  
                    if ($contactPhone) { ?>
                        <li><i class="slide-icon icon-phone"></i><p><?php echo $contactPhone;  ?></p></li>                       
                    <?php } ?>                       
            </ul>
        </div>
        <div class="footer-column pure-u-lg-1-3 pd30 fs footer-navigation">
            <h1 class="footer-title">Navigation</h1>
            <div class="recent pure-g">
                <?php wp_nav_menu(); ?>
            </div>	
        </div>
        <div class="footer-column pure-u-lg-1-3 pd30 fs footer-recent">
            <h1 class="footer-title">Recent Projects</h1>
            <ul class="recent pure-g">
                <?php
                $query = new WP_Query(array(
                    'posts_per_page' => 5,
                    'post_type' => 'theportfolio'
                ));

                while ($query->have_posts()): $query->the_post();
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <p><?php echo get_the_date(); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>	
    <div id="copyright" class="pure-g">
        <div class="center-parent copyright-date pure-u-lg-1-3 pd30">
            <div class="center-child fs">
                    <!--<p><?php
                echo sprintf(__('%1$s %2$s %3$s. All Rights Reserved.', 'blankslate'), '&copy;', date('Y'), esc_html(get_bloginfo('name')));
                echo sprintf(__(' Theme By: %1$s.', 'blankslate'), '<a href="http://tidythemes.com/">TidyThemes</a>');
                ?></p>-->
                <p>
                    <?php
                    $pp_copyrights = ot_get_option('pp_copyrights');
                    echo $pp_copyrights;
                    ?>                 
                </p>
            </div>
        </div>
        <?php $pp_enable_socials = ot_get_option('pp_enable_socials'); 
        if ($pp_enable_socials === "on") { ?>
            <div class="pure-u-lg-2-3 socials-icons pd30">
                <ul class="socials">
                    <?php
                    if (function_exists('ot_get_option')) {

                        /* get the slider array */
                        $socials = ot_get_option('pp_headericons', array());
                        if (!empty($socials)) {
                            foreach ($socials as $social) {
                                ?>
                                <li><a href="<?php
                                    if ($social['icons_url']) {
                                        echo $social['icons_url'];
                                    }
                                    ?>"><span class="link-desc"><?php
                                       if ($social['title']) {
                                           echo $social['title'];
                                       }
                                       ?></span><i class="slide-icon icon-<?php
                                            if ($social['icons_service']) {
                                                echo $social['icons_service'];
                                            }
                                            ?>"></i></a></li>
                                        <?php
                                    }
                                }
                            }
                            ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
<nav id="responsive-menu">
    <div class="responsive-menu-wrapp fs">
        <?php wp_nav_menu(array('theme_location' => 'main-nav-menu')); ?>
        <?php $pp_enable_socials = ot_get_option('pp_enable_socials'); 
        if ($pp_enable_socials === "on") { ?>
        <ul class="socials">
            <?php
            if (function_exists('ot_get_option')) {

                /* get the slider array */
                $socials = ot_get_option('pp_headericons', array());
                if (!empty($socials)) {
                    foreach ($socials as $social) {
                        ?>
                        <li><a href="<?php
                            if ($social['icons_url']) {
                                echo $social['icons_url'];
                            }
                            ?>"><span class="link-desc"><?php
                               if ($social['title']) {
                                   echo $social['title'];
                               }
                               ?></span><i class="slide-icon icon-<?php
                                    if ($social['icons_service']) {
                                        echo $social['icons_service'];
                                    }
                                    ?>"></i></a></li>
                                <?php
                            }
                        }
                    }
                    ?>
        </ul>
        <?php } ?>
    </div>
</nav>	
<script src="<?php echo get_template_directory_uri(); ?>/dist/js/scripts.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-59562314-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>