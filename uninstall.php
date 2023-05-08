<?php
/**
* Trigger this file on plugin uninstall
* 
* @package MMwordpressplugin
*/
if(!defined('WP_UNINSTALL_PLUGIN')){
    die;
}

//Clear database yung meron movie
$movies = get_posts( array('post_type' => 'movie', 'numberposts' => -1));

foreach($movies as $movie){

    wp_delete_post($movie->ID, true);
}

// $posts = get_posts( array(
//     'numberposts' => -1,
//     'post_type' => 'movies',
//     'post_status' => 'any' ) );

// foreach ( $posts as $post )
// {
//     wp_delete_post( $post->ID, true );
// }

//PANG ADVANCED
// global $wpdb;
// $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'movie'");
// $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT if FROM wp_posts)");
// $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT if FROM wp_posts)");