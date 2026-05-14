<?php
/**
 * Hero Slider Section
 */
?>

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner">
        <!-- اسلاید ۱ -->
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_img_01.jpg" alt="Zay eCommerce">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>Zay</b> فروشگاه اینترنتی</h1>
                            <h3 class="h2">قالب فروشگاهی کوچک و کامل</h3>
                            <p>
                                فروشگاه Zay یک قالب فروشگاهی HTML5 CSS با آخرین نسخه Bootstrap 5 است. 
                                این قالب ۱۰۰٪ رایگان است.
                            </p>
                            <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-success btn-lg mt-3">
                                شروع خرید
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- اسلاید ۲ -->
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_img_02.jpg" alt="کیفیت بالا">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">محصولات با کیفیت</h1>
                            <h3 class="h2">ضمانت کیفیت و اصالت کالا</h3>
                            <p>
                                ما تنها محصولات با کیفیت و اورجینال را به شما ارائه می‌دهیم. 
                                تمام محصولات دارای گارانتی هستند.
                            </p>
                            <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-success btn-lg mt-3">
                                درباره ما
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- اسلاید ۳ -->
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_img_03.jpg" alt="تحویل سریع">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">تحویل سریع</h1>
                            <h3 class="h2">ارسال به سراسر کشور</h3>
                            <p>
                                محصولات شما در سریع‌ترین زمان ممکن به دستتان می‌رسد. 
                                ارسال رایگان برای خریدهای بالای 500,000 تومان.
                            </p>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-success btn-lg mt-3">
                                تماس با ما
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- کنترل‌های اسلایدر -->
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->