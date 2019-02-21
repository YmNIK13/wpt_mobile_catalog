jQuery(document).ready(function ($) {
    $('#ajax_btn').click(function (e) {

        $.ajax({
            type: "POST",
            url: "/ajax-filter",
            data: "name=John&location=Boston",
            dataType: "json",
            success: function (msg) {
                alert("Прибыли данные: " + msg);
            }
        });
    });
});

