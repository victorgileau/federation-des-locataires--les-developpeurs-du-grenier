<?php 
/**
 * 	Template Name: ServicesHub
 * 	Template Post Type: servicehub
 */

get_header(); // Affiche header.php

get_template_part( 'partials/hero');

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post(); 
?>

	<article>
		<?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>
		
		
		<section class="section__services participations">
			<?php 
			while( have_rows('participationgroup')): the_row();
			?>
			<h2 class="servicesHub__sousTitre"><?php the_sub_field('title') ?></h2>
			<h3 class="servicesHub__text"><?php the_sub_field('desc') ?></h3>
			<?php endwhile;?>
			<div class="participations__alignement">
			<?php get_template_part('partials/servicesParticipation')?>
		</section>

		<section class="section_services publications">
			<?php 
			while( have_rows('publicationgroup')): the_row();
			?>
			<h2 class="servicesHub__sousTitre"><?php the_sub_field('title') ?></h2>
			<h3 class="servicesHub__text"><?php the_sub_field('desc') ?></h3>
			<?php endwhile; ?>
			<div class="swiper-nav">
				<button class="btn-prev">
					<svg width='25px' viewBox="0 0 72 46" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M3 20C1.34315 20 0 21.3431 0 23C0 24.6569 1.34315 26 3 26L3 20ZM71.1213 25.1213C72.2929 23.9497 72.2929 22.0503 71.1213 20.8787L52.0294 1.7868C50.8579 0.615224 48.9584 0.615224 47.7868 1.7868C46.6152 2.95837 46.6152 4.85786 47.7868 6.02944L64.7574 23L47.7868 39.9706C46.6152 41.1421 46.6152 43.0416 47.7868 44.2132C48.9584 45.3848 50.8579 45.3848 52.0294 44.2132L71.1213 25.1213ZM3 26L69 26V20L3 20L3 26Z"
						fill="blue" />
					</svg>
				</button>

				<button class="btn-next"><svg width='25px' viewBox="0 0 72 46" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M3 20C1.34315 20 0 21.3431 0 23C0 24.6569 1.34315 26 3 26L3 20ZM71.1213 25.1213C72.2929 23.9497 72.2929 22.0503 71.1213 20.8787L52.0294 1.7868C50.8579 0.615224 48.9584 0.615224 47.7868 1.7868C46.6152 2.95837 46.6152 4.85786 47.7868 6.02944L64.7574 23L47.7868 39.9706C46.6152 41.1421 46.6152 43.0416 47.7868 44.2132C48.9584 45.3848 50.8579 45.3848 52.0294 44.2132L71.1213 25.1213ZM3 26L69 26V20L3 20L3 26Z"
						fill="blue" />
					</svg>
				</button>
			</div>

			

			<div class="positionSwiper">
				<div class="swiper swiperPubli">
					<div class="swiper-wrapper ">
						<!--Bulletins-->
						<?php
						$servicepublication = array(
							'post_type' => 'servicepublication',
							'posts_per_page'=> 6,
							);

						$the_query_publi = new WP_Query( $servicepublication );
						if ($the_query_publi->have_posts()) :

							while ($the_query_publi->have_posts()):
								
								$the_query_publi-> the_post();

							?>
						<div class="swiper-slide <?php the_field('classswipperslide') ?>">
							<a href="#">
							<div class="publication">
								<div class="publication__titre">
								<?php the_title(); ?>
								</div>
								<div class="publication__line">
								<hr>
								</div>
								<div class="publication__info">
								<?php the_content(); ?>
								</div>
								<button class="publication__btn">
								<?php the_field('btn'); ?> <svg class="btn__fleche" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
									class="bi bi-arrow-right" viewBox="0 0 16 16">
									<path fill-rule="evenodd"
									d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
								</svg>
								</button>
								<div class="publication__bg--color"> </div>
							</div>
							</a>
						</div>
					<?php 
					endwhile;
				endif;
				wp_reset_postdata();?>

				</div>
			</div>
		</section>

		<section class="section__droits">
			<?php 
			$droits = get_field('participationgroup');
			while( have_rows('rightgroup')): the_row();
			?>
			<h2 class="servicesHub__sousTitre"><?php the_sub_field('title') ?></h2>
			<h3 class="servicesHub__text"><?php the_sub_field('desc') ?></h3>
			<div class="link__droits">
			<a href=""><?php the_sub_field('otherrightsbtn') ?></a>
			<?php endwhile; ?>
			</div>


			<!--Cartes prises de la section actu par Victor-->


			<div class="droits">
			<?php
			$serviceright = array(
				'post_type' => 'serviceright',
				'posts_per_page'=> 3,
				);

			$the_query_right = new WP_Query( $serviceright );
			if ($the_query_right->have_posts()) :

				while ($the_query_right->have_posts()):
					
					$the_query_right-> the_post();

				?>
			<!--Carte 1-->
			<a href="" class="droit ">
				<div class="droit__titre">
				<p><span class="surligne__droits"><?php the_title(); ?></span></p>
				</div>

				<div class="droit__desc">
				<p><?php the_content(); ?></p>
				</div>
				<div class="droit__img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
			</a>
			<?php
			endwhile;
		endif;
		wp_reset_postdata(); ?>

			<!--Carte 2
			<a href="" class="droit">
				<div class="droit__titre">
				<p><span class="surligne__droits">Les règles particulières aux HLM</span></p>
				</div>

				<div class="droit__desc">
				<p>Prenez connaissance des deux règlements spécifiques aux HLM.</p>
				</div>
				<div class="droit__img"></div>
			</a>-->


			<!--Carte 3

			<a href="" class="droit">
				<div class="droit__titre">
				<p><span class="surligne__droits">Les politiques locales</span></p>
				</div>

				<div class="droit__desc">
				<p>Le conseil d'administration de votre office peut adopter des règles locales sur plusieurs questions
					touchant
					la vie des locataires.</p>
				</div>
				<div class="droit__img"></div>
			</a>-->

			</div>

			<!--Fin des cartes à Victor modifiés par Kenza-->

		</section>

		<?php endif; ?>
		
	</article>
<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

//get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>