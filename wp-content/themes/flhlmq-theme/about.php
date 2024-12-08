<?php 
/**
 * 	Template Name: À propos
 * 	Template Post Type: errorpage, hero, service, about
 * 	Identique à page, mais avec une barre latérale
 */

get_header(); // Affiche header.php
get_template_part( 'partials/hero');

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
						<h2 class="groupes__titre">
							<?php the_sub_field('about_grouptitle'); ?>
						</h2>
						<p class="groupes__text">
							<span class="bold__font"><?php the_sub_field('about_groupeinfoonenum'); ?></span> <br> <?php the_sub_field('about_groupeinfoonetext'); ?>
						</p>
						<p class="groupes__text">
							<span class="bold__font"><?php the_sub_field('about_groupeinfotownum'); ?></span> <br><?php the_sub_field('about_groupeinfotowtext'); ?>
						</p>
						<p class="groupes__text">
							<span class="bold__font"><?php the_sub_field('about_groupeinfothreenum'); ?></span> <br> <?php the_sub_field('about_groupeinfothreetext'); ?>
						</p>
					</div>
					<?php endwhile; ?>
				</div>
			</section>

			<section class="section__mission mission">
				<div class="mission__alignement">
					<!--<img src="medias/img/accueil_hero_01.jpg" alt="" class="mission__img">-->
					<h2 class="mission__alignement--titre"><?php the_field('about_missionmaintitle') ?></h2>

					<div class="mission__grid">
						<hr>
						<div class="card">
							<div class="card__column">
								<h3 class="card__titre"><?php the_field('about_missiononetitle'); ?></h3>
								
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94 48" fill="none" class="svg__arrow">
									<path
										d="M89.8953 36.7627C67.6988 29.1199 46.1716 19.8106 24.013 12.086C19.4273 10.4874 -9.69208 0.216067 9.53281 9.00135C25.6277 16.3563 42.7509 21.1731 59.3844 27.0562C61.6279 27.8497 90.6211 34.7337 90.6416 35.4972C90.7709 40.3086 75.251 42.5874 72.2394 43.374C56.2942 47.5392 71.2145 42.9187 77.1007 40.2874C85.9604 36.3269 85.0844 34.5833 78.6711 26.4106C72.0697 17.9982 64.7281 10.2659 57.375 2.52443"
										stroke="#1F7A8C" stroke-width="5" stroke-linecap="round" />
								</svg>
								
							</div>
							<p class="card__text">
								<?php the_field('about_missiononetext'); ?>

							</p>
						</div>
						<hr>
						<div class="card">
							<div class="card__column">
								<h3 class="card__titre"><?php the_field('about_missiontwotitle'); ?></h3>
								
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 107 95" fill="none">
									<path
										d="M76.0592 88.7259C69.1061 83.2844 58.7154 79.726 50.7671 75.6966C35.3853 67.8989 1.77187 55.0875 3.40182 33.0832C4.58299 17.1374 15.285 15.4292 27 14.9993C36.0318 14.6678 46 21.97 55.289 41.5139C55.3236 41.8944 55.2042 45.529 55.4423 42.4336C55.9867 35.3561 57.5209 28.3237 60.8073 21.97C64.8767 14.1025 79 -7.00008 97.8258 8.78745C113.5 33.0832 96.4728 52.9893 82.5 65.8097C73.5735 74 73.6135 75.5528 65 82.2522C61.1988 85.2086 57.5342 86.7741 50.7671 92.5"
										stroke="#1F7A8C" stroke-width="5" stroke-linecap="round" />
								</svg>
								
							</div>
							<p class="card__text">
								<?php the_field('about_missiontwotext'); ?>

							</p>
						</div>
						<hr>
						<div class="card">
							<div class="card__column">
							<?php
							 ?>
								<h3 class="card__titre"><?php the_field('about_missionthreetitle'); ?></h3>
								
								
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 66" fill="none">
									<path
										d="M10.1142 60.0961C10.88 54.7349 16.0687 49.4305 18.9829 45.1479C25.1876 36.0297 29.3946 26.5759 34.1457 16.682C35.8564 13.1194 37.8301 9.78773 39.939 6.45428C40.4652 5.62246 41.6164 2.86518 42.7999 2.59208C43.5281 2.42403 43.7724 19.1837 44.0158 20.6872C45.3133 28.7044 49.7113 36.3778 52.0978 44.1466C53.9121 50.0527 56.0515 55.9632 58.2487 61.7411C59.5406 65.1383 59.7159 62.8441 56.6752 61.0974C48.3419 56.3102 40.8862 50.0876 32.9655 44.6472C25.3811 39.4377 17.6219 34.1137 9.57774 29.6275C7.53827 28.4901 1.02604 26.2426 3.35529 26.409C6.32481 26.6211 9.38647 27.9924 12.3313 28.4832C18.6564 29.5373 25.134 29.7706 31.5351 29.7706C41.2092 29.7706 50.9186 28.8306 60.4659 27.3031C62.684 26.9482 70.7835 25.7128 64.6857 28.3044C57.9352 31.1734 51.4976 34.7453 44.731 37.6023C35.7687 41.3863 27.6996 45.4715 20.163 51.6922C17.6838 53.7385 15.2775 55.8599 12.8678 57.9861C11.1475 59.504 11.0809 59.4593 10.7579 57.5213"
										stroke="#1F7A8C" stroke-width="5" stroke-linecap="round" />
								</svg>
								
							</div>
							<p class="card__text">
								<?php the_field('about_missionthreetext'); ?>

							</p>
						</div>
						<hr>
						<div class="mission__alignement--card card">
							<div class="card__column">
							<?php /*while( have_rows('aboutmissionfive')) : the_row();*/
							?>
								<h3 class="card__titre"><?php the_field('about_missionfourtitle'); ?></h3>
								
								
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110 100" fill="none">
									<path d="M28.2137 18.9654C10.796 20.4788 3 46.3429 3 60.6039C3 108.491 66.1038 102.688 92.1974 79.8947C116.646 58.5385 108.585 27.0285 84.2324 9.89982C77.3506 5.05943 69.2204 1.72454 60.7067 3.46957C56.7372 4.28317 53.1358 6.05619 49.102 6.63198M24.6725 46.9012C25.0971 44.5658 27.6699 40.392 29.6551 39.0421C32.2938 37.2478 38.2064 42.7829 40.853 43.6651M63.5057 38.1176C63.8417 35.9338 69.5371 22.752 71.4675 24.6082C73.3161 26.3857 77.1615 27.5206 78.2993 29.7962M49.6367 57.9965C50.3003 61.9783 58.6162 61.3095 61.2456 61.1813C67.5639 60.8731 71.6325 59.6997 73.214 53.3735M21.8987 58.9211C21.1739 59.7264 20.5118 60.8357 20.5118 61.6949M31.1447 56.1472C29.7342 58.046 27.8591 59.9693 26.984 62.1571M84.7715 42.7405C84.5955 43.3013 83.2405 48.114 83.8469 46.9012M93.5552 39.0422C93.2606 41.1045 92.2085 43.0422 91.706 45.0521" stroke="#1F7A8C" stroke-width="5" stroke-linecap="round" />
								</svg>
								
							</div>
							<p class="card__text">
								<?php the_field('about_missionfourtext'); ?>

							</p>
							<?php /*endwhile;*/ ?>
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

//get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>