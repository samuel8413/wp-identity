<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        the_content();
    endwhile; 
endif;

the_posts_pagination();
rewind_posts();
?>