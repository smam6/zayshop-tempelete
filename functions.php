<?php
/**
 * Zay Shop Theme Functions
 */

// امنیت - جلوگیری از دسترسی مستقیم
if (!defined('ABSPATH')) {
    exit;
}

/**
 * راه‌اندازی اولیه تم
 */
function zay_shop_setup() {
    // ترجمه فارسی
    load_theme_textdomain('zayshop', get_template_directory() . '/languages');
    
    // تگ عنوان خودکار
    add_theme_support('title-tag');
    
    // تصویر شاخص
    add_theme_support('post-thumbnails');
    
    // فید RSS
    add_theme_support('automatic-feed-links');
    
    // HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // فرمت‌های پست
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));
    
    // لوگو سفارشی
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    
    // پس‌زمینه سفارشی
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));
    
    // ویدئو در پس‌زمینه
    add_theme_support('custom-header', array(
        'default-image'          => '',
        'default-text-color'     => '000000',
        'width'                  => 1920,
        'height'                 => 1080,
        'flex-height'            => true,
        'video'                  => true,
    ));
    
    // اندازه‌های تصویر سفارشی
    add_image_size('zay_shop_medium', 300, 300, true);
    add_image_size('zay_shop_large', 800, 600, true);
    add_image_size('zay_shop_small', 150, 150, true);
    
    // منوها
    register_nav_menus(array(
        'primary'    => 'منوی اصلی',
        'footer'     => 'منوی فوتر',
        'top_bar'    => 'منوی نوار بالا',
        'mobile'     => 'منوی موبایل'
    ));
    
    // ویدجت‌ها
    add_theme_support('widgets');
    
    // ادیتور گوتنبرگ
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
    
    // wide alignment در ادیتور
    add_theme_support('align-wide');
    
    // پشتیبانی از ووکامرس
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'zay_shop_setup');

/**
 * ثبت ویدجت‌ها
 */
