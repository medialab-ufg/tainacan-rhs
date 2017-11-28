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
            <?php $_GOOGLE_API_KEY = "AIzaSyBZXPZcDMGeT-CDugrsYWn6D0PQSnq_odg"; ?>
            <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_GOOGLE_API_KEY; ?>" async></script>
            
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
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand text-hide" href="<?php bloginfo('url'); ?>">RHS</a>
                </div>
                <div id="navbar6" class="navbar-collapse collapse primeiro-menu">
                    <?php
                        if(my_wp_is_mobile()){
                            get_search_form();
                        }
                    ?>
                    <ul class="nav navbar-nav <?php if(!my_wp_is_mobile()):?>navbar-right dropdown-menu-right no-mobile<?php else:?>mobile-nav<?php endif;?>">
                        <?php if(!is_user_logged_in()): ?>
                            <li><a href="<?php echo wp_login_url(); ?>" style="color: #00b4b4">Faça seu login</a></li>
                            <span class="navbar-text">ou</span>
                            <li><a href="<?php echo wp_registration_url(); ?>" style="color: #00b4b4">Cadastre-se</a></li>
                        <?php else : ?>
                            <li class="dropdown user-dropdown hidden-xs">
                                <a id="button-notifications" href="#notifications-panel" class="dropdown-toggle user-dropdown-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i data-count="1" class="glyphicon glyphicon-bell notification-count"></i>
                                </a>
                                <ul class="dropdown-menu notify-drop">
                                    <div class="notify-drop-title">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">Notificações (<b>1</b>)</div>
                                            
                                        </div>
                                    </div>
                                    <!-- end notify title -->
                                    <!-- notify content -->
                                    
                                    
                                    
                                    <div class="drop-content">
                                            
                                            <li>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="notify-img">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-sm-9 col-xs-9 pd-l0">
                                                    
                                                    <hr>
                                                    <p class="time"></p>
                                                </div>
                                            </li>
                                        
                                    </div>
                                    <div class="notify-drop-footer text-center">
                                        <a href="<?php echo home_url(); ?>"><i class="fa fa-eye"></i> Veja todas as notificações</a>
                                    </div>
                                </ul>
                            </li><!-- /dropdown -->
                            <?php if(!my_wp_is_mobile()): ?>
                            <li class="dropdown user-dropdown">
                            <?php else : ?>
                            <li class="menu-item">
                            <?php endif; ?>
                                    <a href="#" class="dropdown-toggle user-dropdown-link" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="drop_perfil">
                                        <?php echo get_the_author_meta('display_name' , get_current_user_id()) ?>
                                        <?php echo get_avatar(get_current_user_id()); ?>
                                        <?php if(!my_wp_is_mobile()): ?>
                                            <i class="glyphicon glyphicon-chevron-down
"></i>
                                        <?php endif; ?>
                                    </a>
                        <?php if(my_wp_is_mobile()): ?>
                            </li>
                        <?php else : ?>
                            <ul class="dropdown-menu" aria-labelledby="drop_perfil">
                        <?php endif; ?>
                                <li class="menu-item pub">
                                    <a href="<?php echo home_url(); ?>">
                                        <i class="icones-dropdown fa fa-pencil-square-o" aria-hidden="true"></i> Publicar Post
                                    </a>
                                </li>
                            <?php
                            $current_user = wp_get_current_user();
                            if (user_can( $current_user, 'administrator' ) || user_can( $current_user, 'editor' )) : ?>
                                <li class="menu-item">
                                    <a href="<?php echo admin_url();?>">
                                        <i class="icones-dropdown fa fa-tachometer" aria-hidden="true"></i> Painel
                                    </a>
                                </li>
                            <?php endif; ?>
                                <li class="menu-item perf">
                                    <a href="<?php echo get_author_posts_url(get_current_user_id()); ?>">
                                        <i class="icones-dropdown fa fa-eye" aria-hidden="true"></i> Meu Perfil
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php echo home_url();?>">
                                        <i class="icones-dropdown fa fa-list-alt" aria-hidden="true"></i> Minhas Postagens
                                    </a>
                                </li>
                                <li class="menu-item hidden-sm hidden-md hidden-lg">
                                    <a href="notificacoes">
                                        <i class="icones-dropdown fa fa-list-alt" aria-hidden="true"></i> Notificações(<b>2</b>)
                                    </a>
                                </li>
                                <li class="menu-item sair">
                                    <a href="<?php echo wp_logout_url(); ?>">
                                        <i class="icones-dropdown fa fa-sign-out" aria-hidden="true"></i> Sair
                                    </a>
                                </li>
                            </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
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