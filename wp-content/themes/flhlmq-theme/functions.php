<?php
	/*-----------------------------------------------------------------------------------*/
	/* Ce fichier est présent sur chaque page
	/* Vous pouvez y ajouter des fonctions au besoin
	/*-----------------------------------------------------------------------------------*/

/* --------------------------------
Ajoute les vignettes dans les posts de type Article */
add_theme_support( 'post-thumbnails' );


/* --------------------------------
Déclare le menu principal */
register_nav_menus( 
	array(
		/* 
			1. 'main-menu' = Nom dans le code
			2. 'Menu principal' = Nom dans l'admin
			3. 'Menu principal du site' = Description dans l'admin */
		'main-menu' => __( 'Menu principal', 'Menu principal du site' ),
		'footer-menu' => __( 'Footer', 'Footer du site' )
		/* Dupliquer cette ligne si vous désirez déclarer d'autres menus */
	)
);


/* --------------------------------
Function déclarant la barre latérale principale */
function add_sidebars() {
	register_sidebar(array(	
		/* 
			1. 'main-sidebar' = Nom dans le code
			2. 'Barre laterale principale' = Nom dans l'admin
			3. 'Barre latérale principale du site' = Description dans l'admin */
		'main-sidebar' => __( 'Barre laterale principale', 'Barre latérale principale du site' ), 
		/* Dupliquer cette ligne si vous désirez déclarer d'autres sidebars */
	));
} 
/* Appel la fonction déclarant la barre latérale au moment de l'init des widgets */
add_action('widgets_init', 'add_sidebars');


/* -------------------------------- 
Function ajoutant les styles et scripts */
function add_style_and_js()  { 
	/* Ajoute le fichier style.css du theme WordPress actif 
	  1. 'default' = ID de référence à donner au à la feuille de style
		2. get_template_directory_uri() . '/style.css' = Chemin où ce trouve le fichier CSS en question
	*/
	wp_enqueue_style('swipper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css?v='.time());
	wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css?v='.time());
	wp_enqueue_style('fontsearch', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0?v='.time());
	
	wp_enqueue_style('default', get_template_directory_uri() . '/style.css?v='.time());

	/* Pour ajoutez une feuille de style supplémentaire, copier la ligne précédente et ajuster le chemin du fichier de façon relative vers votre nouveau fichier CSS */

	/* Ajoute le fichier main.js du theme WordPress actif 
	   1. 'default' = ID de référence à donner au script
		 2. get_template_directory_uri() . '/main.js' = Chemin où ce trouve le fichier JS en question
		 3. array() = Liste des dépendances de ce script (généralement vide)
		 4. false = Si un no de version doit être ajouté (généralement à false)
		 5. true = Est-ce que le script doit-être ajouté à la fin du body. Si mis à false le script est ajouter dans le head à la place
	*/
	wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), false, true);
	wp_enqueue_script('scrollTrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array(), false, true);
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), false, true);
	wp_enqueue_script('default', get_template_directory_uri() . '/main.js', array(), false, true);

	/* Pour ajoutez un script, copier la ligne précédente et ajuster le chemin de façon relative vers votre nouveau fichier JS */
}



/* Appel de la fonction ajoutant les styles et scripts */
add_action('wp_enqueue_scripts', 'add_style_and_js');


//ajout code externe
add_filter('user_has_cap', function(array $allcaps, array $caps, array $args, WP_User $user) {
    // Bail out if the capability check is not for reading a post.
    if ($args[0] !== 'read_post') {
        return $allcaps;
    }
    $post_id = $args[2];
    // If the post is a media item, make sure the user has the capability to read it.
    if (get_post_type($post_id) === 'attachment') {
        $allcaps['read_post'] = true;
    }

    return $allcaps;
}, 10, 4);