<?php
// Add custom post type
function project_post_type() {
    $labels = array(
        'name'               => __( 'Projects', 'text-domain' ),
        'singular_name'      => __( 'Project', 'text-domain' ),
        'add_new'            => __( 'Add New Project', 'text-domain' ),
        'add_new_item'       => __( 'Add New Project', 'text-domain' ),
        'edit_item'          => __( 'Edit Project', 'text-domain' ),
        'new_item'           => __( 'New Project', 'text-domain' ),
        'view_item'          => __( 'View Project', 'text-domain' ),
        'search_items'       => __( 'Search Project', 'text-domain' ),
        'not_found'          => __( 'No rojects found', 'text-domain' ),
        'not_found_in_trash' => __( 'No projects found in Trash', 'text-domain' ),
        'parent_item_colon'  => __( 'Parent Project:', 'text-domain' ),
        'menu_name'          => __( 'Projects', 'text-domain' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'Custom post type for Projects',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'public'              => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'projekte' ),
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-cart', // Customize the icon as needed
        'menu_position'       => 2,
    );

    register_post_type( 'project', $args );
    // Add taxonomy
    $taxonomy_labels = array(
        'name'              => __( 'Project Categories', 'text-domain' ),
        'singular_name'     => __( 'Project Category', 'text-domain' ),
        'search_items'      => __( 'Search Project Categories', 'text-domain' ),
        'all_items'         => __( 'All Project Categories', 'text-domain' ),
        'parent_item'       => __( 'Parent Project Category', 'text-domain' ),
        'parent_item_colon' => __( 'Parent Project Category:', 'text-domain' ),
        'edit_item'         => __( 'Edit Project Category', 'text-domain' ),
        'update_item'       => __( 'Update Project Category', 'text-domain' ),
        'add_new_item'      => __( 'Add New Project Category', 'text-domain' ),
        'new_item_name'     => __( 'New Project Category Name', 'text-domain' ),
        'menu_name'         => __( 'Project Categories', 'text-domain' ),
    );

    $taxonomy_args = array(
        'labels'             => $taxonomy_labels,
        'hierarchical'       => true,
        'public'             => true,
        'show_ui'            => true,
        'show_admin_column'  => true,
        'show_in_nav_menus'  => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projektekategorie' ),
    );

    register_taxonomy( 'project_category', 'project', $taxonomy_args );
}
add_action( 'init', 'project_post_type' );

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
