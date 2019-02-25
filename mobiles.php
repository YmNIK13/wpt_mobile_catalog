<?php
if (!defined('ABSPATH')) {
    exit;
}


$mobiless = MobileCategory\Theme::getMobile()->filterMobiles();



?>


<?php get_header(); ?>



<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="container">
            <div class="row">
                <?php if ($mobiless->have_posts()) { ?>
                    <div class="col-md-3">
                        <?php get_sidebar(); ?>
                    </div>
                    <div class="col-md-9">
                        <div class="row" id="mobiles_target_filter">
                        <?php while ($mobiless->have_posts()) {
                            $mobiless->the_post();

                            get_template_part('template-parts/content/content', 'mobile');
                        } ?>
                        </div>
                        <div class="row">
                            <?= MobileCategory\BlockHTML::getPagination($mobiless); ?>
                        </div>
                    </div>

                <?php } else {
                    get_template_part('template-parts/content/content', 'none');
                } ?>

            </div>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->

<script type="text/html" id="one_mobile_template">
    <div class="col-md-4">
        <div class="mobiles__item">
            <div class="mobiles__item-img">
                <img data-src="img">
            </div>
            <div class="mobiles__item-title">
                <a data-link="link" data-content="title"></a>
            </div>
        </div>
    </div>
</script>

<?php get_footer(); ?>