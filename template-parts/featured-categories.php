<?php
/**
 * Featured Categories Section
 */
?>

<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">دسته‌بندی‌های پرطرفدار</h1>
            <p class="lead">
                محبوب‌ترین دسته‌بندی‌های این ماه را کشف کنید و از جدیدترین محصولات دیدن کنید.
            </p>
        </div>
    </div>
    
    <div class="row">
        <?php
        // اگر ووکامرس فعال است، دسته‌بندی‌های واقعی را نشان بده
        if (class_exists('WooCommerce')) {
            $featured_categories = get_terms(array(
                'taxonomy'   => 'product_cat',
                'number'     => 3,
                'hide_empty' => true,
                'orderby'    => 'count',
                'order'      => 'DESC'
            ));

            if ($featured_categories && !is_wp_error($featured_categories)) {
                $counter = 1;
                foreach ($featured_categories as $category) {
                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                    $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : get_template_directory_uri() . '/assets/img/category_img_0' . $counter . '.jpg';
                    $category_url = get_term_link($category);
                    ?>
                    <div class="col-12 col-md-4 p-5 mt-3">
                        <a href="<?php echo esc_url($category_url); ?>" class="text-decoration-none">
                            <div class="text-center">
                                <img src="<?php echo esc_url($image_url); ?>" 
                                     class="rounded-circle img-fluid border shadow-sm" 
                                     alt="<?php echo esc_attr($category->name); ?>"
                                     style="width: 200px; height: 200px; object-fit: cover;">
                                <h5 class="mt-3 mb-2 text-dark"><?php echo $category->name; ?></h5>
                                <p class="text-muted"><?php echo $category->count; ?> محصول</p>
                            </div>
                        </a>
                        <p class="text-center">
                            <a href="<?php echo esc_url($category_url); ?>" class="btn btn-success px-4">
                                مشاهده محصولات
                            </a>
                        </p>
                    </div>
                    <?php
                    $counter++;
                }
            } else {
                // حالت fallback اگر دسته‌بندی وجود ندارد
                zay_shop_display_fallback_categories();
            }
        } else {
            // اگر ووکامرس فعال نیست، دسته‌بندی‌های ثابت نشان داده شود
            zay_shop_display_fallback_categories();
        }
        ?>
    </div>
</section>
<!-- End Categories of The Month -->

<?php
// تابع برای نمایش دسته‌بندی‌های ثابت
function zay_shop_display_fallback_categories() {
    $categories = array(
        array(
            'image' => 'category_img_01.jpg',
            'title' => 'ساعت‌ها',
            'count' => '24'
        ),
        array(
            'image' => 'category_img_02.jpg',
            'title' => 'کفش‌ها',
            'count' => '36'
        ),
        array(
            'image' => 'category_img_03.jpg',
            'title' => 'اکسسوری',
            'count' => '18'
        )
    );
    
    foreach ($categories as $category) {
        ?>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#" class="text-decoration-none">
                <div class="text-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $category['image']; ?>" 
                         class="rounded-circle img-fluid border shadow-sm" 
                         alt="<?php echo $category['title']; ?>"
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <h5 class="mt-3 mb-2 text-dark"><?php echo $category['title']; ?></h5>
                    <p class="text-muted"><?php echo $category['count']; ?> محصول</p>
                </div>
            </a>
            <p class="text-center">
                <a href="#" class="btn btn-success px-4">مشاهده محصولات</a>
            </p>
        </div>
        <?php
    }
}
?>