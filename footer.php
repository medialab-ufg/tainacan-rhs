<div>
    <?php if( ! is_front_page() &&  !is_page_template('page-contato.php')): ?>
        <footer id="footer" role="contentinfo">
            <div class="row">
                <div class="col-md-5">
                    <?php
                    if ( is_active_sidebar( 'footer-a' ) ) { ?>
                        <div class="widgetcolumn12"> <?php dynamic_sidebar( 'footer-a' ); ?> </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <?php
                    if ( is_active_sidebar( 'footer-b' ) ) { ?>
                        <div class="widgetcolumn12"> <?php dynamic_sidebar( 'footer-b' ); ?> </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="col-md-3">
                    <?php
                    if ( is_active_sidebar( 'footer-c' ) ) { ?>
                        <div> <?php dynamic_sidebar( 'footer-c' ); ?> </div>
                        <?php
                    }
                    ?>
                </div>
            </div><!-- .widget-area -->

            <!--Tainacan version: 0.6-->
        </footer>
    <?php endif; ?>

    <footer class="footer hidden-print">
        <section class="footerDescricao">
            <p> <?php bloginfo( 'description' ); ?> </p>
        </section>
        <section class="footerMenu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <?php
                    /*
                    * menuFundo vem de um register feito nas functions onde o mesmo entra em contato com o menu do
                    * Wordpress.
                    */
                    menuRodape();
                    ?>
                </div>
            </nav>
        </section>

        <section class="corporation">
            <div class="bordar"></div>
            <img alt="Licença Creative Commons" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icreativecommons.png" style="border-width:0">
            <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.pt" rel="license" target="_blank"> Conteúdos do site sob Licença&nbsp;Creative Commons - Atribuição-Não Comercial-Sem Derivados 3.0 Não Adaptada.</a>
        </section>
    </footer>
</div>

<?php wp_footer(); ?>

</body>
</html>