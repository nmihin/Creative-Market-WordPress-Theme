<?php
add_action( 'after_setup_theme', 'moineau_setup' );
function moineau_setup()
{
load_theme_textdomain( 'moineau', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
}

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

//Hide Documentation Page
add_filter('ot_show_pages', '__return_false');
add_filter('ot_show_new_layout', '__return_false');

/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
/**
 * Theme Options
 */
include_once( 'theme-options.php' );

/**
 * Theme Options
 */
include_once( 'inc/class-tgm-plugin-activation.php' );
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'               => 'Contact Form 7', // The plugin name.
            'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/contact-form-7.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'WP Lightbox 2', // The plugin name.
            'slug'               => 'wp-lightbox-2', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/wp-lightbox-2.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),     
        array(
            'name'               => 'WP Visual Icon Fonts', // The plugin name.
            'slug'               => 'wp-visual-icon-fonts', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/wp-visual-icon-fonts.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', 'https://i.icomoon.io/public/b9475f491e/reframe/style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Registering Menus For Theme
add_action( 'init', 'register_my_menus' );
 
function register_my_menus() {
	register_nav_menus(
		array(
			'main-nav-menu' => __( 'Main Menu' )
		)
	);
}

add_action( 'wp_enqueue_scripts', 'moineau_load_scripts' );

function custom_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function moineau_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'moineau_enqueue_comment_reply_script' );
function moineau_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'moineau_title' );
function moineau_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'moineau_filter_wp_title' );
function moineau_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'moineau_widgets_init' );
function moineau_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'moineau' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function moineau_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'moineau_comments_number' );
function moineau_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
function MyBreadcrumb() {
    if (!is_home()) {
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo "</a>";
        if (is_category() || is_single()) {
            the_category('title_li=');
            if (is_single()) {
                if(the_title()){
                  $s = substr(the_title('','',FALSE),0,30);
                  if (strlen($s) >29){ echo '…'; }
                }
            }
        } elseif (is_page()) {
            the_category('title_li=');
            if (is_single()) {
                if(the_title()){
                  $s = substr(the_title('','',FALSE),0,30);
                  if (strlen($s) >29){ echo '…'; }
                }
            }
        }
    }
}

