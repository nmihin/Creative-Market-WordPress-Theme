<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'General',
          'content'   => '<p>Help content goes here!</p>'
        )
      ),
      'sidebar'       => 'Default value 0px'
    ),
    'sections'        => array( 
      array(
        'id'          => 'slider',
        'title'       => 'Slider'
      ),
      array(
        'id'          => 'header',
        'title'       => 'Header'
      ),
      array(
        'id'          => 'general_default',
        'title'       => 'General'
      ),
      array(
        'id'          => 'typo',
        'title'       => 'Typography'
      ),
      array(
        'id'          => 'socials',
        'title'       => 'Socials'
      ),
      array(
        'id'          => 'footer',
        'title'       => 'Footer'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'pp_slider_on',
        'label'       => 'Enable slider',
        'desc'        => 'Show slider on homepage',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'header_slider',
        'label'       => 'Header slider',
        'desc'        => 'Add title, description, background image and link for the slide',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_header_height',
        'label'       => 'Header height',
        'desc'        => 'Default 60px, select just a number.',
        'std'         => '60',
        'type'        => 'numeric-slider',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '50,400,1',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_sticky_menu',
        'label'       => 'Sticky header status',
        'desc'        => 'Enable/disable menu while scrolling',
        'std'         => 'true',
        'type'        => 'on-off',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          ),
          array(
            'value'       => 'enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'pp_logo_upload',
        'label'       => 'Upload logo',
        'desc'        => 'For best effect logo image should be transparent png, logo from live preview has 114x24px but you can use bigger, you will probably need to adjust some margins using options below',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'margin_top_logo',
        'label'       => 'Margin top logo',
        'desc'        => 'Default value 0px',
        'std'         => '0',
        'type'        => 'numeric-slider',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'margin_bottom_logo',
        'label'       => 'Margin bottom logo',
        'desc'        => 'Default value 0px',
        'std'         => '0',
        'type'        => 'numeric-slider',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'margin_left_logo',
        'label'       => 'Margin left logo',
        'desc'        => 'Default value 15px',
        'std'         => '15',
        'type'        => 'numeric-slider',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'margin_right_logo',
        'label'       => 'Margin right logo',
        'desc'        => 'Default value 10px',
        'std'         => '10',
        'type'        => 'numeric-slider',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_favicon_upload',
        'label'       => 'Favicon',
        'desc'        => 'Upload favicon here (16x16)',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'portfolio_title',
        'label'       => 'Portfolio title',
        'desc'        => 'Text on frontpage above portfolio boxes',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'slider_header',
        'label'       => 'Slider header',
        'desc'        => '',
        'std'         => '',
        'type'        => 'taxonomy-select',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => 'clients',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'skills',
        'label'       => 'Skills',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_enable_socials',
        'label'       => 'Enable Social Icons',
        'desc'        => '',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'socials',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'pp_headericons',
        'label'       => 'Footer social icons',
        'desc'        => 'Manage socials icons on header.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'socials',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'icons_service',
            'label'       => 'Choose service',
            'desc'        => '',
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => array( 
              array(
                'value'       => 'behance',
                'label'       => 'Behance',
                'src'         => ''
              ),
              array(
                'value'       => 'blogger',
                'label'       => 'Blogger',
                'src'         => ''
              ),
              array(
                'value'       => 'twitter',
                'label'       => 'Twitter',
                'src'         => ''
              ),
              array(
                'value'       => 'facebook',
                'label'       => 'Facebook',
                'src'         => ''
              ),
              array(
                'value'       => 'delicious',
                'label'       => 'Delicious',
                'src'         => ''
              ),
              array(
                'value'       => 'paypal',
                'label'       => 'PayPal',
                'src'         => ''
              ),
              array(
                'value'       => 'picassa',
                'label'       => 'Picassa',
                'src'         => ''
              ),
              array(
                'value'       => 'skype',
                'label'       => 'Skype',
                'src'         => ''
              ),
              array(
                'value'       => 'tumblr',
                'label'       => 'Tumblr',
                'src'         => ''
              ),
              array(
                'value'       => 'google-plus',
                'label'       => 'Google Plus',
                'src'         => ''
              ),
              array(
                'value'       => 'pinterest',
                'label'       => 'Pinterest',
                'src'         => ''
              ),
              array(
                'value'       => 'vine',
                'label'       => 'Vine',
                'src'         => ''
              ),
              array(
                'value'       => 'forrst',
                'label'       => 'Forrst',
                'src'         => ''
              ),
              array(
                'value'       => 'digg',
                'label'       => 'Digg',
                'src'         => ''
              ),
              array(
                'value'       => 'reddit',
                'label'       => 'Reddit',
                'src'         => ''
              ),
              array(
                'value'       => 'dribbble',
                'label'       => 'Dribbble',
                'src'         => ''
              ),
              array(
                'value'       => 'flickr',
                'label'       => 'Flickr',
                'src'         => ''
              ),
              array(
                'value'       => 'rss',
                'label'       => 'RSS',
                'src'         => ''
              ),
              array(
                'value'       => 'youtube',
                'label'       => 'YouTube',
                'src'         => ''
              ),
              array(
                'value'       => 'vimeo',
                'label'       => 'Vimeo',
                'src'         => ''
              ),
              array(
                'value'       => 'dropbox',
                'label'       => 'Dropbox',
                'src'         => ''
              ),
              array(
                'value'       => 'github',
                'label'       => 'GitHub',
                'src'         => ''
              ),
              array(
                'value'       => 'tumblr',
                'label'       => 'Tumblr',
                'src'         => ''
              ),
              array(
                'value'       => 'linkedin',
                'label'       => 'LinkedIn',
                'src'         => ''
              ),
              array(
                'value'       => 'instagram',
                'label'       => 'Instagram',
                'src'         => ''
              )
            )
          ),
          array(
            'id'          => 'icons_url',
            'label'       => 'URL to profile page',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'pp_breadcrumbs',
        'label'       => 'Enable Breadcrumbs',
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'on-off',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'pp_portfolio_number',
        'label'       => 'Number of portfolio items on page',
        'desc'        => 'Default 6, select a number.',
        'std'         => '6',
        'type'        => 'numeric-slider',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '6,18,1',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_header_text',
        'label'       => 'Header Text',
        'desc'        => 'Text on frontpage above portfolio boxes',
        'std'         => 'Welcome to my portfolio, feel free to look around and explore my projects',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_features_title',
        'label'       => 'Features Title',
        'desc'        => 'Features Title Text',
        'std'         => 'Focus',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_features_subtitle',
        'label'       => 'Features Subtitle',
        'desc'        => 'Features Subtitle Text',
        'std'         => 'What I do best',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_skills_title',
        'label'       => 'Skills Title',
        'desc'        => 'Features Subtitle Text',
        'std'         => 'Skills',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_skills_subtitle',
        'label'       => 'Skills Subtitle',
        'desc'        => 'Skills Subtitle Text',
        'std'         => 'Skills and Tools',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_posts_title',
        'label'       => 'Posts Title',
        'desc'        => 'Posts Title Text',
        'std'         => 'Blog',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_posts_subtitle',
        'label'       => 'Posts Subtitle',
        'desc'        => 'Posts Subtitle Text',
        'std'         => 'All my Posts',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_clients_title',
        'label'       => 'Clients Title',
        'desc'        => 'Clients Title Text',
        'std'         => 'Clients',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_clients_subtitle',
        'label'       => 'Clients Subtitle',
        'desc'        => 'Clients Subtitle Text',
        'std'         => 'I love working with the best',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_contact_title',
        'label'       => 'Contact Title',
        'desc'        => 'Contact Title Text',
        'std'         => 'Contact',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_contact_subtitle',
        'label'       => 'Contact Subtitle',
        'desc'        => 'Contact Subtitle Text',
        'std'         => 'Contact Me',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_map_x_coordinate',
        'label'       => 'Google map location ( X coordinate )',
        'desc'        => 'Insert Google maps X coordinate',
        'std'         => '34.1231447',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_map_y_coordinate',
        'label'       => 'Google map location ( Y coordinate )',
        'desc'        => 'Insert Google maps Y coordinate',
        'std'         => '-118.3884326',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_contact_mail',
        'label'       => 'Contact Information - Mail',
        'desc'        => 'Contact Mail in Footer',
        'std'         => 'johndoe@gmail.com',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_contact_name',
        'label'       => 'Contact Information - Name',
        'desc'        => 'Contact Name in Footer',
        'std'         => 'John Doe',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_contact_phone',
        'label'       => 'Contact Information - Phone',
        'desc'        => 'Contact Phone in Footer',
        'std'         => '555-2368',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_contact_address',
        'label'       => 'Contact Information - Address',
        'desc'        => 'Contact Address in Footer',
        'std'         => 'Mulholland Drive, Los Angeles',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_copyrights',
        'label'       => 'Copyrights text',
        'desc'        => 'Copyright Text in Footer',
        'std'         => '© Theme by <a href="http://themeforest.net/user/limbosaur">Reframe</a>. All Rights Reserved.',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_custom_css',
        'label'       => 'Custom CSS',
        'desc'        => 'To prevent problems with theme update, write here any custom css (or use child themes)',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_ajax_pf',
        'label'       => 'Enable AJAX loaded portfolio',
        'desc'        => 'Portfolio items are loaded on the same page instead of opening new page',
        'std'         => 'no',
        'type'        => 'select',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'no',
            'label'       => 'Disable',
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => 'Enable',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'pp_related_pf',
        'label'       => 'Recent items on single portfolio view',
        'desc'        => '',
        'std'         => 'show',
        'type'        => 'select',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => 'Hide',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'pp_samefilter_pf',
        'label'       => 'Show recent items on single portfolio view only from the same category as the current item',
        'desc'        => '',
        'std'         => 'show',
        'type'        => 'select',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'all',
            'label'       => 'All elements',
            'src'         => ''
          ),
          array(
            'value'       => 'same',
            'label'       => 'Only the same category (filter)',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'pp_recenttext_pf',
        'label'       => 'Recent Work text',
        'desc'        => 'Title of recent work secion on single portfolio view',
        'std'         => 'Recent Work',
        'type'        => 'text',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_portfolio_layout',
        'label'       => 'Portfolio columns layout',
        'desc'        => 'Choose number of columns for portfolio archive page',
        'std'         => '3',
        'type'        => 'select',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '3',
            'label'       => '3 columns',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4 columns',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'pp_portfolio_page',
        'label'       => 'Portfolio page title',
        'desc'        => '',
        'std'         => 'Portfolio',
        'type'        => 'text',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_portfolio_videothumb',
        'label'       => 'For "video portfolio" items show image thumbnail or video in archive and /portfolio page',
        'desc'        => 'Choose if you want to display thumbnails as image or as small embeded video',
        'std'         => '3',
        'type'        => 'select',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'video',
            'label'       => 'Video',
            'src'         => ''
          ),
          array(
            'value'       => 'thumb',
            'label'       => 'Image thumbnail',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'pp_portfolio_showpost',
        'label'       => 'Number of items to display on portfolio page',
        'desc'        => 'Choose how many items to display on portfolio page',
        'std'         => '9',
        'type'        => 'select',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          ),
          array(
            'value'       => '5',
            'label'       => '5',
            'src'         => ''
          ),
          array(
            'value'       => '6',
            'label'       => '6',
            'src'         => ''
          ),
          array(
            'value'       => '7',
            'label'       => '7',
            'src'         => ''
          ),
          array(
            'value'       => '8',
            'label'       => '8',
            'src'         => ''
          ),
          array(
            'value'       => '9',
            'label'       => '9',
            'src'         => ''
          ),
          array(
            'value'       => '10',
            'label'       => '10',
            'src'         => ''
          ),
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ),
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ),
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '16',
            'label'       => '16',
            'src'         => ''
          ),
          array(
            'value'       => '20',
            'label'       => '20',
            'src'         => ''
          ),
          array(
            'value'       => '32',
            'label'       => '32',
            'src'         => ''
          ),
          array(
            'value'       => '40',
            'label'       => '40',
            'src'         => ''
          ),
          array(
            'value'       => '99',
            'label'       => '99',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'pp_header_font',
        'label'       => 'Header Font Size',
        'desc'        => 'Default 32px, just select from slider.',
        'std'         => '32',
        'type'        => 'numeric-slider',
        'section'     => 'typo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_subheader_font',
        'label'       => 'Subheader Font Size',
        'desc'        => 'Default 19px, just select from slider.',
        'std'         => '19',
        'type'        => 'numeric-slider',
        'section'     => 'typo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_body_font',
        'label'       => 'Body Font Size',
        'desc'        => 'Default 14px, just select from slider.',
        'std'         => '14',
        'type'        => 'numeric-slider',
        'section'     => 'typo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pp_select_font',
        'label'       => 'Select Font Type',
        'desc'        => 'Default Open Sans.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array(
          array(
            'value'       => 'Open Sans',
            'label'       => 'Open Sans'
          ),
          array(
            'value'       => 'Amatic SC',
            'label'       => 'Amatic SC'
          ),
          array(
            'value'       => 'Great Vibes',
            'label'       => 'Great Vibes'
          ),
          array(
            'value'       => 'Droid Sans',
            'label'       => 'Droid Sans'
          ),
          array(
            'value'       => 'Playfair Display',
            'label'       => 'Playfair Display'
          ),
          array(
            'value'       => 'Pacifico',
            'label'       => 'Pacifico'
          ),
          array(
            'value'       => 'Enriqueta',
            'label'       => 'Enriqueta'
          ),
          array(
            'value'       => 'Lato',
            'label'       => 'Lato'
          ),
          array(
            'value'       => 'Roboto Condensed',
            'label'       => 'Roboto Condensed'
          ),
          array(
            'value'       => 'Roboto Slab',
            'label'       => 'Roboto Slab'
          ),
        )
      ),
      array(
        'id'          => 'sidebars_text',
        'label'       => 'About sidebars',
        'desc'        => 'All sidebars that you create here will appear both in the Appearance &gt; Widgets, and then you can choose them for specific pages or posts.',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'incr_sidebars',
        'label'       => 'Create Sidebars',
        'desc'        => 'Choose a unique title for each sidebar',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'id',
            'label'       => 'ID',
            'desc'        => 'Write a lowercase single world as ID (it can\'t start with a number!), without any spaces',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}