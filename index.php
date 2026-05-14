<?php get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4"><?php bloginfo('name'); ?></h1>
            
            <?php if (have_posts()) : ?>
                <div class="row">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-md-6 mb-4">
                            <article class="card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <div class="card-text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-success">ادامه مطلب</a>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div class="alert alert-info text-center">
                    <p>هنوز مطلبی منتشر نشده است.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>