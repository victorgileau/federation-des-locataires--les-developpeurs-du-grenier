<?php
/**
 * Template Name: errorPageTheme
 * Template Post Type: errorpage, page, 
 */

get_header(); // Affiche header.php

if ( have_posts() ) :
    //va chercher les posts 'groupe'
    $arguments = array(
        'post_type' => 'errorpage',
        'posts_per_page' => 1,
    );
    var_dump($arguments);
    $errorPageAll = new WP_Query($arguments); // 👈 Utilisation
    //va a travers tout les posts 'groupe'
    while ($errorPageAll->have_posts()) : $errorPageAll->the_post();
    

?>

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

        <?php
	endwhile;
	wp_reset_postdata();
    endif;

get_footer();
?>