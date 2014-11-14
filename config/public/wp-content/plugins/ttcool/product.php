<?php

/**
 * Print the Rubber's specification, when it is a rubber.
 *
 * @param $content
 *
 * @return string
 */
function print_rubber_spec( $content ) {

	global $post;

	//TODO also need to check if it is filed under the Rubber categories.
	if ( is_singular() && $post->post_type == 'product' ) {

        $context = Timber::get_context();
        $context['post'] = new TimberPost();

		$new_content     = Timber::compile( 'rubber-spec.twig', $context );
		$content         = $content . $new_content;
	}

	return $content;
}

add_filter( 'the_content', 'print_rubber_spec', 11 );

/**
 * Add the review list to the product page.
 *
 * @param $content
 *
 * @return string
 */
function print_product_review_list( $content ) {

    global $post;

    if ( is_singular() && $post->post_type == 'product' ) {
        $queryParams = array(
            'connected_type'  => 'product-2-review',
            'connected_items' => get_queried_object(),
            'nopaging'        => true,
        );

        $data['posts'] = Timber::get_posts($queryParams);
        $new_content     = Timber::compile( 'review-list.twig', $data );
        wp_reset_postdata();
    //
        $content = $content . $new_content;
    }

    return $content;
}

add_filter( 'the_content', 'print_product_review_list', 12 );

/**
 * Add the review list to the product page.
 *
 * @param $content
 *
 * @return string
 */
function print_related_product_list( $content ) {

    global $post;

    if ( is_singular() && $post->post_type == 'product' ) {
        $queryParams = array(
            'connected_type'  => 'product-2-related-product',
            'connected_items' => get_queried_object(),
            'nopaging'        => true,
        );

        $data['posts'] = Timber::get_posts($queryParams);
        $new_content     = Timber::compile( 'related-product-list.twig', $data );
        wp_reset_postdata();
        //
        $content = $content . $new_content;
    }

    return $content;
}

add_filter( 'the_content', 'print_related_product_list', 13 );

?>