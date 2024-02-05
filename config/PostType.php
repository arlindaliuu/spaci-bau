<?php
// Add custom post type
function product_post_type() {
    $labels = array(
        'name'               => __( 'Products', 'text-domain' ),
        'singular_name'      => __( 'Product', 'text-domain' ),
        'add_new'            => __( 'Add New Product', 'text-domain' ),
        'add_new_item'       => __( 'Add New Product', 'text-domain' ),
        'edit_item'          => __( 'Edit Product', 'text-domain' ),
        'new_item'           => __( 'New Product', 'text-domain' ),
        'view_item'          => __( 'View Product', 'text-domain' ),
        'search_items'       => __( 'Search Products', 'text-domain' ),
        'not_found'          => __( 'No products found', 'text-domain' ),
        'not_found_in_trash' => __( 'No products found in Trash', 'text-domain' ),
        'parent_item_colon'  => __( 'Parent Product:', 'text-domain' ),
        'menu_name'          => __( 'Products', 'text-domain' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'Custom post type for products',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'public'              => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'produkt' ),
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-cart', // Customize the icon as needed
        'menu_position'       => 2,
    );

    register_post_type( 'product', $args );
    // Add taxonomy
    $taxonomy_labels = array(
        'name'              => __( 'Product Categories', 'text-domain' ),
        'singular_name'     => __( 'Product Category', 'text-domain' ),
        'search_items'      => __( 'Search Product Categories', 'text-domain' ),
        'all_items'         => __( 'All Product Categories', 'text-domain' ),
        'parent_item'       => __( 'Parent Product Category', 'text-domain' ),
        'parent_item_colon' => __( 'Parent Product Category:', 'text-domain' ),
        'edit_item'         => __( 'Edit Product Category', 'text-domain' ),
        'update_item'       => __( 'Update Product Category', 'text-domain' ),
        'add_new_item'      => __( 'Add New Product Category', 'text-domain' ),
        'new_item_name'     => __( 'New Product Category Name', 'text-domain' ),
        'menu_name'         => __( 'Product Categories', 'text-domain' ),
    );

    $taxonomy_args = array(
        'labels'             => $taxonomy_labels,
        'hierarchical'       => true,
        'public'             => true,
        'show_ui'            => true,
        'show_admin_column'  => true,
        'show_in_nav_menus'  => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'produktkategorie' ),
    );

    register_taxonomy( 'product_category', 'product', $taxonomy_args );
}
add_action( 'init', 'product_post_type' );

function member_post_type() {
    $labels = array(
        'name'               => __( 'Members', 'text-domain' ),
        'singular_name'      => __( 'Member', 'text-domain' ),
        'add_new'            => __( 'Add New Member', 'text-domain' ),
        'add_new_item'       => __( 'Add New Member', 'text-domain' ),
        'edit_item'          => __( 'Edit Member', 'text-domain' ),
        'new_item'           => __( 'New Member', 'text-domain' ),
        'view_item'          => __( 'View Member', 'text-domain' ),
        'search_items'       => __( 'Search Members', 'text-domain' ),
        'not_found'          => __( 'No members found', 'text-domain' ),
        'not_found_in_trash' => __( 'No members found in Trash', 'text-domain' ),
        'parent_item_colon'  => __( 'Parent Member:', 'text-domain' ),
        'menu_name'          => __( 'Members', 'text-domain' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'Custom post type for members',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'public'              => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'members' ),
        'has_archive'         => true,
        'menu_position'       => 3,
    );

    register_post_type( 'member', $args );
}
    add_action( 'init', 'member_post_type' );

?>
