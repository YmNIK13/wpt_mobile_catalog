<?php
if (!defined('ABSPATH')) {
    exit;
}


MobileCategory\Theme::getMobile()->filterMobiles();

?>


<?php get_header(); ?>



<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="container">
            <div class="row">
                <?php if (have_posts()) { ?>
                    <div class="col-md-3">
                        <?php get_sidebar(); ?>
                    </div>
                    <div class="col-md-9">
                        <div class="row" id="mobiles_target_filter">
                        <?php while (have_posts()) {
                            the_post();

                            get_template_part('template-parts/content/content', 'mobile');
                        } ?>
                        </div>
                        <div class="row">
                            <?= MobileCategory\BlockHTML::getPagination(); ?>
                        </div>
                    </div>

                <?php } else {
                    get_template_part('template-parts/content/content', 'none');
                } ?>

            </div>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>