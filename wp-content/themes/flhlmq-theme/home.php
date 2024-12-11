<?php 
/**
 * 	Template Name: Acceuil
 * 	Template Post Type: home
 */

get_header(); // Affiche header.php
get_template_part('partials/heroAccueil');
if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post(); 
?>

	<article>
		<?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>
			<!--Hero (Victor)
			<section class="hero">
				
				<div class="hero__container">

				<div class="hero__info info">
					<div class="info__nomEntreprise">
					La Fédérations des locataires d'habitations à loyer modique du Québec
					</div>
					<div class="info__msgEntreprise">
					Ouvrons nos portes à un avenir <em><strong>sans</strong> craintes</em>
					</div>
					<button class="info__btn info__btn--un  btnN">
					<a href="#">S'inscrire</a>
					</button>
					<button class="info__btn info__btn--deux  btnB">
					<a href="#">
						S'informer
						<svg viewBox="0 0 72 46" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M3 20C1.34315 20 0 21.3431 0 23C0 24.6569 1.34315 26 3 26L3 20ZM71.1213 25.1213C72.2929 23.9497 72.2929 22.0503 71.1213 20.8787L52.0294 1.7868C50.8579 0.615224 48.9584 0.615224 47.7868 1.7868C46.6152 2.95837 46.6152 4.85786 47.7868 6.02944L64.7574 23L47.7868 39.9706C46.6152 41.1421 46.6152 43.0416 47.7868 44.2132C48.9584 45.3848 50.8579 45.3848 52.0294 44.2132L71.1213 25.1213ZM3 26L69 26V20L3 20L3 26Z"
							fill="white" />
						</svg>
					</a>
					</button>
				</div>

				<div class="hero_swiper swiper">

					<div class="swiper-wrapper">
					<div class="swiper-slide swiper-slide_hero">
						<img src="./medias/img/accueil_carte_01.jpg" alt="accueil_carte_01.jpg" class="swiper-slide__img">
					</div>
					<div class="swiper-slide swiper-slide_hero">
						<img src="./medias/img/accueil_carte_02.jpg" alt="accueil_carte_02.jpg" class="swiper-slide__img">
					</div>
					<div class="swiper-slide swiper-slide_hero">
						<img src="./medias/img/accueil_carte_03.jpg" alt="accueil_carte_03.jpg" class="swiper-slide__img">
					</div>
					</div>
					<div class="swiper-pagination"></div>
				</div>

				</div>
				
			</section>
			Fin Hero (Victor)-->
			

			<!--Début Recherche (Joshua)-->
			<?php
			while( have_rows('homesearchbar')): the_row();
			?>
			<section class="recherche">
				<div class="recherchebar">
				<div class="recherchebar__content">
					<h4 class="recherchebar__text"><?php the_sub_field('question'); ?></h4>
					<form class="search">
					<span class="search-icon material-symbols-outlined">search</span>
					<input type="search" class="search-input" placeholder="<?php the_sub_field('placeholder'); ?>">
					</form>
				</div>
				</div>
			</section>
			<?php endwhile; ?>
			<!--Fin Recherche (Joshua)-->

			<!--Début A propos (Joshua)-->
			<?php
			while( have_rows('homeabout')): the_row();
			$image = get_sub_field('backgroundimage');
			?>
			<section class="a-propos" style="background-image: url('<?php echo esc_url($image['url']);?>');">
				<div class="apropos">
				<div class="apropos__content">
					<h1 class="apropos__text"><?php the_sub_field('title'); ?></h1>
				</div>
				<button class="apropos__btn btnBs"><?php the_sub_field('btn'); ?></button>
				<p class="apropos__desc"><?php the_sub_field('desc'); ?></p>
				<img src="<?php bloginfo('template_url'); ?>/medias/img/a_propos_vector.svg" class="apropos__vector">
				</div>
			</section>
			<?php endwhile; ?>
			<!--Fin A propos (Joshua)-->

			<?php get_template_part( 'partials/servicespartial'); ?>

			<script>
				
				document.addEventListener("DOMContentLoaded", (event) => {
					fetch("<?php bloginfo('url'); ?>/index.php/wp-json/wp/v2/news_article?_embed")
						.then(data => data.json())
						.then(posts => {
							console.log("<?php bloginfo('url'); ?>/index.php/wp-json/wp/v2/news_article?_embed");
							console.log(posts);
							posts.forEach((post, i) => {
								const actuFetch = document.querySelector('.actuFetch');
								let srcImg = post._embedded['wp:featuredmedia'][0].source_url;
								console.log(post.title.rendered);
								console.log(post.acf)
								console.log(post._embedded['wp:featuredmedia'][0].source_url);
								let val = i + 1;
								actuFetch.innerHTML += `
								<div class="swiper-slide swiper-slide--nouv${val}">
									<div class="actualite">
										<div class="actualite__date">
										mar 20/08/2024 - 13:30 | ${post.date_gmt}
										</div>
										<div class="actualite__desc">
										<p>
											<a href="${post.link}">${post.title.rendered}</a>
										</p>
										</div>
										<!--image pour tester-->
										<div class="actualite__img imageFetch${i}" style="background-image: url('');"></div>
										<button class="actualite__btn btnN">
											<a href="#">${post.acf.newsarticlecategory[0]}</a>
										</button>
									</div>
								</div>
								`;
							});
							
							
						});
					fetch("<?php bloginfo('url'); ?>/index.php/wp-json/wp/v2/news_article?_embed")
						.then(data => data.json()) 
						.then(all => {
							console.log(all);
							all.forEach(el, i => {
								let img = document.querySelector(`.imageFetch${i}`);
								let val = el;
								console.log(val._embedded['wp:featuredmedia'][0].source_url);
								let srcImg = val._embedded['wp:featuredmedia'][0].source_url;
								img.style.backgroundImage = `url(${srcImg})`;
							});
						});
				});
				

				//news_article?_embed
			</script>

			<section class="actualites">
				<?php $imageActu = get_field('actialitetitleimg'); ?>
				<img src="<?php echo esc_url($imageActu['url']) ?>" class="actualites__titre" width="648px" height="207px">
				<div class="swiper swiperActialite">
					<div class="swiper-wrapper actuFetch">
					</div>
				</div>

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

			</section>

			<section class="temoignages">
				<!--Note à moi même METTRE SVG VAGUES (Fonctionne pas sur les ordis labo à cause de l'inspecteur)-->
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1541 93" fill="none">
				<path
					d="M0.731701 72.6948C0.731701 72.6948 0.731543 50.5 0.730469 0.354004H1540.73V92.3534C1503 92.3534 1420.22 72.0641 1385.73 72.6948C1355.11 73.2549 1335.88 85.3619 1294.23 85.3619C1252.58 85.3619 1221.18 71.5135 1179.73 72.6948C1146.22 73.6499 1124.76 85.3908 1091.23 85.3619C1057.9 85.3331 1030.04 73.9025 996.73 72.6948C952.765 71.101 945.24 85.3619 901.23 85.3619C882.396 85.3619 845.802 73.0666 809.73 72.6948C770.755 72.2932 764.404 85.3619 710.73 85.3619C691.381 85.3619 657.839 73.9948 638.555 72.6948C612.601 70.9453 599.059 85.4373 573.052 85.3619C547.429 85.2876 534.153 73.7394 508.549 72.6948C476.207 71.3754 456.23 85.3619 426.546 85.3619C403.754 85.3619 379.991 73.719 357.23 72.6948C334.469 71.6706 296.5 82.5 274 85.3619C228.991 91.0868 171.266 86.2873 128 72.6948C86 59.5 48.3807 70.8259 0.731701 72.6948Z"
					fill="white" />
				</svg>
				<h2 class="temoignages__titre"><?php the_field("testimonytitle") ?></h2>
				<div class="marge__tem">
				<?php get_template_part("partials/temoignage"); ?>
				</div>

			</section>
		<?php endif; ?>
		
		<?php the_content(); // Contenu principal de la page ?>
	</article>
<?php endwhile; // Fermeture de la boucle
get_template_part('partials/member'); 
get_template_part('partials/infoletter');
else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

//get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>