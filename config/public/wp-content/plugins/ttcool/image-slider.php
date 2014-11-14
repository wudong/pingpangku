<?php
/**
 * Add image slider to the post
 */


function slider_script()
{
    wp_register_script('bx-sliders', '//cdn.jsdelivr.net/bxslider/4.1.1/jquery.bxslider.min.js', array('jquery'), null);
    wp_enqueue_script('bx-sliders');

    wp_register_style('bx-sliders', '//cdn.jsdelivr.net/bxslider/4.1.1/jquery.bxslider.css', array(), null);
    wp_enqueue_style('bx-sliders');

}

add_action('wp_print_scripts', 'slider_script');
//add_action( 'wp_enqueue_scripts', 'easy_image_gallery_scripts', 20 );

function slider_style()
{
    wp_register_style('bx-sliders', '//cdn.jsdelivr.net/bxslider/4.1.1/jquery.bxslider.css', array(), null);
    wp_enqueue_style('bx-sliders');

}

add_action('wp_print_styles', 'slider_style');

function add_slider_to_content($content)
{
    global $post;

    //only works on singular post.
    if (!(is_singular() && $post->post_type == 'product')) return $content;

    $has_gallery_images = get_post_meta(get_the_ID(), '_easy_image_gallery', true);

    if (!$has_gallery_images)
        return $content;

    // convert string into array
    $has_gallery_images = explode(',', get_post_meta(get_the_ID(), '_easy_image_gallery', true));

    // clean the array (remove empty values)
    $has_gallery_images = array_filter($has_gallery_images);

    $images = array();

    foreach ($has_gallery_images as $imageId) {
        $i = wp_get_attachment_image_src($imageId);
        $images[] = $i[0];
    }

    $date = array(
        'images' => $images
    );

    $new_content = Timber::compile('image-slider.twig', $date);
    $content = $new_content . $content;
    return $content;
}

add_filter('the_content', 'add_slider_to_content', 11);

?>
