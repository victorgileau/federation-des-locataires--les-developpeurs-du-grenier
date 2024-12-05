<?php 
/**
 * Template Name: contactUsTheme
 * Template Post Type: contact_us
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post(); 
?>

<section class="contact">
        <div class="contact__container">
            <h2 class="contact__title"><?php the_field('contact_title')?></h2>
            <div class="contact__wrapper">
                <div class="contact__form">
                    <h3>Envoyez-nous un message</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="<?php the_field('contact_name')?>">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="<?php the_field('contact_email')?>">
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="<?php the_field('contact_message')?>"></textarea>
                        </div>
                        <button type="submit" class="contact__btn">Envoyer Message</button>
                    </form>
                </div>
                <div class="contact__info">
                    <h3>Information</h3>
                    <p><i class="fas fa-phone"></i><?php the_field('contact_number')?></p>
                    <p><i class="fas fa-envelope"></i><?php the_field('contact_emailf')?> </p>
                    <p><i class="fas fa-map-marker-alt"></i><?php the_field('contact_address')?> </p>
                    <p><?php the_field('contact_city-country')?></p>
                    <p><?php the_field('contact_address_code')?></p>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; // Fermeture de la boucle

get_template_part('partials/member'); 
get_template_part('partials/infoletter');

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>
