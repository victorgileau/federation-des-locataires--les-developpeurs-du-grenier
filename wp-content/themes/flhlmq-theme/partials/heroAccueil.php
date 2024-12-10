<?php
/**
 * Template Name: HeroMain
 * Template Post Type: hero-main
 */
if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	$member = new WP_Query('post_type=hero-main');
  while ($member->have_posts()) : $member->the_post();  
?>

<?php 
$image1 = get_field('main_image_01');
$image2 = get_field('main_image_02');
$image3 = get_field('main_image_03');
?>

<div class="hero__container">

<div class="hero__info info">
  <div class="info__nomEntreprise">
    <?php the_field('main_name')?>
  </div>
  <div class="info__msgEntreprise">
  <?php the_field('main_quote')?> <em><strong><?php the_field('main_strongtext01')?></strong> <?php the_field('main_strongtext02')?></em>
  </div>
  <button class="info__btn info__btn--un  btnN">
    <a href="#"><?php the_field('main_button_01')?></a>
  </button>
  <button class="info__btn info__btn--deux  btnB">
    <a href="#">
    <?php the_field('main_button_02')?>
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
      <img src="<?php echo esc_url($image1['url']);?>" alt="accueil_carte_01.jpg" class="swiper-slide__img">
    </div>
    <div class="swiper-slide swiper-slide_hero">
      <img src="<?php echo esc_url($image2['url']);?>" alt="accueil_carte_02.jpg" class="swiper-slide__img">
    </div>
    <div class="swiper-slide swiper-slide_hero">
      <img src="<?php echo esc_url($image3['url']);?>" alt="accueil_carte_03.jpg" class="swiper-slide__img">
    </div>
  </div>
  <div class="swiper-pagination"></div>
</div>

</div>


<?php 
    endwhile;
    endif;
    ?>