function zay_shop_widgets_init() {
    register_sidebar(array(
        'name'          => 'سایدبار اصلی',
        'id'            => 'sidebar-1',
        'description'   => 'ویجت‌های سایدبار اصلی',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => 'فوتر بخش ۱',
        'id'            => 'footer-1',
        'description'   => 'ویجت‌های بخش اول فوتر',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => 'فوتر بخش ۲',
        'id'            => 'footer-2',
        'description'   => 'ویجت‌های بخش دوم فوتر',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => 'ویجت‌های صفحه محصولات',
        'id'            => 'shop-sidebar',
        'description'   => 'ویجت‌های مربوط به صفحه محصولات',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'zay_shop_widgets_init');

/**
 * اضافه کردن فایل‌های CSS و JS
 */
function zay_shop_scripts() {
    // استایل‌ها
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '6.4.0');
    wp_enqueue_style('templatemo', get_template_directory_uri() . '/assets/css/templatemo.css', array(), '1.0');
    wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap', array(), null);
    wp_enqueue_style('zay-shop-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // اسکریپت‌ها
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_script('templatemo', get_template_directory_uri() . '/assets/js/templatemo.js', array('jquery'), '1.0', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);
    
    // اسکریپت‌های وردپرس
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // AJAX برای جستجو
    wp_localize_script('custom', 'zay_shop_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('zay_shop_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'zay_shop_scripts');

/**
 * منوی پیش‌فرض وقتی منویی تنظیم نشده
 */
function zay_shop_fallback_menu() {
    echo '<ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">';
    echo '<li class="nav-item"><a class="nav-link" href="' . home_url() . '">خانه</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . admin_url('nav-menus.php') . '">مدیریت منوها</a></li>';
    echo '</ul>';
}

/**
 * اضافه کردن کلاس به منوها
 */
function zay_shop_menu_classes($classes, $item, $args) {
    if ($args->theme_location == 'primary') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'zay_shop_menu_classes', 1, 3);

function zay_shop_menu_link_classes($atts, $item, $args) {
    if ($args->theme_location == 'primary') {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'zay_shop_menu_link_classes', 10, 3);

/**
 * بهینه‌سازی برای سئو
 */
function zay_shop_seo_optimization() {
    // حذف نسخه وردپرس از کد
    remove_action('wp_head', 'wp_generator');
    
    // حذف لینک‌های اضافی
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // حذف emoji
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'zay_shop_seo_optimization');

/**
 * کاستومایزر وردپرس
 */
function zay_shop_customize_register($wp_customize) {
    // بخش تنظیمات عمومی
    $wp_customize->add_section('zay_shop_general', array(
        'title'    => 'تنظیمات عمومی',
        'priority' => 20,
    ));
    
    // لوگو
    $wp_customize->add_setting('zay_shop_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zay_shop_logo', array(
        'label'    => 'لوگو سایت',
        'section'  => 'zay_shop_general',
        'settings' => 'zay_shop_logo',
    )));
    
    // اطلاعات تماس
    $wp_customize->add_setting('zay_shop_phone', array(
        'default' => '010-020-0340',
    ));
    $wp_customize->add_control('zay_shop_phone', array(
        'label'   => 'شماره تلفن',
        'section' => 'zay_shop_general',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('zay_shop_email', array(
        'default' => 'info@company.com',
    ));
    $wp_customize->add_control('zay_shop_email', array(
        'label'   => 'آدرس ایمیل',
        'section' => 'zay_shop_general',
        'type'    => 'email',
    ));
    
    $wp_customize->add_setting('zay_shop_address', array(
        'default' => '123 Consectetur at ligula 10660',
    ));
    $wp_customize->add_control('zay_shop_address', array(
        'label'   => 'آدرس',
        'section' => 'zay_shop_general',
        'type'    => 'textarea',
    ));
    
    // شبکه‌های اجتماعی
    $wp_customize->add_section('zay_shop_social', array(
        'title'    => 'شبکه‌های اجتماعی',
        'priority' => 30,
    ));
    
    $social_platforms = array(
        'facebook'  => 'فیسبوک',
        'twitter'   => 'توییتر',
        'instagram' => 'اینستاگرام',
        'linkedin'  => 'لینکدین',
        'youtube'   => 'یوتیوب'
    );
    
    foreach ($social_platforms as $platform => $label) {
        $wp_customize->add_setting("zay_shop_{$platform}_url");
        $wp_customize->add_control("zay_shop_{$platform}_url", array(
            'label'   => "آدرس {$label}",
            'section' => 'zay_shop_social',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'zay_shop_customize_register');

/**
 * توابع کمکی
 */

// دریافت آدرس شبکه اجتماعی
function zay_shop_get_social_url($platform) {
    return get_theme_mod("zay_shop_{$platform}_url", '#');
}

// دریافت اطلاعات تماس
function zay_shop_get_contact_info() {
    return array(
        'phone'   => get_theme_mod('zay_shop_phone', '010-020-0340'),
        'email'   => get_theme_mod('zay_shop_email', 'info@company.com'),
        'address' => get_theme_mod('zay_shop_address', '123 Consectetur at ligula 10660')
    );
}

// نمایش تاریخ به صورت فارسی
function zay_shop_persian_date() {
    return date_i18n('j F Y');
}

/**
 * امنیت اضافی
 */

// جلوگیری از اسکنرها
function zay_shop_block_scanners() {
    if (strpos($_SERVER['REQUEST_URI'], 'wp-admin') !== false && 
        strpos($_SERVER['REQUEST_URI'], 'admin-ajax.php') === false) {
        if (!is_user_logged_in()) {
            wp_die('دسترسی غیرمجاز');
        }
    }
}
add_action('init', 'zay_shop_block_scanners');

// غیرفعال کردن XML-RPC برای امنیت
add_filter('xmlrpc_enabled', '__return_false');

/**
 * بهینه‌سازی پایگاه داده
 */

// پاکسازی خودکار ریوایژن‌ها
function zay_shop_limit_post_revisions($num, $post) {
    return 3;
}
add_filter('wp_revisions_to_keep', 'zay_shop_limit_post_revisions', 10, 2);


/**
 * پشتیبانی از AJAX
 */

// جستجوی AJAX
function zay_shop_ajax_search() {
    check_ajax_referer('zay_shop_nonce', 'nonce');
    
    $search_term = sanitize_text_field($_POST['s']);
    $args = array(
        'post_type'      => array('post', 'page', 'product'),
        'post_status'    => 'publish',
        's'              => $search_term,
        'posts_per_page' => 5
    );
    
    $search_query = new WP_Query($args);
    $results = array();
    
    if ($search_query->have_posts()) {
        while ($search_query->have_posts()) {
            $search_query->the_post();
            $results[] = array(
                'title' => get_the_title(),
                'url'   => get_permalink(),
                'type'  => get_post_type()
            );
        }
        wp_reset_postdata();
    }
    
    wp_send_json_success($results);
}
add_action('wp_ajax_zay_shop_search', 'zay_shop_ajax_search');
add_action('wp_ajax_nopriv_zay_shop_search', 'zay_shop_ajax_search');

/**
 * ریدایرکت بعد از لاگین
 */
function zay_shop_login_redirect($redirect_to, $request, $user) {
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('administrator', $user->roles)) {
            return admin_url();
        } else {
            return home_url();
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'zay_shop_login_redirect', 10, 3);

/**
 * اضافه کردن پشتیبانی از SVG
 */
function zay_shop_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'zay_shop_mime_types');

/**
 * دیباگ و لاگ
 */
function zay_shop_debug_log($message) {
    if (WP_DEBUG === true) {
        if (is_array($message) || is_object($message)) {
            error_log(print_r($message, true));
        } else {
            error_log($message);
        }
    }
}

/**
 * هوک برای اضافه کردن قابلیت‌های سفارشی
 */
do_action('zay_shop_after_setup');

// پایان فایل
?>