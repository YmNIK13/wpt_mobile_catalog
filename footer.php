<!--footer start-->
<?php // get_template_part('template-parts\components\footer', 'menu') ?>
<!-- footer end -->

<!--small footer start -->
<?php // get_template_part('template-parts\components\footer', 'social') ?>
<!--small footer end-->


<?php wp_footer(); ?>

<!--noindex-->
<div style="display: "><?php
    //*
     print get_num_queries(). ' - столько SQL запросов к базе.<br />'
         . timer_stop(0, 6). ' - за столько сгенерировалась страница.';
    //*/
    ?></div>
<!--/noindex-->

</body>
</html>

