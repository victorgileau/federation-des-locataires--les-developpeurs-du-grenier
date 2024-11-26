<?php
/**
 * The template for displaying 404 pages (Not Found)
 * Template Name: errorPageTheme
 * Template Post Type: errorpage, page
 */

get_header(); // Affiche header.php

 
    //va chercher les posts 'groupe'
    
    $arguments = array(
        'post_type' => 'errorpage',
        'posts_per_page' => 1,
    );
    //var_dump($arguments);
    $errorPageAll = new WP_Query($arguments); // 👈 Utilisation
    //va a travers tout les posts 'groupe'
    while ($errorPageAll->have_posts()) : $errorPageAll->the_post();
    
    //while ( have_posts() ) : the_post();

?>
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
    <div class="page-wrapper">
    <div class="page-content">

        <section class="pageErrorContainer">

            <div class="errorPage">

                <div class="textPageErreur">
                    404
                </div>
                <p class="text">
                    <?php the_field('errorpagemessage'); ?>
                </p>
                <a href="<?php bloginfo('url'); ?>">
                    <button>
                        <?php the_field('errorpagebtn'); ?>
                    </button>
                </a>
            </div>

            <div class="underMove">
                <div class="cirle cirle-1"></div>
                <div class="cirle cirle-2"></div>
                <div class="cirle cirle-3"></div>
                <div class="cirle cirle-4"></div>
            </div>



        </section>

        </div><!-- .page-content -->
			</div><!-- .page-wrapper -->

        </div><!-- #content -->
	</div><!-- #primary -->

        <?php
	endwhile;

    get_sidebar();
    get_footer();
?>