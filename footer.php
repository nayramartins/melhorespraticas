<?php
/**** The template for displaying the footer ****/
?>
<?php include_once "banner-footer.php" ?>

 <?php wp_footer(); ?>
    <footer class="footer">
        <?php dynamic_sidebar('footer'); ?>
        <div class="container">
            <div class="footer_image">
                <img class="image-small" src="wp-content/themes/melhorespraticas/images/logo_footer.jpg" alt="">
            </div>
            <div class="footer_contact">
                <p class="color-red subtitle">fale com a gente</p>
                <p class="footer_contact--address color-grey">R. Dr. Alceu de Campos Rodrigues, 229, conj. 806 <br>
                    Vila Nova Conceição, São Paulo - SP</p>
                <p class="footer_contact--telephone">
                    <span class="ico"></span>
                    (11) 4119-2393
                </p>
                <p class="footer_contact--email">
                    <span class="ico"></span>
                    gpes@gpes.com.br
                </p>
            </div>
            <div class="space"></div>
            <div class="footer_sitemap">
                <div class="footer_sitemap--left out">
                    <p class="footer_sitemap--title color-red subtitle">Title</p>
                    <ul class="footer_sitemap--left in">
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                    </ul>
                </div>
                <div class="footer_sitemap--right out">
                    <p class="footer_sitemap--title color-red subtitle">Conteúdo</p>
                    <ul class="footer_sitemap--right in">
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                        <li><a href="#" class="color-grey subtitle">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
 </div><!-- div.main -->
</body>
</html>