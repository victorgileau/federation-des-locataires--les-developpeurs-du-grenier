<?php 
/**
 * 	Template Name: À propos
 * 	Template Post Type: errorpage, hero, service, about
 * 	Identique à page, mais avec une barre latérale
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post();

	$history = get_field('about_history');
	$groupe = get_field('about_groupe');
	$missionOne = get_field('about_missionone');
	$missionTwo = get_field('about_missiontwo');
	$missionThree = get_field('about_missionthree');
	$missionFour = get_field('about_missionfour');
?>

	<article>
		<?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>
			<!--PAGE À PROPOS KENZA-->
			<section class="section__intro intro">
				<div class="intro__alignement">
				<?php while( have_rows('about_history')) : the_row(); ?>
					<div class="intro__alignement--img">
						<img src="<?php echo esc_url( $history['about_historyimage']['url']); ?>" alt="">
					</div>

					
					<h2 class="intro__alignement--titre"><?php the_sub_field('about_historytitle'); ?></h2>
					<p class="intro__alignement--text">
						<?php the_sub_field('about_historytext'); ?>
						<!--
						C’est en <span class="surligne">1993</span> que huit associations de locataires de Laval,
						Trois-Rivières, Mont-Joli, Rivière-du-Loup,
						Québec et Montréal ont eu la bonne idée de <span class="surligne">créer la Fédération des locataires
							d’habitations à loyer modique du Québec (FLHLMQ).</span> Pour y parvenir, elles ont pu bénéficier du
						soutien généreux du Front d’action populaire
						en réaménagement urbain (FRAPRU).
						<br>
						<br>
						La Fédération a obtenu <span class="surligne">sa première grande victoire, en avril 1998,</span> en
						obtenant une première directive de la
						SHQ. Ce gain avait demandé le dépôt d’une <span class="surligne">pétition de 30 000 signatures</span>
						ainsi qu’une <span class="surligne">manifestation de plus
							de 700 locataires devant l’Assemblée nationale du Québec.</span>
		-->
					</p>
					<?php endwhile; ?>
				</div>

			</section>

			<section class="section__groupes groupes">
				<div class="groupes__alignement">
					<div class="groupes__grid">
					<?php while( have_rows('about_groupe')) : the_row(); ?>
						<h2 class="groupes__titre"><?php the_sub_field('about_grouptitle'); ?></h2>
						<p class="groupes__text"><span class="bold__font"><?php the_sub_field('about_groupeinfoonenum'); ?></span> <br> <?php the_sub_field('about_groupeinfoonetext'); ?></p>
						<p class="groupes__text"><span class="bold__font"><?php the_sub_field('about_groupeinfotownum'); ?></span> <br><?php the_sub_field('about_groupeinfotowtext'); ?></p>
						<p class="groupes__text"><span class="bold__font"><?php the_sub_field('about_groupeinfothreenum'); ?></span> <br> <?php the_sub_field('about_groupeinfothreetext'); ?></p>
					</div>
					<?php endwhile; ?>
				</div>
			</section>

			<section class="section__mission mission">
				<div class="mission__alignement">
					<!--<img src="medias/img/accueil_hero_01.jpg" alt="" class="mission__img">-->
					<h2 class="mission__alignement--titre">Notre mission</h2>

					<div class="mission__grid">
						<hr>
						<div class="card">
							<div class="card__column">
							<?php while( have_rows('about_missionone')) : the_row(); ?>
								<h3 class="card__titre"><?php the_sub_field('about_missioninfotitle'); ?></h3>
								<?php the_sub_field('about_missioninfoicon'); ?>
								<!--
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94 48" fill="none" class="svg__arrow">
									<path
										d="M89.8953 36.7627C67.6988 29.1199 46.1716 19.8106 24.013 12.086C19.4273 10.4874 -9.69208 0.216067 9.53281 9.00135C25.6277 16.3563 42.7509 21.1731 59.3844 27.0562C61.6279 27.8497 90.6211 34.7337 90.6416 35.4972C90.7709 40.3086 75.251 42.5874 72.2394 43.374C56.2942 47.5392 71.2145 42.9187 77.1007 40.2874C85.9604 36.3269 85.0844 34.5833 78.6711 26.4106C72.0697 17.9982 64.7281 10.2659 57.375 2.52443"
										stroke="#1F7A8C" stroke-width="5" stroke-linecap="round" />
								</svg>
								-->
							</div>
							<p class="card__text">
								<?php the_sub_field('about_missioninfotext'); ?>

							</p>
							<?php endwhile; ?>
						</div>
						<hr>
						<div class="card">
							<div class="card__column">
							<?php while( have_rows('about_missiontwo')) : the_row(); ?>
								<h3 class="card__titre"><?php the_sub_field('about_missioninfotitle'); ?></h3>
								<?php the_sub_field('about_missioninfoicon'); ?>
								<!--
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94 48" fill="none" class="svg__arrow">
									<path
										d="M89.8953 36.7627C67.6988 29.1199 46.1716 19.8106 24.013 12.086C19.4273 10.4874 -9.69208 0.216067 9.53281 9.00135C25.6277 16.3563 42.7509 21.1731 59.3844 27.0562C61.6279 27.8497 90.6211 34.7337 90.6416 35.4972C90.7709 40.3086 75.251 42.5874 72.2394 43.374C56.2942 47.5392 71.2145 42.9187 77.1007 40.2874C85.9604 36.3269 85.0844 34.5833 78.6711 26.4106C72.0697 17.9982 64.7281 10.2659 57.375 2.52443"
										stroke="#1F7A8C" stroke-width="5" stroke-linecap="round" />
								</svg>
								-->
							</div>
							<p class="card__text">
								<?php the_sub_field('about_missioninfotext'); ?>

							</p>
							<?php endwhile; ?>
						</div>
						<hr>
						<div class="card">
							<div class="card__column">
							<?php while( have_rows('about_missionthree')) : the_row(); ?>
								<h3 class="card__titre"><?php the_sub_field('about_missioninfotitle'); ?></h3>
								<?php the_sub_field('about_missioninfoicon'); ?>
								<!--
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94 48" fill="none" class="svg__arrow">
									<path
										d="M89.8953 36.7627C67.6988 29.1199 46.1716 19.8106 24.013 12.086C19.4273 10.4874 -9.69208 0.216067 9.53281 9.00135C25.6277 16.3563 42.7509 21.1731 59.3844 27.0562C61.6279 27.8497 90.6211 34.7337 90.6416 35.4972C90.7709 40.3086 75.251 42.5874 72.2394 43.374C56.2942 47.5392 71.2145 42.9187 77.1007 40.2874C85.9604 36.3269 85.0844 34.5833 78.6711 26.4106C72.0697 17.9982 64.7281 10.2659 57.375 2.52443"
										stroke="#1F7A8C" stroke-width="5" stroke-linecap="round" />
								</svg>
								-->
							</div>
							<p class="card__text">
								<?php the_sub_field('about_missioninfotext'); ?>

							</p>
							<?php endwhile; ?>
						</div>
						<hr>
						<div class="mission__alignement--card card">
							<div class="card__column">
							<?php while( have_rows('about_missionfour')) : the_row();
							$svgFour = get_sub_field('about_missioninfoicon')
							?>
								<h3 class="card__titre"><?php the_sub_field('about_missioninfotitle'); ?></h3>
								
								<!--
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94 48" fill="none" class="svg__arrow">
									<path
										d="M89.8953 36.7627C67.6988 29.1199 46.1716 19.8106 24.013 12.086C19.4273 10.4874 -9.69208 0.216067 9.53281 9.00135C25.6277 16.3563 42.7509 21.1731 59.3844 27.0562C61.6279 27.8497 90.6211 34.7337 90.6416 35.4972C90.7709 40.3086 75.251 42.5874 72.2394 43.374C56.2942 47.5392 71.2145 42.9187 77.1007 40.2874C85.9604 36.3269 85.0844 34.5833 78.6711 26.4106C72.0697 17.9982 64.7281 10.2659 57.375 2.52443"
										stroke="#1F7A8C" stroke-width="5" stroke-linecap="round" />
								</svg>
								-->
							</div>
							<p class="card__text">
								<?php the_sub_field('about_missioninfotext'); ?>

							</p>
							<?php endwhile; ?>
						</div>
						<hr>
					</div>
				</div>
			</section>

    <!--Fin page à propos Kenza-->
		<?php endif; ?>
	</article>
<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>