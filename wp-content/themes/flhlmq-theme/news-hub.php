<?php 
/**
 * 	Template Name: newsHub
 * Template Post Type: errorpage, hero, news_article, newshub
 * 	Identique à page, mais avec une barre latérale
 */

get_header(); // Affiche header.php
get_template_part( 'partials/hero');

?>

	<article>
	<section class="actus">
		<div class="actus__alignement">
		<?php
		if ( have_posts() ) : 
			// Si oui, bouclons au travers pour tous les afficher
			
		$arguments = array( // 👈 Tableau d'arguments
			'orderby' => array(
			'date' =>'DESC',
			),
			'post_type' => 'news_article',
		);
		$article = new WP_Query($arguments); // 👈 Utilisation
		while ($article->have_posts()) : $article->the_post(); 
		?>

		<a href="<?php the_permalink(); ?>" class="actualiteHub">
				<p class="actualiteHub__date">
				<?php echo esc_html ( get_field( 'newsarticledate' ) ); ?>
				</p>
				<div class="actualiteHub__desc">
				<p>
					<span class="surligne__droits"><?php the_title(); ?></span>
				</p>
				</div>

				<div class="actualiteHub__img" style="background-image: url('<?php the_post_thumbnail_url();?>');"></div>
				<?php $value = get_field('newsarticlecategory');?>
				<button class="actualiteHub__btn btnN">
				<?php echo $value[0]?>
				</button>
		</a>

		<?php
		endwhile; 
		wp_reset_postdata(); 
		?>
		</div>
	</section>

	</article>
<?php // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

//get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>