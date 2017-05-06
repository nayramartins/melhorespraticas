
<div class="search-form">
    <div class="search-form-top">
        <p class="search-form-top_title color-grey subtitle">Busca por palavra-chave</p>
        <div class="space"></div>
        <span class="search-form-close"><img src="wp-content/themes/melhorespraticas/images/fechar_busca.png" alt="" onclick="handleSearch()"></span>
    </div>
    <div class="search-form-bottom">
        <form role="search" id="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="search-form-bottom_text" type="text" name="s"/>
        </form>
        <div class="space"></div>
        <img class="search-form-bottom_icon" src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/melhores_praticas-search.png" width="23" height="20" alt="" onclick="handleSubmit()">
    </div>
</div>

<script>
    var handleSubmit = function() {
        var form = document.getElementById('search-form');
        form.submit();
    }
</script>