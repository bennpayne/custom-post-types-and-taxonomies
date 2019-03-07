<?php

/*
* Display 3 random testimonials
*/

$args = array (
    'post_type' => 'testimonial',
    'posts_per_page' => 3,
    'orderby' => 'rand'
);

$testimonials = new WP_Query( $args );

echo '<aside id="testimonials" class="clear">';
while ( $testimonials->have_posts() ) : $testimonials->the_post();
    echo '<div class="testimonial">';
    echo '<figure class="testimonial-thumb">';
    the_post_thumbnail('medium');
    echo '</figure>';
    echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
    echo '<div class="entry-content">';
    the_content();
    echo '</div>';
    echo '</div>';
endwhile;
echo '</aside>';

wp_reset_query();