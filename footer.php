    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><i class="fas fa-map-marker-alt fa-fw"></i> آدرس: تهران، خیابان نمونه</li>
                        <li><i class="fa fa-phone fa-fw"></i> تلفن: ۰۲۱-۱۲۳۴۵۶۷۸</li>
                        <li><i class="fa fa-envelope fa-fw"></i> ایمیل: info@zayshop.com</li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">دسته‌بندی‌ها</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">ساعت</a></li>
                        <li><a class="text-decoration-none" href="#">کفش</a></li>
                        <li><a class="text-decoration-none" href="#">اکسسوری</a></li>
                        <li><a class="text-decoration-none" href="#">لباس</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">لینک‌های مفید</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="<?php echo esc_url(home_url('/')); ?>">خانه</a></li>
                        <li><a class="text-decoration-none" href="<?php echo esc_url(home_url('/about')); ?>">درباره ما</a></li>
                        <li><a class="text-decoration-none" href="<?php echo esc_url(home_url('/contact')); ?>">تماس با ما</a></li>
                    </ul>
                </div>
            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="#"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            کلیه حقوق محفوظ است &copy; <?php echo date('Y'); ?> Zay Shop
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <?php wp_footer(); ?>
</body>
</html>