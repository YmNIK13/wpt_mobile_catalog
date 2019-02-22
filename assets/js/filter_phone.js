jQuery(document).ready(function ($) {

    /*
    function formatItemMobile(){
        template =  '<div class="col-md-4">';
        template +=  '    <div class="mobiles__item">';
        template +=  '      <div class="mobiles__item-img">';
        template +=  '          <img src="<?php the_post_thumbnail_url("large") ?>">';
        template +=  '      </div>';
        template +=  '      <div  class="mobiles__item-title">';
        template +=  '          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>';
        template +=  '      </div>';
        template +=  '    </div>';
        template +=  '</div>';
    }
    //*/


    $('#ajax_btn').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/ajax-filter",
            data: {
                'method_ajax' : 'filter_mobile',
                'filter' : $('#filters-mobile').serialize()
            },
            dataType: "json",
            success: function (msg) {

                console.log("Прибыли данные: ");
                console.log(msg);
            }
        });
    });
});

