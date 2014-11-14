<?php

function register_custom_types()
{

    register_post_type('product', array(
        'label' => '产品',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'product', 'with_front' => true),
        'query_var' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'taxonomies' => array('tt_tags', 'tt_product_type', 'tt_brand'),
        'labels' => array(
            'name' => '产品',
            'singular_name' => '产品',
            'menu_name' => '产品',
            'add_new' => 'Add 产品',
            'add_new_item' => 'Add New 产品',
            'edit' => 'Edit',
            'edit_item' => 'Edit 产品',
            'new_item' => 'New 产品',
            'view' => 'View 产品',
            'view_item' => 'View 产品',
            'search_items' => 'Search 产品',
            'not_found' => 'No 产品 Found',
            'not_found_in_trash' => 'No 产品 Found in Trash',
            'parent' => 'Parent 产品',
        )
    ));

    register_post_type('review', array(
        'label' => '评论',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'review', 'with_front' => true),
        'query_var' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels' => array(
            'name' => '评论',
            'singular_name' => '评论',
            'menu_name' => '评论',
            'add_new' => 'Add 评论',
            'add_new_item' => 'Add New 评论',
            'edit' => 'Edit',
            'edit_item' => 'Edit 评论',
            'new_item' => 'New 评论',
            'view' => 'View 评论',
            'view_item' => 'View 评论',
            'search_items' => 'Search 评论',
            'not_found' => 'No 评论 Found',
            'not_found_in_trash' => 'No 评论 Found in Trash',
            'parent' => 'Parent 评论',
        )
    ));

    register_post_type('assembling', array(
        'label' => '组装配置',
        'description' => '球拍组装配置',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'assembling', 'with_front' => true),
        'query_var' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels' => array(
            'name' => '组装配置',
            'singular_name' => '组装配置',
            'menu_name' => '组装配置',
            'add_new' => 'Add 组装配置',
            'add_new_item' => 'Add New 组装配置',
            'edit' => 'Edit',
            'edit_item' => 'Edit 组装配置',
            'new_item' => 'New 组装配置',
            'view' => 'View 组装配置',
            'view_item' => 'View 组装配置',
            'search_items' => 'Search 组装配置',
            'not_found' => 'No 组装配置 Found',
            'not_found_in_trash' => 'No 组装配置 Found in Trash',
            'parent' => 'Parent 组装配置',
        )
    ));

    register_taxonomy('tt_tags', array(
            0 => 'product',
            1 => 'review',
        ),
        array('hierarchical' => false,
            'label' => '乒乓标签',
            'show_ui' => true,
            'query_var' => true,
            'public' => true,
            'labels' => array(
                'search_items' => '乒乓标签',
                'popular_items' => '',
                'all_items' => '',
                'parent_item' => '',
                'parent_item_colon' => '',
                'edit_item' => '',
                'update_item' => '',
                'add_new_item' => '',
                'new_item_name' => '',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => '',
                'choose_from_most_used' => '',
            )
        ));

    register_taxonomy('tt_product_type', array(
            0 => 'product',
        ),
        array('hierarchical' => true,
            'label' => '乒乓器材分类',
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'labels' => array(
                'search_items' => '乒乓器材分类',
                'popular_items' => '',
                'all_items' => '',
                'parent_item' => '',
                'parent_item_colon' => '',
                'edit_item' => '',
                'update_item' => '',
                'add_new_item' => '',
                'new_item_name' => '',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => '',
                'choose_from_most_used' => '',
            )
        ));
    register_taxonomy('tt_brand', array(
            0 => 'product',
        ),
        array('hierarchical' => true,
            'label' => '乒乓品牌',
            'public' => true,
            'show_ui' => true,
            'query_var' => true,
            'show_in_nav_menus' => true,
            'labels' => array(
                'search_items' => '乒乓品牌',
                'popular_items' => '',
                'all_items' => '',
                'parent_item' => '',
                'parent_item_colon' => '',
                'edit_item' => '',
                'update_item' => '',
                'add_new_item' => '',
                'new_item_name' => '',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => '',
                'choose_from_most_used' => '',
            )
        ));
}

add_action('init', 'register_custom_types');

/**
 * WUDONG: Set up post-2-post connections.
 */
function tt_p2p_connections()
{
    p2p_register_connection_type(array(
        'name' => 'product-2-review',
        'from' => 'product',
        'to' => 'review',
        'title' => array('from' => '评论', 'to' => '产品'),

        'admin_box' => array(
            'show' => 'any',
            'context' => 'advanced'
        )
    ));

    p2p_register_connection_type(array(
        'name' => 'product-2-related-product',
        'from' => 'product',
        'to' => 'product',
        'reciprocal' => true,
        'title' => '相关产品',
        'admin_box' => array(
            'show' => 'any',
            'context' => 'advanced'
        )
    ));

    //User liked product.
    p2p_register_connection_type(array(
        'name' => 'user-like-product',
        'from' => 'product',
        'to' => 'user',

        'fields' => array(
            'comment' => array(
                'title' => '一句话评论',
                'type' => 'text',
            )
        )

    ));

    //User liked assembling.
    p2p_register_connection_type(array(
        'name' => 'user-like-assembling',
        'from' => 'assembling',
        'to' => 'user',

        'fields' => array(
            'comment' => array(
                'title' => '一句话评论',
                'type' => 'text',
            )
        )
    ));
}

add_action('p2p_init', 'tt_p2p_connections');