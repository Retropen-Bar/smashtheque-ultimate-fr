<?php
/*
Template Name: Smash data
*/

get_header();
get_sidebar('data');
?>

    <section id="primary" class="content-area col-sm-12 col-lg-8">
        <div id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

            endwhile; // End of the loop.
            ?>

        </div><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
