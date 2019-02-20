<?php if(!is_front_page()){ ?>
<!--breadcrumbs start-->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <h1><?= MobileCategory\Theme::getTitle(); ?></h1>
            </div>
            <div class="col-lg-8 col-sm-8">
                <ol class="breadcrumb pull-right">
                    <?php foreach (MobileCategory\Theme::getBreadcrumb() as $breadcrumb_item) { ?>
                        <li><?= $breadcrumb_item ?></li>
                    <?php } ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs end-->
<?php } ?>