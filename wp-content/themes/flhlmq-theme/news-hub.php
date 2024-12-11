<?php 
/**
 * 	Template Name: newsHub
 * Template Post Type: errorpage, hero, news_article, newshub
 * 	Identique à page, mais avec une barre latérale
 */

get_header(); // Affiche header.php
get_template_part( 'partials/hero');

?>

<?php
			// Si oui, bouclons au travers pour tous les afficher
			/*
		$imageNewsArr = array();
		$numberNewsImage = 0;
		$arguments = array( // 👈 Tableau d'arguments
			'orderby' => array(
			'date' =>'DESC',
			),
			'post_type' => 'news_article',
		);
		$article = new WP_Query($arguments); // 👈 Utilisation
		while ($article->have_posts()) : $article->the_post();
		$imageNewsArr[] = the_post_thumbnail_url();
		endwhile; 
		wp_reset_postdata();
		*/
	?>

	<script>
		
		document.addEventListener("DOMContentLoaded", (event) => {
			let asc = document.querySelector('.ASC');
			let desc = document.querySelector('.DESC');
			const orderNews = document.querySelector('#orderNews');
			orderNews.addEventListener("change", () => {
				console.log(this.value);
				if (this.value == "ASC") {
					let actuFetchNew = document.querySelector('.fetch');
					actuFetchNew.innerHTML = "";
					fetchFunction('asc');
				} else if (this.value == "DESC") {
					let actuFetchNew = document.querySelector('.fetch');
					actuFetchNew.innerHTML = "";
					fetchFunction('desc');
				}
			});

			fetchFunction('desc');
			
			function fetchFunction(order) {
				let url = "<?php bloginfo('url'); ?>/index.php/wp-json/wp/v2/news_article?_embed&per_page=4&orderby=date&order=" + order + "";
				fetch(url)
				.then(data => data.json())
				.then(posts => {
					console.log("<?php bloginfo('url'); ?>/index.php/wp-json/wp/v2/news_article?_embed");
					console.log(posts);
					let array = [];
					<?php 
					/*
						for ($i=0; $i < (count($imageNewsArr)); $i++) { 
							//echo $imageNewsArr[$i];
							?> array.push("<?php echo $imageNewsArr[$i]; ?>"); <?php
						}
							*/
					?>
					posts.forEach((post, index) => {
						let actuFetch = document.querySelector('.fetch');
						console.log(post.title.rendered);
						console.log(post.acf)
						console.log(post._embedded['wp:featuredmedia'][0].source_url);
						let val = index + 1;
						actuFetch.innerHTML += `
						<a href="${post.link}" class="actualiteHub news${val}">
							<p class="actualiteHub__date">
							${post.acf.newsarticledate}
							</p>
							<div class="actualiteHub__desc">
								<p>
									<span class="surligne__droits">${post.title.rendered}</span>
								</p>
							</div>

							<div class="actualiteHub__img imageFetch${index}" style="background-image: url('');"></div>
							<?php $numberNewsImage++; ?>
							<button class="actualiteHub__btn btnN">
							${post.acf.newsarticlecategory[0]}
							</button>
						</a>`;
					});
					
					
				});
			}
			
				/*
			fetch("<?php /*bloginfo('url');*/ ?>/index.php/wp-json/wp/v2/news_article?_embed")
				.then(data => data.json()) 
				.then(all => {
					console.log(all);
					all.forEach((el, i) => {
						const img = document.querySelector(`.imageFetch${i}`);
						let val = el;
						console.log(val._embedded['wp:featuredmedia'][0].source_url);
						let srcImg = val._embedded['wp:featuredmedia'][0].source_url;
						img.style.backgroundImage = `url(${srcImg})`;
					});
				});*/
		});
		

		//news_article?_embed
	</script>

	<select name="orderNews" id="orderNews">
		<option class="ASC" value="ASC">Plus enciens</option>
		<option class="DESC" value="DESC">Plus récent</option>
	</select>

	<section class="actus">
		<div class="actus__alignement fetch">

		</div>
	</section>

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
		$i = 1;
		$article = new WP_Query($arguments); // 👈 Utilisation
		while ($article->have_posts()) : $article->the_post();
		?>

		<a href="<?php the_permalink(); ?>" class="actualiteHub <?php echo "news", $i ?>">
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
		$i++;
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