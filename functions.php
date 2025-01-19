<?php
function bizpage_theme_styles() {
    // Enqueue CSS files
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700');
    wp_enqueue_style('bootstrap', get_theme_file_uri('/lib/bootstrap/css/bootstrap.min.css'));
    wp_enqueue_style('font-awesome', get_theme_file_uri('/lib/font-awesome/css/font-awesome.min.css'));
    wp_enqueue_style('animate', get_theme_file_uri('/lib/animate/animate.min.css'));
    wp_enqueue_style('ionicons', get_theme_file_uri('/lib/ionicons/css/ionicons.min.css'));
    wp_enqueue_style('owlcarousel', get_theme_file_uri('/lib/owlcarousel/assets/owl.carousel.min.css'));
    wp_enqueue_style('lightbox', get_theme_file_uri('/lib/lightbox/css/lightbox.min.css'));
    wp_enqueue_style('main-style', get_theme_file_uri('/css/style.css'));

    // Enqueue JavaScript files
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-migrate', get_theme_file_uri('/lib/jquery/jquery-migrate.min.js'), array('jquery'), '', true);
    wp_enqueue_script('bootstrap', get_theme_file_uri('/lib/bootstrap/js/bootstrap.bundle.min.js'), array('jquery'), '', true);
    wp_enqueue_script('easing', get_theme_file_uri('/lib/easing/easing.min.js'), array('jquery'), '', true);
    wp_enqueue_script('superfish', get_theme_file_uri('/lib/superfish/hoverIntent.js'), array('jquery'), '', true);
    wp_enqueue_script('superfish-main', get_theme_file_uri('/lib/superfish/superfish.min.js'), array('jquery'), '', true);
    wp_enqueue_script('wow', get_theme_file_uri('/lib/wow/wow.min.js'), array('jquery'), '', true);
    wp_enqueue_script('waypoints', get_theme_file_uri('/lib/waypoints/waypoints.min.js'), array('jquery'), '', true);
    wp_enqueue_script('counterup', get_theme_file_uri('/lib/counterup/counterup.min.js'), array('jquery'), '', true);
    wp_enqueue_script('owlcarousel', get_theme_file_uri('/lib/owlcarousel/owl.carousel.min.js'), array('jquery'), '', true);
    wp_enqueue_script('isotope', get_theme_file_uri('/lib/isotope/isotope.pkgd.min.js'), array('jquery'), '', true);
    wp_enqueue_script('lightbox', get_theme_file_uri('/lib/lightbox/js/lightbox.min.js'), array('jquery'), '', true);
    wp_enqueue_script('touchSwipe', get_theme_file_uri('/lib/touchSwipe/jquery.touchSwipe.min.js'), array('jquery'), '', true);
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), array('jquery'), '', true);
    wp_enqueue_script('contact-form', get_theme_file_uri('/js/contact-form.js'), array('jquery'), '1.0', true);
    wp_localize_script('contact-form', 'contactForm', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('contact_form_submit')
    ));
}
add_action('wp_enqueue_scripts', 'bizpage_theme_styles');

// Theme Support
function bizpage_theme_support() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    
    // Add support for title tag
    add_theme_support('title-tag');
    
    // Register Navigation Menu
    register_nav_menu('top_menu', 'Menu Atas');
    
    // Add theme support for Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'bizpage_theme_support');

// Register widget areas
function bizpage_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'bizpage'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer.', 'bizpage'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'bizpage'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer.', 'bizpage'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'bizpage'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in footer.', 'bizpage'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'bizpage_widgets_init');

add_action('wp_ajax_contact_form_submit', 'handle_contact_form');
add_action('wp_ajax_nopriv_contact_form_submit', 'handle_contact_form');

function handle_contact_form() {
    check_ajax_referer('contact_form_submit', 'nonce');
    require_once get_template_directory() . '/inc/process-contact.php';
    exit;
}
