<div class="col-md-4">
    <div class="mobiles__item">
        <div class="mobiles__item-img">
            <img src="<?php the_post_thumbnail_url('large') ?>">
        </div>
        <div  class="mobiles__item-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </div>
    </div>
</div>
