<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php body_class($class); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="description" content="<?php wp_title(' | ', true, 'right'); ?>">
        <title><?php wp_title(' | ', true, 'right'); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/styles.min.css">
        <link rel="stylesheet" href="https://i.icomoon.io/public/b9475f491e/reframe/style.css">
        <?php 
            $pp_select_font = ot_get_option('pp_select_font');
            switch ($pp_select_font) {
                case 'Pacifico':
                    echo "<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>";
                    break;
                case 'Playfair Display':
                    echo "<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
                    break;
                case 'Open Sans':
                    echo "<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>";
                    break;
                case 'Droid Serif':
                    echo "<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>";
                    break;
                case 'Roboto Condensed':
                    echo "<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
                    break;
                case 'Roboto Slab':
                    echo "<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
                    break;
                case 'Sorts Mill Goudy':
                    echo "<link href='https://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
                    break;
                case 'Enriqueta':
                    echo "<link href='https://fonts.googleapis.com/css?family=Enriqueta:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
                    break;
                case 'Great Vibes':
                    echo "<link href='https://fonts.googleapis.com/css?family=Great+Vibes&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
                    break;
                case 'Amatic SC':
                    echo "<link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
                    break;   
                default:
                    echo "<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>";
                    break;  
            }

        ?>
        
        <?php $customFavicon = ot_get_option('pp_favicon_upload');
        if ($customFavicon) {
            ?>
            <link rel="shortcut icon" href="<?php echo $customFavicon ?>" />
<?php } ?>
        <!-- For iPad with high-resolution Retina display running iOS ≥ 7: -->
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-152x152-precomposed.png" />
        <!-- For iPad with high-resolution Retina display running iOS ≤ 6: -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-144x144-precomposed.png" />
        <!-- For iPhone with high-resolution Retina display running iOS ≥ 7: -->
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-120x120-precomposed.png" />
        <!-- For iPhone with high-resolution Retina display running iOS ≤ 6: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-114x114-precomposed.png" />
        <!-- For the iPad mini and the first- and second-generation iPad on iOS ≥ 7: -->
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-76x76-precomposed.png" />
        <!-- For the iPad mini and the first- and second-generation iPad on iOS ≤ 6: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-72x72-precomposed.png" />
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-precomposed.png" />
<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> <?php echo 'style="' ?><?php $pp_select_font = ot_get_option('pp_select_font'); echo "font-family:" . $pp_select_font; ?><?php echo'"' ?>>
        <div id="preloader">
            <div class="sk-spinner sk-spinner-wave">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>
        </div>	   
        <header id="header">
            <div class="pure-g">
                <?php if (is_front_page()) { ?>
    <?php $enable_slider = ot_get_option('pp_slider_on');
    if ($enable_slider === "on") { ?>
                        <section id="teaser" class="device pure-u-lg-1">
                            <a class="arrow-left1" href="#"><i class="icon-arrow-left link-desc"></i></a> 
                            <a class="arrow-right1" href="#"><i class="icon-arrow-right link-desc"></i></a>
                            <div id="header-swp" class="swiper-container1 swp">
                                <div class="swiper-wrapper">
                                    <?php
                                    if (function_exists('ot_get_option')) {

                                        /* get the slider array */
                                        $slides = ot_get_option('header_slider', array());
                                        if (!empty($slides)) {
                                            foreach ($slides as $slide) {
                                                ?>                                
                                                <div class="swiper-slide">
                                                    <div class="content-slide">
                                                        <div class="content-inner fs pd30">
                                                            <h1 class="slide-title"><?php if ($slide['title']) {
                                                    echo $slide['title'];
                                                } ?></h1>
                                                            <h2 class="slide-subtitle pd10 first-subtitle"><?php if ($slide['description']) {
                                                    echo $slide['description'];
                                                } ?></h2>
                                                            <a href="<?php if ($slide['link']) {
                                echo $slide['link'];
                            } ?>" class="slide-button bttn"><i class="icon-arrow-right"></i></a>
                                                        </div>
                                                        <div class="st" style='background-image:url(<?php echo $slide['image']; ?>);'></div>
                                                    </div>                                                                   
                                                </div>
                                <?php
                                }
                            }
                        }
                        ?>
                                </div>
                            </div>
                            <div class="pagination1"></div>
                        </section>             
    <?php } ?>

                                         <?php } ?>
                <div id="menu-wrapp" class="pure-g">
                    <div id="top-menu-main" <?php echo 'class="pure-g ' ?><?php $pp_sticky_menu = ot_get_option('pp_sticky_menu');
                                if ($pp_sticky_menu === "off") {
                                    echo 'active-fixed';
                                } ?><?php echo'"'; ?> >
                        <div id="top-menu" <?php echo 'style="' ?><?php $pp_header_height = ot_get_option('pp_header_height');
                                echo "height:" . $pp_header_height . "px "; ?><?php echo'"' ?>>
                            <div id="branding" class="pure-u-lg-3-5">
                                <?php
                                $customLogo = ot_get_option('pp_logo_upload');
                                if ($customLogo) {
                                    ?>
                                    <div id="site-logo">
                                        <img src="<?php echo $customLogo; ?>" alt="Logo" title="Logo" <?php echo 'style="' ?>
    <?php $margin_right_logo = ot_get_option('margin_right_logo');
    echo "margin-right:" . $margin_right_logo . "px; ";
    $margin_left_logo = ot_get_option('margin_left_logo');
    echo "margin-left:" . $margin_left_logo . "px; ";
    $margin_top_logo = ot_get_option('margin_top_logo');
    echo "margin-top:" . $margin_top_logo . "px; ";
    $margin_bottom_logo = ot_get_option('margin_bottom_logo');
    echo "margin-bottom:" . $margin_bottom_logo . "px;"; ?><?php echo'"' ?> />
                                    </div>
<?php } ?>
                                <div id="site-title">
                                    <div class="center-parent">
                                            <a class="center-child" href="<?php echo esc_url(home_url('/')); ?>" title="<?php esc_attr_e(get_bloginfo('name'), 'blankslate'); ?>" rel="home"><?php echo esc_html(get_bloginfo('name')); ?><!--<img src ="<?php echo get_template_directory_uri(); ?>/img/diamond.svg">--></a>
                                    </div>	
                                </div>
                            </div>
                            <nav id="menu" class="pure-u-lg-2-5">
<?php wp_nav_menu(array('theme_location' => 'main-nav-menu')); ?>
                            </nav>
                            <a class="responsive-button" href="#">
                                <div class="icon menu5"> <span></span> <span></span> <span></span> <span></span> </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="wrapper" class="hfeed">
            <div id="container">