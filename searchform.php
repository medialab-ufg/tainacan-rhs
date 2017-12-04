<?php
/**
 * Template de busca para exibir no menu.
 *
 * @package wp-rhs
 * @subpackage Rede Humaniza SuS
 * @since Rede Humaniza SuS
 */
?>
<form autocomplete="off" class="form-search-rhs navbar-form navbar-left" role="search" id="formSearchCollections">
    <div class="form-group" style="display: inline;">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Pesquise em nosso acervo..." size="15" maxlength="128" name="search_collections" id="search_collections" value="">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
            <a onclick="redirectAdvancedSearch(false);" href="javascript:void(0)" class="adv_search">
                <span class="white"><?php _e('Advanced search', 'tainacan') ?></span>
            </a>
        </div>
    </div>
</form>
<script>
    if($("#search_collections").is(":focus")){
        $(".adv_search").css(display: 'block !important');
    }
</script>