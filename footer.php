<?php
/**** The template for displaying the footer ****/
?>

 <?php wp_footer(); ?>
    <footer class="footer">
        <?php dynamic_sidebar('footer'); ?>
        <div class="container">
            <div class="footer_image"></div>
            <div class="footer_contact">
                <p class="color-red subtitle">fale com a gente</p>
                <p class="footer_contact--address">R. Dr. Alceu de Campos Rodrigues, 229 Vila Nova Conceição, São Paulo - SP</p>
                <p class="footer_contact--telephone">
                    <span class="ico"></span>
                    (11) 4119-2393
                </p>
                <p class="footer_contact--email">
                    <span class="ico"></span>
                    gpes@gpes.com.br
                </p>
            </div>
            <div class="footer_sitemap">
                <ul class="footer_sitemap--left">
                    <li class="footer_sitemap--title">Title</li>
                    <li>Home</li>
                    <li>login</li>
                    <li>nossa empresa</li>
                    <li>contato</li>
                    <li>anuncie</li>
                </ul>
                <div class="footer_sitemap--right">
                    <ul class="footer_sitemap--left">
                        <li class="footer_sitemap--title">Conteúdo</li>
                        <li>Home</li>
                        <li>login</li>
                        <li>nossa empresa</li>
                        <li>contato</li>
                        <li>anuncie</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
 </div><!-- div.main -->
</body>
</html>