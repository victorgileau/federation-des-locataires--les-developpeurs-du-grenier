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
			let startValue = 4;
			const orderNewsEl = document.querySelector('#orderNewsId');
			orderNewsEl.addEventListener("change", () => {
				console.log(orderNewsEl.value);
				if (orderNewsEl.value == "ASC") {
					let actuFetchNew = document.querySelector('.fetch');
					actuFetchNew.innerHTML = "";
					fetchFunction('asc', startValue);
				} else if (orderNewsEl.value == "DESC") {
					let actuFetchNew = document.querySelector('.fetch');
					actuFetchNew.innerHTML = "";
					fetchFunction('desc', startValue);
				}
			});

			const buttonAddMore = document.querySelector('.buttonAddMore');
			buttonAddMore.addEventListener('click', () => {
				startValue++;
				let actuFetchNew = document.querySelector('.fetch');
				actuFetchNew.innerHTML = "";
				if (orderNewsEl.value == "ASC") {
					fetchFunction('asc', startValue);
				} else if (orderNewsEl.value == "DESC") {
					fetchFunction('desc', startValue);
				}
			});

			fetchFunction('desc', 4);
			
			function fetchFunction(order, number) {
				let url = "<?php bloginfo('url'); ?>/index.php/wp-json/wp/v2/news_article?user_has_cap&_embed&per_page=" + number + "&orderby=date&order=" + order + "";
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
						let jsonImage = `<?php bloginfo('url'); ?>/index.php/wp-json/wp/v2/media/${post.acf.newsarticleimageone}`;
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

							<div class="actualiteHub__img imageFetch${index}" style="background-image: url('https://www.elegantthemes.com/blog/wp-content/uploads/2019/12/401-error-wordpress-featured-image.jpg');"></div>
							<?php $numberNewsImage++; ?>
							<button class="actualiteHub__btn btnN">
							${post.acf.newsarticlecategory[0]}
							</button>
						</a>`;
					});
					
					
				});
			}
		});
		

		//news_article?_embed
	</script>

	<?php 
		if (have_posts()) : 
			while ( have_posts() ) : the_post(); 
	?>
	<div class="containerSelectOrder">
		<select name="orderNews" id="orderNewsId">
			<option class="ASC" value="ASC"><?php the_field('asctext'); ?></option>
			<option class="DESC" value="DESC"><?php the_field('desctext'); ?></option>
		</select>
	</div>
	<?php endwhile; ?>

	<section class="actus">
		<div class="actus__alignement fetch">

		</div>
	</section>

	<div class="containerBtnNext">
		<button class="buttonAddMore btnN">+</button>
	</div>

	<article>
	<section class="actus">
		<div class="actus__alignement">
		<?php
			// Si oui, bouclons au travers pour tous les afficher
			
		$arguments = array( // 👈 Tableau d'arguments
			'orderby' => array(
			'date' =>'DESC',
			),
			'post_type' => 'news_article',
			'posts_per_page' => 13,
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