<?php
/**
 * Featured Products Section
 */
?>

<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">محصولات ویژه</h1>
                <p class="lead">
                    منتخبی از بهترین محصولات ما را کشف کنید. این محصولات با بالاترین کیفیت و طراحی‌های منحصر به فرد ارائه می‌شوند.
                </p>
            </div>
        </div>
        
        <div class="row">
            <?php
            // اگر ووکامرس فعال است، محصولات ویژه واقعی را نشان بده
            if (class_exists('WooCommerce')) {
                $featured_products_args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 3,
                    'meta_query'     => array(
                        array(
                            'key'   => '_featured',
                            'value' => 'yes'
                        )
                    )
                );

                $featured_products = new WP_Query($featured_products_args);

                if ($featured_products->have_posts()) {
                    while ($featured_products->have_posts()) {
                        $featured_products->the_post();
                        global $product;
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <a href="<?php the_permalink(); ?>">
                                    <?php 
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium', array('class' => 'card-img-top'));
                                    } else {
                                        echo '<img src="' . get_template_directory_uri() . '/assets/img/feature_prod_01.jpg" class="card-img-top" alt="' . get_the_title() . '">';
                                    }
                                    ?>
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div>
                                            <?php
                                            $rating = $product->get_average_rating();
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $rating) {
                                                    echo '<i class="text-warning fa fa-star"></i>';
                                                } else {
                                                    echo '<i class="text-muted fa fa-star"></i>';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <span class="text-success fw-bold">
                                            <?php echo $product->get_price_html(); ?>
                                        </span>
                                    </div>
                                    
                                    <h3 class="h5 card-title">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <p class="card-text flex-grow-1">
                                        <?php 
                                        $excerpt = get_the_excerpt();
                                        if (empty($excerpt)) {
                                            echo 'محصول با کیفیت بالا و طراحی منحصر به فرد.';
                                        } else {
                                            echo wp_trim_words($excerpt, 12);
                                        }
                                        ?>
                                    </p>
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <small class="text-muted">
                                            <i class="fa fa-comment me-1"></i>
                                            <?php echo $product->get_review_count(); ?> نظر
                                        </small>
                                        <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" 
                                           class="btn btn-success btn-sm">
                                            <i class="fa fa-shopping-cart me-1"></i>
                                            افزودن به سبد
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    // حالت fallback اگر محصول ویژه‌ای وجود ندارد
                    zay_shop_display_fallback_products();
                }
            } else {
                // اگر ووکامرس فعال نیست، محصولات ثابت نشان داده شود
                zay_shop_display_fallback_products();
            }
            ?>
        </div>
        
        <!-- دکمه مشاهده همه محصولات -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="<?php echo class_exists('WooCommerce') ? esc_url(wc_get_page_permalink('shop')) : '#'; ?>" 
                   class="btn btn-outline-success btn-lg">
                    مشاهده همه محصولات
                    <i class="fa fa-arrow-left ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End Featured Product -->

<?php
// تابع برای نمایش محصولات ثابت
function zay_shop_display_fallback_products() {
    $products = array(
        array(
            'image' => 'feature_prod_01.jpg',
            'title' => 'وزنه بدنسازی',
            'price' => '240,000 تومان',
            'rating' => 3,
            'reviews' => 24,
            'description' => 'وزنه بدنسازی با کیفیت عالی و طراحی ارگونومیک برای تمرینات حرفه‌ای'
        ),
        array(
            'image' => 'feature_prod_02.jpg',
            'title' => 'کفش نایک',
            'price' => '480,000 تومان',
            'rating' => 3,
            'reviews' => 48,
            'description' => 'کفش ورزشی نایک با طراحی مدرن و Comfort بالا برای ورزش روزانه'
        ),
        array(
            'image' => 'feature_prod_03.jpg',
            'title' => 'کفش آدیداس',
            'price' => '360,000 تومان',
            'rating' => 5,
            'reviews' => 74,
            'description' => 'کفش آدیداس مناسب برای ورزش و استفاده روزمره با کیفیت عالی'
        )
    );
    
    foreach ($products as $product) {
        ?>
        <div class="col-12 col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $product['image']; ?>" 
                         class="card-img-top" 
                         alt="<?php echo $product['title']; ?>">
                </a>
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $product['rating']) {
                                    echo '<i class="text-warning fa fa-star"></i>';
                                } else {
                                    echo '<i class="text-muted fa fa-star"></i>';
                                }
                            }
                            ?>
                        </div>
                        <span class="text-success fw-bold"><?php echo $product['price']; ?></span>
                    </div>
                    
                    <h3 class="h5 card-title">
                        <a href="#" class="text-decoration-none text-dark">
                            <?php echo $product['title']; ?>
                        </a>
                    </h3>
                    
                    <p class="card-text flex-grow-1">
                        <?php echo $product['description']; ?>
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <small class="text-muted">
                            <i class="fa fa-comment me-1"></i>
                            <?php echo $product['reviews']; ?> نظر
                        </small>
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="fa fa-shopping-cart me-1"></i>
                            افزودن به سبد
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>