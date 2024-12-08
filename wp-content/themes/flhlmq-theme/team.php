<?php 
/**
 * 	Template Name: teamTheme
 * 	Template Post Type: team-member
 */

get_header(); // Affiche header.php

get_template_part( 'partials/hero');

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post(); 
?>
<?php 
$member1 = get_field('team_member_1');
$membername1 = $member1['member_name_1'];
$memberimage1 = $member1['member_image_1'];
$memberrole1 = $member1['member_role_1'];
$memberdesc1 = $member1['member_desc_1'];

$member2 = get_field('team_member_2');
$membername2 = $member2['member_name_2'];
$memberimage2 = $member2['member_image_2'];
$memberrole2 = $member2['member_role_2'];
$memberdesc2 = $member2['member_desc_2'];

$member3 = get_field('team_member_3');
$membername3 = $member3['member_name_3'];
$memberimage3 = $member3['member_image_3'];
$memberrole3 = $member3['member_role_3'];
$memberdesc3 = $member3['member_desc_3'];

$member4 = get_field('team_member_4');
$membername4 = $member4['member_name_4'];
$memberimage4 = $member4['member_image_4'];
$memberrole4 = $member4['member_role_4'];
$memberdesc4 = $member4['member_desc_4'];
?>
<main>

        <div class="equipeConteneur">
            <div class="membreEquipe">
                <img loading="lazy" class="membreEquipe__img" id="membre1Btn"
                    src="<?php echo esc_url( $member1['member_image_1']['url'] ); ?>" alt="image robert_pilon">
                <h1 class="membreEquipe__nom"><?php echo $membername1 ?></h1>
                <p class="membreEquipe__poste"><?php echo $memberrole1 ?></p>
            </div>

            <div class="membreEquipe">
                <img loading="lazy" class="membreEquipe__img" id="membre2Btn"
                    src="<?php echo esc_url( $member2['member_image_2']['url'] ); ?>" alt="image elisabeth_pham">
                <h1 class="membreEquipe__nom"><?php echo $membername2 ?></h1>
                <p class="membreEquipe__poste"><?php echo $memberrole2 ?></p>
            </div>

            <div class="membreEquipe">
                <img loading="lazy" class="membreEquipe__img" id="membre3Btn"
                    src="<?php echo esc_url( $member3['member_image_3']['url'] ); ?>" alt="image patricia_viannay">
                <h1 class="membreEquipe__nom"><?php echo $membername3 ?></h1>
                <p class="membreEquipe__poste"><?php echo $memberrole3 ?></p>
            </div>

            <div class="membreEquipe">
                <img loading="lazy" class="membreEquipe__img" id="membre4Btn"
                    src="<?php echo esc_url( $member4['member_image_4']['url'] ); ?>" alt="image anik_leroux">
                <h1 class="membreEquipe__nom"><?php echo $membername4 ?></h1>
                <p class="membreEquipe__poste"><?php echo $memberrole4 ?></p>
            </div>
        </div>

        <div class="modalMembreEquipe" id="membre1">
            <button class="modalMembreEquipe__btnFermer" id="membre1BtnClose">X</button>
            <img loading="lazy" class="modalMembreEquipe__img" id="membre1Btn"
                src="<?php echo esc_url( $member1['member_image_1']['url'] ); ?>" alt="image robert_pilon">
            <h1 class="modalMembreEquipe__nom"><?php echo $membername1 ?></h1>
            <p class="modalMembreEquipe__poste"><?php echo $memberrole1 ?></p>
            <p>
			<?php echo $memberdesc1 ?>
            </p>
        </div>

        <div class="modalMembreEquipe" id="membre2">
            <button class="modalMembreEquipe__btnFermer" id="membre2BtnClose">X</button>
            <img loading="lazy" class="modalMembreEquipe__img" id="membre1Btn"
                src="<?php echo esc_url( $member2['member_image_2']['url'] ); ?>" alt="image elisabeth_pham">
            <h1 class="modalMembreEquipe__nom"><?php echo $membername2 ?></h1>
            <p class="modalMembreEquipe__poste"><?php echo $memberrole2 ?></p>
            <p>
			<?php echo $memberdesc2 ?>
            </p>
        </div>

        <div class="modalMembreEquipe" id="membre3">
            <button class="modalMembreEquipe__btnFermer" id="membre3BtnClose">X</button>
            <img loading="lazy" class="modalMembreEquipe__img" id="membre1Btn"
                src="<?php echo esc_url( $member3['member_image_3']['url'] ); ?>" alt="image patricia_viannay">
            <h1 class="modalMembreEquipe__nom"><?php echo $membername3 ?></h1>
            <p class="modalMembreEquipe__poste"><?php echo $memberrole3 ?></p>
            <p>
			<?php echo $memberdesc3 ?>
            </p>
        </div>

        <div class="modalMembreEquipe" id="membre4">
            <button class="modalMembreEquipe__btnFermer" id="membre4BtnClose">X</button>
            <img loading="lazy" class="modalMembreEquipe__img" id="membre1Btn"
                src="<?php echo esc_url( $member4['member_image_4']['url'] ); ?>" alt="image anik_leroux">
            <h1 class="modalMembreEquipe__nom"><?php echo $membername4 ?></h1>
            <p class="modalMembreEquipe__poste"><?php echo $memberrole4 ?></p>
            <p>
			<?php echo $memberdesc4 ?>
            </p>
        </div>
    </main>
<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

//get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>