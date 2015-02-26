<?php
$time_start = microtime(true);

require("../wp-load.php");

global $wpdb;

$count = 0;
$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 20000, 'offset' => 50000, 'orderby' => 'ID', 'order' => 'ASC') );
while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo "<strong>" . $post_id = get_the_ID() . "</strong><br />";

        $terms = get_the_terms( $post->ID, 'youtube' );
        if ( $terms && ! is_wp_error( $terms ) ) :
                $new_metas = array();
                foreach ( $terms as $term ) {
                        if (strlen($term->name) != 11) continue;
                        echo $term->name . "<br />";
                        wp_delete_term( $term->term_id, 'youtube' );
                        $new_metas[] = array("codice" => $term->name);
                }
                echo serialize($new_metas);
                update_post_meta($post->ID, 'video_youtube', $new_metas);
        endif;
}

echo "<br />\nPagina generata in ".(microtime(true) - $time_start)." seconds\n<br/>";