//RECOMMENDATIONS
add_action( 'init', 'create_post_type2' );
function create_post_type2() {
  register_post_type( 'recommendations',
    array(
      'labels' => array(
        'name' => __( 'Recommendations' ),
        'singular_name' => __( 'Recommendations' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Recommendation Item' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Recommendation' ),
        'new_item' => __( 'New Recommendation' ),
        'view' => __( 'View Recommendation' ),
        'view_item' => __( 'View Recommendation' ),
        'search_items' => __( 'Search Recommendation' ),
        'not_found' => __( 'No Recommendations found' ),
        'not_found_in_trash' => __( 'No Recommendations found in Trash' ),
        'parent' => __( 'Parent Event' ),
        ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-editor-quote',
      'capability_type' => 'post',
      'supports' => array('title','editor','thumbnail')
    )
  );
}

//FEATURES
add_action( 'init', 'create_post_type3' );
function create_post_type3() {
  register_post_type( 'features',
    array(
      'labels' => array(
        'name' => __( 'Features' ),
        'singular_name' => __( 'Features' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Feature Item' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Feature' ),
        'new_item' => __( 'New Feature' ),
        'view' => __( 'View Feature' ),
        'view_item' => __( 'View Feature' ),
        'search_items' => __( 'Search Feature' ),
        'not_found' => __( 'No Features found' ),
        'not_found_in_trash' => __( 'No Features found in Trash' ),
        'parent' => __( 'Parent Event' ),
        ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-lightbulb',
      'capability_type' => 'post',
      'supports' => array('title','editor','thumbnail')
    )
  );
}

//SKILLS
add_action( 'init', 'create_post_type4' );
function create_post_type4() {
  register_post_type( 'skills',
    array(
      'labels' => array(
        'name' => __( 'Skills' ),
        'singular_name' => __( 'Skills' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Skill Item' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Skill' ),
        'new_item' => __( 'New Skill' ),
        'view' => __( 'View Skill' ),
        'view_item' => __( 'View Skill' ),
        'search_items' => __( 'Search Skill' ),
        'not_found' => __( 'No Skills found' ),
        'not_found_in_trash' => __( 'No Skills found in Trash' ),
        'parent' => __( 'Parent Event' ),
        ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-hammer',
      'capability_type' => 'post',
      'supports' => array('title'),
      'register_meta_box_cb' => 'add_skills_metaboxes'       
    )
  );
}

add_action( 'add_meta_boxes', 'add_skills_metaboxes' );

// Add the Skills Meta Boxes
function add_skills_metaboxes() {
    add_meta_box('wpt_skills_location', 'Percentage (number between 1 - 100)', 'wpt_skills_location', 'skills', 'normal', 'default');
}

// The Event Location Metabox
function wpt_skills_location() {
    global $post;
    
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    // Get the location data if its already been entered
    $location = get_post_meta($post->ID, '_skill', true);
    
    // Echo out the field
    echo '<input min="1" max="100" type="number" name="_skill" value="' . $location  . '" class="widefat" />';
}

function wpt_save_skills_meta($post_id, $post) {
    
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }

    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    
    $events_meta['_skill'] = $_POST['_skill'];
    
    // Add values of $events_meta as custom fields
    
    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }

}


add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );
function my_post_gallery( $output, $attr ) 
{
    global $post, $wp_locale;
    static $instance = 0;

    $instance ++;

    if ( isset( $attr['orderby'] ) ) 
    {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if( !$attr['orderby'] )
        {
            unset( $attr['orderby'] );
        }
    }

    extract( shortcode_atts( array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'div',
        'icontag'    => 'dt',
        'captiontag' => 'figcaption',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'attachment' => 'large',
        'include'    => '',
        'exclude'    => ''
    ), $attr ) );

    $id = intval( $id );

    if ( 'RAND' == $order )
    {
        $orderby = 'none';
    }
    if ( !empty( $include ) ) 
    {
        $include      = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array( 
            'include'        => $include, 
            'post_status'    => 'inherit', 
            'post_type'      => 'attachment', 
            'post_mime_type' => 'image', 
            'order'          => $order, 
            'orderby'        => $orderby 
        ));

        $attachments = array();
        foreach( $_attachments as $key => $val ) 
        {
            $attachments[ $val->ID ] = $_attachments[ $key ];
        }
    } 
    elseif ( !empty( $exclude ) ) 
    {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array( 
            'post_parent'    => $id, 
            'exclude'        => $exclude, 
            'post_status'    => 'inherit', 
            'post_type'      => 'attachment', 
            'post_mime_type' => 'image', 
            'order'          => $order, 
            'orderby'        => $orderby
        ));
    } 
    else 
    {
        $attachments = get_children( array(
            'post_parent'    => $id, 
            'post_status'    => 'inherit', 
            'post_type'      => 'attachment', 
            'post_mime_type' => 'image', 
            'order'          => $order, 
            'orderby'        => $orderby
        ));
    }

    if( empty( $attachments ) )
    {
        return;
    }

    if( is_feed() ) 
    {
        $output = '';
        foreach( $attachments as $att_id => $attachment )
        {
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        }

        return $output;
    }

    $itemtag    = tag_escape( $itemtag );
    $captiontag = tag_escape( $captiontag );
    $columns    = intval( $columns );
    $itemwidth  = $columns > 0 ? floor( 100 / $columns ) : 100;
    $float      = is_rtl() ? 'right' : 'left';
    $selector   = "gallery-{$instance}";
    $output     = apply_filters( 'gallery_style', '' );
    $i          = 0;

    // The div
    $output .= '<div class="post-gallery">';


        foreach( $attachments as $id => $attachment ) 
        {
            $link = isset( $attr['link'] ) && 'file' == $attr['link'] ? wp_get_attachment_link( $id, $size, false, false ) : wp_get_attachment_link( $id, $size, true, false );

            $output .= "<{$itemtag} class='post-gallery-item'>";
            $output .= "$link";

            if ( $captiontag && trim( $attachment->post_excerpt ) ) 
            {
                $output .= "<{$captiontag}>" . wptexturize( $attachment->post_excerpt ) . "</{$captiontag}>";
            }
            $output .= "</{$itemtag}>";

            if ( $columns > 0 && ++$i % $columns == 0 )
            {
                $output .= '';
            }
        }

    // End div
    $output .= "</div>";

    return $output;
}



add_action('save_post', 'wpt_save_skills_meta', 1, 2); // save the custom fields

