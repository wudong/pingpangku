<?php


function print_review_score($content)
{

    global $post;

    if (is_singular() && $post->post_type == 'review') {

        $context = Timber::get_context();
        $context['post'] = new TimberPost();

        $new_content     = Timber::compile( 'review-score.twig', $context );
        $content         = $content . $new_content;

    }

    return $content;

}

add_filter('the_content', 'print_review_score', 11);

/**
 * Print the list of products that this review refer to.
 *
 * @param $content
 *
 * @return string
 */
function print_product_list_for_review($content)
{

    global $post;

    if (is_singular() && $post->post_type == 'review') {
        $queryParams = array(
            'connected_type' => 'product-2-review',
            'connected_items' => get_queried_object(),
            'nopaging' => true,
        );

        $data['posts'] = Timber::get_posts($queryParams);
        $new_content = Timber::compile('product-list-for-review.twig', $data);
        wp_reset_postdata();
        //
        $content = $new_content . $content;
    }

    return $content;
}

add_filter('the_content', 'print_product_list_for_review', 11);

?>