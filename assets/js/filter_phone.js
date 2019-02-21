jQuery(document).ready(function ($) {
    $('#ajax_btn').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/ajax-filter",
            data: $('#filters-mobile').serialize(),
            dataType: "json",
            success: function (msg) {
                console.log("Прибыли данные: ");
                console.log(msg);
            }
        });
    });
});

