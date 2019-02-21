<?php
if (!defined('ABSPATH')) {
    exit;
} ?>


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
                        <?php while (have_posts()) {
                            the_post();

                            get_template_part('template-parts/content/content', 'mobile');
                        }
                        MobileCategory\Theme::getPagination();

                        ?>
                    </div>

                <?php } else {
                    get_template_part('template-parts/content/content', 'none');
                } ?>

            </div>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->


<div class="container">

    <div class="row">
        <div class="col-md-6">
            <ul id="filters" class="clearfix">
                <li><span class="filter active" data-filter="app card icon logo web">All</span></li>
                <li><span class="filter" data-filter="app">App</span></li>
                <li><span class="filter" data-filter="card">Card</span></li>
                <li><span class="filter" data-filter="icon">Icon</span></li>
                <li><span class="filter" data-filter="logo">Logo</span></li>
                <li><span class="filter" data-filter="web">Web</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mar-b-30">
        <div id="portfoliolist-three">
            <div class="col-md-12">
                <div class="portfolio logo" data-cat="logo">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/logo/5.jpg" class="magnefig label label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/logo/5.jpg" alt=""/>

                        </div>
                    </div>
                </div>

                <div class="portfolio app" data-cat="app">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/app/3.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/app/3.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio web" data-cat="web">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/web/1.jpg" class="label magnefig label-info icon icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/web/1.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio card" data-cat="card">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/card/1.jpg" class="label magnefig label-info icon icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/card/1.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio app" data-cat="app">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/app/3.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/app/3.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio card" data-cat="card">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/card/1.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/card/1.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio card" data-cat="card">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/card/4.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/card/4.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio logo" data-cat="logo">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/logo/5.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/logo/5.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio app" data-cat="app">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/app/1.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/app/1.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio card" data-cat="card">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/card/2.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/card/2.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio logo" data-cat="logo">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/logo/5.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/logo/5.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio logo" data-cat="logo">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/logo/5.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/logo/5.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio icon" data-cat="icon">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/icon/3.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/icon/3.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio web" data-cat="web">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/web/1.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/web/1.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio icon" data-cat="icon">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/icon/1.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/icon/1.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio web" data-cat="web">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/web/2.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/web/2.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio icon" data-cat="icon">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/icon/3.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/icon/3.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio icon" data-cat="icon">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/icon/5.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/icon/5.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio web" data-cat="web">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/web/4.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/web/4.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio logo" data-cat="logo">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/logo/2.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/logo/2.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio logo" data-cat="logo">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/logo/3.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/logo/3.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio icon" data-cat="icon">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/logo/5.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/logo/5.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio card" data-cat="card">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/card/4.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/card/4.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="portfolio logo" data-cat="logo">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-hover">
                            <div class="image-caption">
                                <a href="img/portfolios/logo/5.jpg" class="label magnefig label-info icon"
                                   data-toggle="tooltip" data-placement="left" title="Zoom"><i
                                            class="fa fa-eye"></i></a>
                                <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip"
                                   data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right"
                                   title="Likes"><i class="fa fa-heart"></i></a>

                            </div>
                            <img src="/wp-content/themes/wpt_mobile_catalog/demo/portfolios/logo/5.jpg" alt=""/>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $('.image-caption a').tooltip();

        var filterList = {

            init: function () {

                // MixItUp plugin
                // http://mixitup.io
                $('#portfoliolist-three').mixitup({
                    targetSelector: '.portfolio',
                    filterSelector: '.filter',
                    effects: ['fade'],
                    easing: 'snap',
                    // call the hover effect
                    onMixEnd: filterList.hoverEffect()
                });

            },

            hoverEffect: function () {
                $("[rel='tooltip']").tooltip();
                // Simple parallax effect
                $('#portfoliolist-three .portfolio .portfolio-hover').hover(
                    function () {
                        $(this).find('.image-caption').slideDown(250); //.fadeIn(250)
                    },
                    function () {
                        $(this).find('.image-caption').slideUp(250); //.fadeOut(205)
                    }
                );
            }

        };

        // Run the show!
        filterList.init();


        $('.magnefig').each(function () {
            $(this).magnificPopup({
                type: 'image',
                removalDelay: 300,
                mainClass: 'mfp-fade'
            })
        });

        $("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            stopOnHover: true,

        });

    });

</script>


<?php get_footer(); ?>




