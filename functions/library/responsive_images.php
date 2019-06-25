<?php
// Adds custom image sizes for Foundation breakpoints

add_theme_support( 'post-thumbnails' );

add_action( 'after_setup_theme', 'aw_custom_add_image_sizes' );
function aw_custom_add_image_sizes() {
    add_image_size( 'small', 300, 9999 ); // 300px wide unlimited height
    add_image_size( 'medium-small', 640, 9999 ); // 300px wide unlimited height
    add_image_size( 'medium-large', 800, 9999 ); // 300px wide unlimited height
    add_image_size( 'xl', 1200, 9999 ); // 1200px wide unlimited height
    add_image_size( 'xxl', 2000, 9999 ); // 2000px wide unlimited height
    add_image_size( 'xxxl', 3000, 9999 ); // 3000px wide unlimited height
    add_image_size( 'super', 4000, 9999 ); // 4000px wide unlimited height
}

add_filter( 'image_size_names_choose', 'aw_custom_add_image_size_names' );
function aw_custom_add_image_size_names( $sizes ) {
  return array_merge( $sizes, array(
    'small' => __( 'Small' ),
    'medium-small' => __( 'Medium Small' ),
    'medium-large' => __( 'Medium Large' ),
    'xl' => __( 'Extra Large' ),
    'xxl' => __( '2x Extra Large' ),
    'xxxl' => __( '3x Extra Large' ),
  ) );
}

function acf_responsive_img($image_id,$image_size,$max_width,$i,$y){
	// check the image ID is not blank
	if($image_id != '') {
        // Check the loop to see if image in loop needs to be defered
        if($i <= $y) {
            // Load
            $image_src = wp_get_attachment_image_url($image_id, $image_size);
        } else {
            $image_src = "";
        }
        // set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );
		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
		// generate the markup for the responsive image
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';
	}
}

/*
For usage
Example
$i = loop iteration
<img <?php acf_responsive_img($image['id'], 'xxxl', '3000px',$i, 1); ?> alt="<?php echo $image['alt'] ?>">
*/