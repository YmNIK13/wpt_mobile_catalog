<?php
if (!defined('ABSPATH')) {
    exit;
}


query_posts(array(
    'nopaging' => false,
    'posts_per_page' => 6,
    'post_type' => 'mobile',
    'paged' => get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1,
));

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
                        <div class="row">
                        <?php while (have_posts()) {
                            the_post();

                            get_template_part('template-parts/content/content', 'mobiles');
                        } ?>
                        </div>
                        <div class="row">
                            <?= MobileCategory\Theme::getPagination(); ?>
                        </div>
                    </div>

                <?php } else {
                    get_template_part('template-parts/content/content', 'none');
                } ?>

            </div>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->
