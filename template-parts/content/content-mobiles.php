<?php


$mobile = get_post();



//*
echo "<pre>";
print_r($mobile);
echo "</pre>";
// */


?>



<div class="col-md-4">
    <div>
        <img src="<?= get_the_post_thumbnail_url($mobile->ID, 'large') ?>" style="max-height: 500px;">
    </div>
    <div><?= $mobile->post_title ?></div>
</div>
