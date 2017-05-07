<?php
/**** The template for displaying the footer ****/
?>
<?php include_once "banner-footer.php" ?>

 <?php wp_footer(); 
 $logo = get_theme_mod('logo_footer');
 $endereco1 = get_theme_mod('endereco1');
 $endereco2 = get_theme_mod('endereco2');
 $telefone = get_theme_mod('telefone');
 $email = get_theme_mod('email');
 ?>
 
    <footer class="footer">
        <?php dynamic_sidebar('footer'); ?>
        <div class="container">
            <div class="footer_image">
                <img class="image-small" src="<?php echo $logo;?>" alt="">
            </div>
            <div class="footer_contact">
                <p class="color-red subtitle">fale com a gente</p>
                <p class="footer_contact--address color-grey"><?php echo $endereco1; ?> <br>
                    <?php echo $endereco2; ?></p>
                <p class="footer_contact--telephone">
                    <span class="ico"></span>
                    <?php echo $telefone; ?>
                </p>
                <p class="footer_contact--email">
                    <span class="ico"></span>
                    <?php echo $email; ?>
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