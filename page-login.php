<?php
get_header(); ?>

    <div class="screen-title">
        <div class="container">
            <div class="title-content">
                <h3><?php the_title(); ?></h3>
            </div>
        </div>
    </div>
    <div class="breadcrumb">
        <div class="container">
            <?php wp_custom_breadcrumbs(); ?>
        </div>
    </div>

    <section class="login container">
        <div class="container">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile; endif; ?>
        </div>
    </section>

<?php get_footer(); ?>