jQuery(document).ready(function ($) {
    $('#ajax_btn').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/ajax-filter",
            data: {
                'method_ajax': 'filter_mobile',
                'filter': $('#filters-mobile').serialize()
            },
            dataType: "json",

            success: function (data_json) {
                if (data_json.success) {
                    $('#mobiles_target_filter').loadTemplate($('#one_mobile_template'), data_json.data);
                }
            }
        });
    });


    $('#ajax_btn_rest').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/wp-json/mobile-category/v1/ajax-filter/",
            data: {
                'method_ajax': 'filter_mobile',
                'filter': $('#filters-mobile').serialize()
            },
            dataType: "json",

            success: function (data_json) {
                if (data_json.success) {
                    $('#mobiles_target_filter').loadTemplate($('#one_mobile_template'), data_json.data);
                }
            }
        });
    });
});

