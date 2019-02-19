
<?php

/* Start the Loop */
while ( have_posts() ) :
    the_post();



    get_template_part( 'single', 'mobile' );



endwhile;
