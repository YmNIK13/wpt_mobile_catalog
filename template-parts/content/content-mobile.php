<div class="col-md-4">
    <div style="height: 400px;">

        <div style="text-align: center;">
            <img src="<?php the_post_thumbnail_url('large') ?>" style="max-height: 300px;">
        </div>
        <div style="overflow: hidden;max-height: 40px; padding: 5px;text-align: center;">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </div>
    </div>
</div>
