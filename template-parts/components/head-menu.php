<!--header start-->
<header class="head-section">
    <div class="navbar navbar-default navbar-static-top container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                Catalog <span>Mobile</span> <sup>v1.0</sup>
            </a>
        </div>

        <div class="navbar-collapse collapse">
            <?php
            // print menu
            wp_nav_menu( $args = array(
                'theme_location'    => 'top',
                'container'         => 'div',
                'container_id'      => 'top-menu',
                'container_class'   => 'navbar-collapse collapse',
                'menu_class'        => 'nav navbar-nav',
                'echo'              => true,
                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s <li><input class="form-control search" placeholder=" Search" type="text"></li></ul>',
                'depth'             => 10,
                'walker'            => new MobileCategory\HeadNavMenu
            ));
            ?>
        </div>
    </div>
</header>
<!--header end-->