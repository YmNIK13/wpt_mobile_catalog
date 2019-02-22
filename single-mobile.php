<?php
/*
Template Name: Шаблон мобильного телефон
Template Post Type: mobile
*/

if (!defined('ABSPATH')) {
    exit;
}


$mobile = get_post();
setup_postdata($mobile);


get_header(); ?>

    <!--container start-->
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="text-align: center;">
                <img src="<?= get_the_post_thumbnail_url($mobile->ID, 'large') ?>" style="max-height: 500px;">
            </div>

            <div class="col-lg-6">
                <div class="title">
                    <h3>Product details</h3>
                    <hr>
                </div>
                <ul class="list-unstyled pf-list">
                    <li>
                        <i class="fa fa-arrow-circle-right pr-10"></i>
                        <b>Client: </b>
                        <span><a href="#">wrapbootstrap</a></span>
                    </li>
                    <li>
                        <i class="fa fa-arrow-circle-right pr-10"></i>
                        <b>Skills: </b>
                        <span><a href="#">WordPress</a>, <a href="#">HTML5</a></span>
                    </li>
                    <li>
                        <i class="fa fa-arrow-circle-right pr-10"></i>
                        <b>Colors: </b>
                        <span>blue, gray, purple</span>
                    </li>
                    <li>
                        <i class="fa fa-arrow-circle-right pr-10"></i>
                        <b>Release Date: </b>
                        <span>06 January, 2014</span>
                    </li>
                    <li>
                        <i class="fa fa-arrow-circle-right pr-10"></i>
                        <b>Launch Project: </b>
                        <span><a href="www.wrapbootstrap.com">wrapbootstrap</a></span>
                    </li>
                </ul>
            </div>
        </div>


        <div class="row">
            <!--portfolio-single start-->

            <div class="col-lg-12">
                <div class="title">
                    <h2><?= $mobile->post_title ?></h2>
                    <hr>
                </div>
                <div class="pf-detail">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>


        <ul class="pager">
            <li class="previous"><a href="#">&larr; Older</a></li>
            <li class="next"><a href="#">Newer &rarr;</a></li>
        </ul>
        <hr>
    </div>



    <div class="container">
        <!--recent work start-->
        <div class="row">
            <div class="col-lg-12 recent">
                <h3>Related Work</h3>
                <p>Some of our work we have done earlier</p>
                <div id="owl-demo" class="owl-carousel owl-theme wow fadeIn">

                    <div class="item view view-tenth">
                        <img src="/wp-content/themes/wpt_mobile_catalog/demo/works/img8.jpg" alt="work Image">
                        <div class="mask">
                            <a href="portfolio-single-image.html" class="info" data-toggle="tooltip"
                               data-placement="top" title="Details">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                    <div class="item view view-tenth">
                        <img src="/wp-content/themes/wpt_mobile_catalog/demo/works/img9.jpg" alt="work Image">
                        <div class="mask">
                            <a href="portfolio-single-image.html" class="info" data-toggle="tooltip"
                               data-placement="top" title="Details">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                    <div class="item view view-tenth">
                        <img src="/wp-content/themes/wpt_mobile_catalog/demo/works/img10.jpg" alt="work Image">
                        <div class="mask">
                            <a href="portfolio-single-image.html" class="info" data-toggle="tooltip"
                               data-placement="top" title="Details">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                    <div class="item view view-tenth">
                        <img src="/wp-content/themes/wpt_mobile_catalog/demo/works/img11.jpg" alt="work Image">
                        <div class="mask">
                            <a href="portfolio-single-image.html" class="info" data-toggle="tooltip"
                               data-placement="top" title="Details">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                    <div class="item view view-tenth">
                        <img src="/wp-content/themes/wpt_mobile_catalog/demo/works/img12.jpg" alt="work Image">
                        <div class="mask">
                            <a href="blog_detail.html" class="info" data-toggle="tooltip" data-placement="top"
                               title="Details">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                    <div class="item view view-tenth">
                        <img src="/wp-content/themes/wpt_mobile_catalog/demo/works/img13.jpg" alt="work Image">
                        <div class="mask">
                            <a href="blog_detail.html" class="info" data-toggle="tooltip" data-placement="top"
                               title="Details">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--recent work end-->
    </div>

    <script>
        jQuery(document).ready(function ($) {

            $("#owl-demo").owlCarousel({
                items: 4
            });

        });
    </script>


<?php get_footer(); ?>