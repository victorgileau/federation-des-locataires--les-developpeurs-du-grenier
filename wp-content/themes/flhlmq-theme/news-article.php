<?php 
/**
 * 	Template Name: News Article
 * 	Template Post Type: errorpage, hero, news_article
 * 	Identique à page, mais avec une barre latérale
 */

get_header(); // Affiche header.php


/*
if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	the_post();


get_template_part( 'partials/hero', null, array(
	'title' => the_title(),
	'id' => get_the_ID(),
));
echo '<br>| test articles ' . the_ID();
echo '<br>| test articles titre' . the_title();
endif;
*/
get_template_part( 'partials/hero');



if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post();
	echo '<br>| test articles titre while' . the_title();
	
?>


	<article>
		<?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>

		<section class="article">
        <hr>
        <div class="article__info">
            <div class="article__tags">
			<?php $value = get_field('newsarticlecategory');
				foreach ($value as $category) {
					//echo $instrumentNom;
					?>
					<button class="article__tag">
                    <?php echo $category ?>
                	</button>
					<?php
				}
				?>
            </div>
			<?php ?>
            <p class="article__time"><?php echo esc_html ( get_field( 'newsarticledate' ) ); ?> - 14:08</p>
        </div>

        <hr>
        <br>
        <div class="article__content">
			<?php the_content(); // Contenu principal de la page ?>
        </div>
        <!--Fin Article (Joshua)-->
		
	</article>
	<?php endif; ?>
<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;


get_footer(); // Affiche footer.php 
?>