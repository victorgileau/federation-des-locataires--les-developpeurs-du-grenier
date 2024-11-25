<?php 
/**
 * 	Template Name: teamTheme
 * 	Template Post Type: team-member
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post(); 
?>
<?php 
$member1 = get_field('team_member_1');
$membername1 = $member1['member_name_1'];
$memberimage1 = $member1['member_image_1'];
?>
<main>
        <div class="hero equipe">
            <h1 class="hero__titre titre">Notre Équipe</h1>
            <div class="hero__bgHero bgHero">
                <img class="hero__img img" src="./medias/img/accueil_carte_01.jpg" alt="hero image">
            </div>
            <p class="hero__page page"><a href="./index.html">Accueil</a> > Notre Équipe</p>
        </div>

        <div class="equipeConteneur">
            <div class="membreEquipe">
                <img loading="lazy" class="membreEquipe__img" id="membre1Btn"
                    src="<?php echo esc_url( $memberimage1['image']['url'] ); ?>" alt="image robert_pilon">
                <h1 class="membreEquipe__nom"><?php echo $membername1 ?></h1>
                <p class="membreEquipe__poste"><?php the_field('member_role_1')?></p>
            </div>

            <div class="membreEquipe">
                <img loading="lazy" class="membreEquipe__img" id="membre2Btn"
                    src="<?php the_field('member_image_2')?>" alt="image elisabeth_pham">
                <h1 class="membreEquipe__nom"><?php the_field('member_name_2')?></h1>
                <p class="membreEquipe__poste"><?php the_field('member_role_2')?></p>
            </div>

            <div class="membreEquipe">
                <img loading="lazy" class="membreEquipe__img" id="membre3Btn"
                    src="<?php the_field('member_image_3')?>" alt="image patricia_viannay">
                <h1 class="membreEquipe__nom"><?php the_field('member_name_3')?></h1>
                <p class="membreEquipe__poste"><?php the_field('member_role_3')?></p>
            </div>

            <div class="membreEquipe">
                <img loading="lazy" class="membreEquipe__img" id="membre4Btn"
                    src="<?php the_field('member_image_4')?>" alt="image anik_leroux">
                <h1 class="membreEquipe__nom"><?php the_field('member_name_4')?></h1>
                <p class="membreEquipe__poste"><?php the_field('member_role_4')?></p>
            </div>
        </div>

        <div class="modalMembreEquipe" id="membre1">
            <button class="modalMembreEquipe__btnFermer" id="membre1BtnClose">X</button>
            <img loading="lazy" class="modalMembreEquipe__img" id="membre1Btn"
                src="<?php the_field('member_image_1')?>" alt="image robert_pilon">
            <h1 class="modalMembreEquipe__nom"><?php the_field('member_name_1')?></h1>
            <p class="modalMembreEquipe__poste"><?php the_field('member_role_1')?></p>
            <p>
			<?php the_field('member_desc_1')?>
            </p>
        </div>

        <div class="modalMembreEquipe" id="membre2">
            <button class="modalMembreEquipe__btnFermer" id="membre2BtnClose">X</button>
            <img loading="lazy" class="modalMembreEquipe__img" id="membre1Btn"
                src="<?php the_field('member_image_2')?>" alt="image elisabeth_pham">
            <h1 class="modalMembreEquipe__nom"><?php the_field('member_name_2')?></h1>
            <p class="modalMembreEquipe__poste"><?php the_field('member_role_2')?></p>
            <p>
			<?php the_field('member_desc_2')?>
            </p>
        </div>

        <div class="modalMembreEquipe" id="membre3">
            <button class="modalMembreEquipe__btnFermer" id="membre3BtnClose">X</button>
            <img loading="lazy" class="modalMembreEquipe__img" id="membre1Btn"
                src="<?php the_field('member_image_3')?>" alt="image patricia_viannay">
            <h1 class="modalMembreEquipe__nom"><?php the_field('member_name_3')?></h1>
            <p class="modalMembreEquipe__poste"><?php the_field('member_role_3')?></p>
            <p>
			<?php the_field('member_desc_3')?>
            </p>
        </div>

        <div class="modalMembreEquipe" id="membre4">
            <button class="modalMembreEquipe__btnFermer" id="membre4BtnClose">X</button>
            <img loading="lazy" class="modalMembreEquipe__img" id="membre1Btn"
                src="<?php the_field('member_image_4')?>" alt="image anik_leroux">
            <h1 class="modalMembreEquipe__nom"><?php the_field('member_name_4')?></h1>
            <p class="modalMembreEquipe__poste"><?php the_field('member_role_4')?></p>
            <p>
			<?php the_field('member_desc_4')?>
            </p>
        </div>
    </main>
<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>