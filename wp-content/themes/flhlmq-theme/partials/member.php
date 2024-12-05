<?php
/**
 * Template Name: membership
 * Template Post Type: membership
 */
if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	$member = new WP_Query('post_type=membership');
  while ($member->have_posts()) : $member->the_post();  
?>
<section class="membre">
    <button class="appelAction__btn">
    <?php the_field('membership_btn')?>
    </button>
    <div class="appelAction">
      <div class="appelAction--over"></div>
      <div class="appelAction__svgLine">
        <svg viewBox="0 0 15 62" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M15 54.5C15 58.6421 11.6421 62 7.5 62C3.35786 62 0 58.6421 0 54.5C0 50.3579 3.35786 47 7.5 47C11.6421 47 15 50.3579 15 54.5Z"
            fill="black" />
          <path d="M6 0H9V49H6V0Z" fill="black" />
        </svg>
      </div>
      <h1 class="appelAction__titre">
      <?php the_field('membership_title')?>
      </h1>
      <div class="appelAction__text">
      <?php the_field('membership_desc')?>
      </div>


    </div>
  </section>

  <?php 
    endwhile;
    endif;
    ?>