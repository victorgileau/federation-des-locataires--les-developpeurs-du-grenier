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
				<p class="article__time"><?php echo esc_html ( get_field( 'newsarticledate' ) ); ?></p>
			</div>

			<hr>
			<br>
			<div class="article__content">
				<?php the_content(); // Contenu principal de la page ?>
			</div>
        	<!--Fin Article (Joshua)-->


			<!--Section créer par Kenza et modifier par Victor et Joshua-->
			<section class="actus">
				
				<div class="article__buttons" id="resetPostPreview">
					<p class="article__page page"><a onclick="window.location.reload(true);" href="#resetPostPreview" class="article__before">
							<?php the_field("newsarticlebtnbeforepreview"); ?></a>
					</p>
					<p class="article__page page"><a onclick="window.location.reload(true);" href="#resetPostPreview" class="article__next">
						<?php the_field("newsarticlebtnnextpreview"); ?></a></p>
				</div>
				<h3 class="preview-title"><?php the_field("newsarticletitlepreview"); ?></h3>
				<div class="actus__alignement noMorePadding">
					<?php 
					// The Query

					$next_args = array(
						'post_type' => 'news_article',
						'posts_per_page'=> 3,
						'order'=>'DESC',
						'orderby'=>'rand',
						);

					$the_query = new WP_Query( $next_args );

					// The Loop
					if ( $the_query->have_posts() ) {
						$not_in_next_three = array();
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							?>
							<!--Carte-->
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
							//your html here for latest 2
							$not_in_next_three[] = get_the_ID();
						}

					} else {
						// no posts found
						echo 'test';
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					?>

					

					<!--Fin des cartes à Victor modifiés par Kenza-->

				</section>
		</section>
		
	</article>
	<?php endif; ?>
<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;


get_footer(); // Affiche footer.php 
?>