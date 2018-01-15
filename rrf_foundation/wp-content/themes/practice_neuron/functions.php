<?php 

    function p_neuron_theme_files() {
        wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '1.0', 'all');
        wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/fonts/font-awesome/css/font-awesome.min.css', array(), '1.0', 'all');
        wp_enqueue_style('owl.carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css', array(), '1.0', 'all');
        wp_enqueue_style('bootsnav', get_template_directory_uri(). '/assets/css/bootsnav.css', array(), '1.0', 'all');
        wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css', array(), '1.0', 'all');
        wp_enqueue_style('p_neuron-style',get_stylesheet_uri() );
        
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('bootsnav', get_template_directory_uri().'/assets/js/bootsnav.js', array('jquery'), '1.0', true);
        wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('wow', get_template_directory_uri().'/assets/js/wow.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('ajaxchimp', get_template_directory_uri().'/assets/js/ajaxchimp.js', array('jquery'), '1.0', true);
        wp_enqueue_script('ajaxchimp-config', get_template_directory_uri().'/assets/js/ajaxchimp-config.js', array('jquery'), '1.0', true  );
        wp_enqueue_script('script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '1.0', true  );
    }
    add_action('wp_enqueue_scripts','p_neuron_theme_files');


    function p_neuron_theme_setup() {
        // theme textdomain
        load_theme_textdomain( 'p-neuron-rrfonline', get_template_directory(). '/languages' );
        
        // add automatic feed link in header
        add_theme_support( 'automatic-feed-links' );
        
        // add title tag
        add_theme_support( 'title-tag' );
        
        // post thumbnail support
        add_theme_support( 'post-thumbnails' );
        
        // adding menu_order
        register_nav_menus( array(
            'p-menu-1' => esc_html__( 'p-primary', 'p-neuron-rrfonline' ),
        ) );
        
         //html:5 support
    add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
        
        // selective refresh for widgets
        add_theme_support( 'customize-selective-refresh-widgets' );
        
        // custom logo support 
        add_theme_support( 'custom-logo', array(
                            'height' => 250,
                            'width' => 250,
                            'flex-width' => true,
                            'flex-height' => true,
            
                        ) );
        
    }
    add_action('after_setup_theme','p_neuron_theme_setup');


    // Custom post for slider bg
    function neuron_theme_custom_posts() {
        
        $labels = array(
                          'name' => __( 'Slides' ),
                          'singular_name' => __( 'Slide' ) 
                       );
            
        $args = array(
                      'labels' => $labels,
                      'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
                      'public' => false,
                      'show_ui' => true
                      );
        register_post_type( 'slide', $args ); 
    }
    add_action('init', 'neuron_theme_custom_posts');



?>
