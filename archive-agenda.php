<?php
/**** The main template file ****/
get_header(); ?>
<div class="content-area">
    <section class="agenda">
        <div class="screen-title">
            <div class="container">
                <div class="title-content">
                    <h3>Agenda</h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="agenda__container">
                <ul class="agenda__content">
                    <?php $args = array( 'post_type' => 'agenda', 'posts_per_page' => 6 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
                        $date = strtotime(get_field('data'));
                        $dateformatstring1 = 'd.m';
                        $dateformatstring2 = 'Y';
                        $date1 = date_i18n($dateformatstring1, $date);
                        $date2 = date_i18n($dateformatstring2, $date);
                        ?>
                        <li>
                            <a href="<?php the_field('link'); ?>">
                                <span class="agenda__content_icon">
                                <img src="" alt="" class="icon" width="20" height="20"/>
                                </span>
                                <div class="agenda__content_text">
                                    <span class="date1"><?php echo $date1; ?></span><br/>
                                    <span class="date2"><?php echo $date2; ?></span>
                                    <h3><?php the_title(); ?></h3>
                                    <p class="agenda__content__info"><?php the_field('info'); ?></p>
                                    <div class="color-red"><?php the_field('responsavel'); ?></div>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    
</div>

<?php get_footer(); ?>