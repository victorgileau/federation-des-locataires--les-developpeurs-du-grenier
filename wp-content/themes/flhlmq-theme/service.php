<?php 
/**
 * Template Name: service
 * Template Post Type: errorpage, hero, service
 */

get_header(); // Affiche header.php

get_template_part( 'partials/hero');

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post(); 

	$imageOne = get_field('service_imageone');


?>

	<article>
		<?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>
			<div class="conteneurServicePage">
        <section class="servicePage">
            <div class="servicePage__sectionUn">
                <img class="img" src="<?php echo esc_url($imageOne['url']) ?>" alt="img">
                <div class="contenuText">
                    <h2>
                        <?php the_field('service_titleone'); ?>
                    </h2>
                    <p class="text">
						<?php the_field('service_textcontentone'); ?>
                    </p>
                </div>
            </div>
            <div class="servicePage__sectionDeux">
			<?php the_content(); // Contenu principal de la page ?>
            </div>
        </section>
    </div>
		<?php endif; ?>
		
		
	</article>
<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>