<?php
// Display latest posts

function get_latest_posts($title = "Latest Posts", $num_posts = 3) {
    ?>
    <h3><?php echo $title; ?></h3>
    <ul class="us-latest-posts-widget">
        <?php
            $args = array( 'numberposts' => $num_posts, 'post_status' => 'publish' );
            $recent_posts = wp_get_recent_posts($args);
	        foreach( $recent_posts as $recent ){
                $date = get_the_date('jS M Y',$recent["ID"]);
                echo '<li>';
                echo '<span class="latest-title"><a href="'.get_permalink($recent["ID"]).'">'.$recent["post_title"].'</a></span>';
                echo '<span class="latest-date">'.$date.'</span>';
                echo '</li>';
	        }
	        wp_reset_query();
        ?>
    </ul>
    <?php
}