//CLIENTS
add_action( 'init', 'create_post_type1' );
function create_post_type1() {
  register_post_type( 'clients',
    array(
      'labels' => array(
        'name' => __( 'Clients' ),
        'singular_name' => __( 'Clients' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Client Item' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Client' ),
        'new_item' => __( 'New Client' ),
        'view' => __( 'View Client' ),
        'view_item' => __( 'View Clients' ),
        'search_items' => __( 'Search Clients' ),
        'not_found' => __( 'No Clients found' ),
        'not_found_in_trash' => __( 'No Clients found in Trash' ),
        'parent' => __( 'Parent Event' ),
        ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-businessman',
      'capability_type' => 'post',
      'supports' => array('title','editor','thumbnail','tags'),
      'taxonomies' => array('post_tag'),
      'register_meta_box_cb' => 'add_clients_metaboxes'
    )
  );
}

add_action( 'add_meta_boxes', 'add_clients_metaboxes' );

// Add the Events Meta Boxes
function add_clients_metaboxes() {
    add_meta_box('wpt_clients_location', 'Clients link', 'wpt_clients_location', 'clients', 'side', 'default');
}
// The Event Location Metabox
function wpt_clients_location() {
    global $post;
    
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    // Get the location data if its already been entered
    $location = get_post_meta($post->ID, '_client', true);
    
    // Echo out the field
    echo '<input type="text" name="_client" value="' . $location  . '" class="widefat" />';

}

add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="portfolio-old icon-arrow-right"';
}
function posts_link_attributes_2() {
    return 'class="portfolio-new icon-arrow-left"';
}

function wpt_save_clients_meta($post_id, $post) {
    
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }

    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    
    $events_meta['_client'] = $_POST['_client'];
    
    // Add values of $events_meta as custom fields
    
    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }

}

add_action('save_post', 'wpt_save_clients_meta', 1, 2); // save the custom fields


//PORTFOLIO
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'theportfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfolio' ),
        'singular_name' => __( 'Portfolio' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Portfolio Item' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Portfolio' ),
        'new_item' => __( 'New Portfolio' ),
        'view' => __( 'View Event' ),
        'view_item' => __( 'View Portfolio' ),
        'search_items' => __( 'Search Portfolio' ),
        'not_found' => __( 'No Events found' ),
        'not_found_in_trash' => __( 'No Events found in Trash' ),
        'parent' => __( 'Parent Event' ),
        ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-portfolio',
      'capability_type' => 'post',
      'supports' => array('title','editor','thumbnail','tags'),
      'taxonomies' => array('post_tag'),
      'register_meta_box_cb' => 'add_profile_metaboxes'
    )
  );
}

add_action( 'add_meta_boxes', 'add_profile_metaboxes' );


// Add the Events Meta Boxes
//function add_profile_metaboxes() {
//    add_meta_box('wpt_portfolio_video', 'Portfolio video', 'wpt_portfolio_video', 'portfolio', 'side', 'default');
//}
// Add the Events Meta Boxes
function add_profile_metaboxes() {
    add_meta_box('wpt_portfolio_location', 'Portfolio link', 'wpt_portfolio_location', 'theportfolio', 'side', 'default');
}
// The Event Location Metabox
function wpt_portfolio_location() {
    global $post;
    
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    // Get the location data if its already been entered
    $location = get_post_meta($post->ID, '_location', true);
    
    // Echo out the field
    echo '<input type="text" name="_location" value="' . $location  . '" class="widefat" />';

}
// The Event Location Metabox
function wpt_portfolio_video() {
    global $post;
    
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    // Get the location data if its already been entered
    $location = get_post_meta($post->ID, '_video', true);
    
    // Echo out the field
    echo '<input type="text" name="_video" value="' . $location  . '" class="widefat" />';

}
// Save the Metabox Data

function wpt_save_portfolio_meta($post_id, $post) {
    
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }

    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    
    $events_meta['_location'] = $_POST['_location'];
    
    // Add values of $events_meta as custom fields
    
    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }

    $video_meta['_video'] = $_POST['_video'];
    
    // Add values of $events_meta as custom fields
    
    foreach ($video_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }

}

add_action('save_post', 'wpt_save_portfolio_meta', 1, 2); // save the custom fields


// STYLESHEETS QUEUE
function admin_register_head() {
    $siteurl = get_option('siteurl');
    $url = $siteurl . '/wp-content/themes/' . basename(dirname(__FILE__)) . '/css/admin-style.css';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}
add_action('admin_head', 'admin_register_head');


