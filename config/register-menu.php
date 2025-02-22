<?php
// register-menus.php

// Register navigation menus
function register_my_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __('Main Menu'),
            'secondary-menu' => __('Secondary Menu'),
            'footer-menu-1' => __( 'Footer Menu 1', 'Franci Bau' ),
            'footer-menu-2' => __( 'Footer Menu 2', 'Franci Bau' ),

        )
    );
}
add_action('after_setup_theme', 'register_my_menus');
