<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<?php
include_once( trailingslashit( get_template_directory() ) . 'helpers/view_helper.php' );
//include_once('/helpers/view_helper.php');
$socialdb_logo = get_option('socialdb_logo');
$socialdb_title = get_option('blogname');
$col_root_id = get_option('collection_root_id');
$stat_page = get_page_by_title(__('Statistics', 'tainacan'))->ID;
$viewHelper = new ViewHelper();
$_src_ = get_template_directory_uri();
global $wp_query;

if (is_object($wp_query->post)) {
    $collection_id = $wp_query->post->ID;
    $collection_owner = $wp_query->post->post_author;
} else {
    $collection_id = 0;
    $collection_owner = "";
}
$_header_enabled = get_post_meta($collection_id, 'socialdb_collection_show_header', true);
?>
<html <?php language_attributes(); ?> xmlns:fb="http://www.facebook.com/2008/fbml" class="no-js"><!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>"> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="google-site-verification" content="29Uww0bx9McdeJom1CDiXyGUZwK5mtoSuF5tA_i59F4" />
    <link rel="icon" type="image/png" href="<?php echo $_src_ . '/libraries/images/icone.png' ?>">

    <title> <?php echo repository_page_title() ?> </title>
    <?php if (is_front_page()) { ?>
        <link rel="alternate" type="application/rdf+xml" href="<?php echo site_url(); ?>/?.rdf">
        <?php if (is_restful_active()) { ?>
            <link rel="alternate" type="application/json" href="<?php echo site_url(); ?>/wp-json/">
        <?php
        }
    } elseif (is_page_tainacan()) { ?>
        <link rel="alternate" type="application/rdf+xml" href="<?php echo get_the_permalink(); ?>?<?php echo get_page_tainacan() ?>=<?php echo trim($_GET[get_page_tainacan()]) ?>.rdf">
        <?php if (is_restful_active()) { ?>
          <link rel="alternate" type="application/json" href="<?php echo site_url() . '/wp-json/posts/' . get_post_by_name($_GET[get_page_tainacan()], OBJECT, 'socialdb_object')->ID . '/?type=socialdb_object' ?>">
            <?php
        }
    } elseif (is_single()) { ?>
            <meta name="thumbnail_url" content="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" />
            <meta name="description" content="<?php echo get_the_content() ?>" />
            <link rel="alternate" type="application/rdf+xml" href="<?php echo get_the_permalink(); ?>?.rdf">
            
            <?php if (is_restful_active()) { ?>
                <link rel="alternate" type="application/json" href="<?php echo site_url() . '/wp-json/posts/' . get_the_ID() . '/?type=socialdb_collection' ?>">
            <?php }
    } ?>

    <?php echo set_config_return_button(is_front_page()); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<!-- TAINACAN: tag body adaptado para o gplus -->
<body <?php body_class(); ?> itemscope>

    <!-- Tag header para o Primeiro Menu -->
    <header id="navBar-top">
        
            <nav class="navbar navbar-default navbar-static-top rhs_menu">
                <nav <?php echo set_navbar_bg_color('#003c46', $stat_page); ?> class="navbar navbar-default header-navbar">
                    <div class="navbar-header logo-container">
                        <a class="navbar-brand text-hide" href="http://redehumanizasus.net/">RHS</a>
                        <button type="button" class="navbar-toggle" id="btn-toggle-menu" data-toggle="collapse" data-target="#menu-to-collapse">
                            <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <?php get_template_part("partials/actions", "header"); ?>
                </nav>
            </nav>
            <div class="collapse navbar-collapse segundo-menu"> 
                <div class="container-fluid">
                    <?php
                    if(!my_wp_is_mobile()){
                        get_search_form();
                    }
                    if(my_wp_is_mobile()):
                        menuDropDownMobile();
                    else :
                        ?>
                        <ul class="nav navbar-nav navbar-right dropdown-menu-right dropdown-ipad">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</a>
                                <?php
                                /*
                                * menuDropDown vem de um register feito nas functions onde o mesmo entra em contato com o menu do wordpress.
                                */
                                menuTopoDropDown();
                                ?>
                            </li>
                        </ul>

                        <?php
                        /*
                        * SegundoMenu vem de um register feito nas functions onde o mesmo entra em contato com o menu do
                        * Wordpress.
                        * O mesmo é o que exibe os links para Contato e Ajuda.
                        */
                        menuTopo();
                        ?>
                    <?php endif; ?>
                </div>
            </div>
            <!--/.nav-collapse -->
            <!--/.container-fluid -->
        </nav>
    </header> <!-- /.header -->

    <?php

    get_template_part("partials/modals","header");

    // Renders custom header only for new template pages
    if ( is_archive() || is_page_template() || is_page() || is_singular('post') || is_home() ) {
        if (!is_page($stat_page)) {
            $_menu_ = ['container_class' => 'container', 'container' => false, 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'navbar navbar-inverse menu-ibram'];
            if (!is_front_page()) {
                echo "<header class='custom-header' style='" . home_header_bg($socialdb_logo) . "'>";
                echo "<div class='menu-transp-cover'></div>" . get_template_part("partials/header/main");
                echo "</header>";
                wp_nav_menu($_menu_);
            }
        }
    }