<?php

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
    wp_enqueue_script( 'tainacan_child_js', get_template_directory_uri() . '-child/assets/js/js.js', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function tainacan_child_script(){
    $parent_style = 'parent-style';
    wp_enqueue_script( 'tainacan_child_js', get_template_directory_uri() . '/assets/js/js.js', array( $parent_style ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'tainacan_child_script' );

function rhs_menu() {
    register_nav_menus( array(
        'menuTopo' => __( 'menuTopo', 'rhs' ),
        'menuTopoDropDown' => __( 'menuTopoDropDown', 'rhs' ),
        'menuDropDownMobile' => __( 'menuDropDownMobile', 'rhs' ),
        'menuRodape' => __( 'menuRodape', 'rhs' )
    ) );
}
add_action( 'after_setup_theme', 'rhs_menu' );

/*
* Altera a forma que o wp_is_mobile diferenciam o mobile, ipad e desktop.
*/
function my_wp_is_mobile() {
    if (
        ! empty($_SERVER['HTTP_USER_AGENT'])

        //detecta o Ipad.
        && false !== strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')
    ) return false;
    return wp_is_mobile();
}

/**
*
* Menu que fica no segundo nav da página.
*
* @param 'menu' => 'SegundoMenu' Seleciona o menu com este nome no painel admin.
* @param 'theme_location' => 'SegundoMenu' pega o menu que está setado em SegundoMenu
**/
function menuTopo(){
	wp_nav_menu( array(
        'menu'              => 'menuTopo',
        'theme_location'    => 'menuTopo',
        'depth'             => 0,
        'menu_class'        => 'nav navbar-nav navbar-right',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker()) // Classe usada para compor o menu bootstrap com o WP
    );
}

/**
*
* Menu dropdown que fica no segundo nav da página
*
* @param 'menu' => 'MenuDropdDown' Seleciona o menu com este nome no painel admin.
* @param 'theme_location' => 'MenuDropdDown' pega o menu que está setado em MenuDropDown
*
**/
function menuTopoDropDown(){
	wp_nav_menu( array(
        'menu'              => 'menuTopoDropDown',
        'theme_location'    => 'menuTopoDropDown',
        'depth'             => 0,
        'container'         => false,
        'menu_class'        => 'dropdown-menu',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker()) // Classe usada para compor o menu bootstrap com o WP
    );
}

/**
*
* Menu dropdown que fica no segundo nav da página
*
* @param 'menu' => 'MenuDropdDown' Seleciona o menu com este nome no painel admin.
* @param 'theme_location' => 'MenuDropdDown' pega o menu que está setado em MenuDropDown
*
**/
function menuDropDownMobile(){
    wp_nav_menu( array(
        'menu'              => 'menuDropDownMobile',
        'theme_location'    => 'menuDropDownMobile',
        'depth'             => 0,
        'menu_class'        => 'nav navbar-nav mobile-nav',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker()) // Classe usada para compor o menu bootstrap com o WP
    );
}

/**
*
* Menu que fica no footer da página.
*
* @param 'menu' => 'MenuFundo' Seleciona o menu com este nome no painel admin.
* @param 'theme_location' => 'MenuFundo' pega o menu que está setado em MenuFundo
*
**/
function menuRodape(){
	wp_nav_menu( array(
	    'menu'              => 'menuRodape',
	    'theme_location'    => 'menuRodape',
	    'depth'             => 0,
        'container_class'   => 'col-xs-12',
	    'menu_class'        => 'nav navbar-nav',
	    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
	    'walker'            => new WP_Bootstrap_Navwalker()) // Classe usada para compor o menu bootstrap com o WP
	);
}