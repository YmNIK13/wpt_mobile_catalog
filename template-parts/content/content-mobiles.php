<?php


$mobile = get_post();


/*
echo "<pre>";
print_r($mobile);
echo "</pre>";
// */


?>


<div class="col-md-4">
    <div style="height: 400px;">

        <div style="text-align: center;">
            <img src="<?= get_the_post_thumbnail_url($mobile->ID, 'large') ?>" style="max-height: 300px;">
        </div>
        <div style="overflow: hidden;max-height: 40px; padding: 5px;text-align: center;"><?= $mobile->post_title ?></div>
    </div>
</div>
