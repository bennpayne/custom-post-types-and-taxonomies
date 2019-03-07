<?php

/*
* Intercepting the query before sent to the db.
* Not on admin page, this is main query, and is blog index
* Add review to the current query, to display both post and review
* on the blog index page
*/

function my_add_reviews( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ( $query->is_home() ) {
            $query->set( 'post_type', array( 'post', 'review' ) );
        }
    }
}

add_action( 'pre_get_posts', 'my_add_reviews' );


// This will add the custom post types and taxonomies thru the theme
// require get_stylesheet_directory() . '/posttypes.php';