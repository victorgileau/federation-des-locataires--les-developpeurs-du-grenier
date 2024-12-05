<?php
/**
 * Template Name: InfoLetter
 * Template Post Type: infoletter
 */
if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	$member = new WP_Query('post_type=infoletter');
  while ($member->have_posts()) : $member->the_post();  
?>
<section class="abonnement">
    <div class="membership">
      <h1 class="membership__text"><?php the_field('infoletter_title')?></h1>
      <div class="membership__content">
        <form action="" class="membership__form">
          <input type="text" class="membership__input" placeholder="<?php the_field('infoletter_placeholder')?>">
        </form>
        <button class="membership__btn btnBleu"><?php the_field('infoletter_btn')?></button>
      </div>
    </div>
  </section>

  <?php 
    endwhile;
    endif;
    ?>