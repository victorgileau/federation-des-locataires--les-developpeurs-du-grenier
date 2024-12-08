<?php
	/*-----------------------------------------------------------------------------------*/
	/* Affiche l'entête (Header) sur toutes vos pages
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('name'); // Affiche le nom du blog ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // si nous sommes sur la page d'accueil, affichez la description à partir des paramètres du site - sinon, affichez le titre du post ou de la page. ?>
</title>
<?php 
	// Tous les .css et .js sont chargés dans le fichier functions.php
?>

<?php wp_head(); 
/* Cette fonction permet à WordPress et aux extensions d'instancier des fichier CSS et js dans le <head>
	 Supprimer cette fonction briserait vos extensions et diverses fonctionnalités WordPress. 
	 Vous pouvez la déplacer si désiré, mais garder là. */
?>
</head>

<body 
	<?php body_class(); 
	/* Applique une classe contextuel sur le body
		 ex: sur la page d'accueil vous aurez la classe "home"
		 sur un article, "single postid-{ID}"
		 etc. */
	?>
>

<header>

	<nav>
		<?php 
			// Affiche un menu si dans le tableau de bord un menu a été défini dans cet emplacement 
			//wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); /*( <-- pas besoin de ce code ci) */

			/*
			$menuArray = wp_get_nav_menu_items('menu 1', array(
				'post_type' => 'nav_menu_item',
			));*/

			//echo var_dump($menuArray[0]);

			//créé des array pour sauvegarder le contenu du menu
			$menuItemsTitleArr = array();
			$menuItemsUrlArr = array();
			$menuItemsArr = array();

			//va cherche l'information dans le "menu 1" dans wordPress (Apparence/Menus/Structure du menu)
			if ( $menu_items = wp_get_nav_menu_items( 'menu 1' ) ) { // Loop over menu items
				foreach ( $menu_items as $menu_item) { // Compare menu object with current page menu object

					$current = ( $menu_item->object_id == get_queried_object_id() ) ? 'current' : '';// Print menu item


					$menuItemsTitleArr[] = $menu_item->title;
					$menuItemsUrlArr[] = $menu_item->url;
					$menuItemsArr[] = $menu_item;
				}
			}

			//Permet de selectionner items specifique


			if ( function_exists ( 'wpm_language_switcher' ) ) 

        //permet de créé selection de langue 
			  //wpm_language_switcher("list", "name");

		?>

<?php $message = new WP_Query('post_type=messageetudiant');
while ( $message->have_posts() ) : $message->the_post(); ?>



<div class="msgEtudantBG">
      <div class="messageProjetEtudant">
        <p class="messageProjetEtudant__msg"><?php the_field('message'); ?></p>
        <button class="messageProjetEtudant__btn">
          <a target="_blank" href="https://www.flhlmq.com/fr">
		  <?php the_field('textbutton'); ?>
            <svg viewBox="0 0 72 46" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M3 20C1.34315 20 0 21.3431 0 23C0 24.6569 1.34315 26 3 26L3 20ZM71.1213 25.1213C72.2929 23.9497 72.2929 22.0503 71.1213 20.8787L52.0294 1.7868C50.8579 0.615224 48.9584 0.615224 47.7868 1.7868C46.6152 2.95837 46.6152 4.85786 47.7868 6.02944L64.7574 23L47.7868 39.9706C46.6152 41.1421 46.6152 43.0416 47.7868 44.2132C48.9584 45.3848 50.8579 45.3848 52.0294 44.2132L71.1213 25.1213ZM3 26L69 26V20L3 20L3 26Z"
                fill="white" />
            </svg>
          </a>
        </button>

        <div class="messageProjetEtudant__closeBtn">
          <svg viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 3L30 30M30.8787 3.12131L3.87866 30.1213" stroke="white" stroke-width="6"
              stroke-linecap="round" />
          </svg>
        </div>
      </div>
    </div>
	<?php endwhile;?>
    
    <div class="navbar">
      <div class="menu-toggle">
        <img src="./medias/img/burger_placeholder.png" alt="" class="burgerIcon">
      </div>
      <a href="#" class="logo" id="logoBurger"><img src="./medias/img/LOGO_raccourcis.svg" alt=""></a>
      <div class="nav-menu">
        <div class="nav-content">
          <ul>
            <li><a href="<?php echo $menuItemsUrlArr[0]?>" class="btn"><?php echo $menuItemsTitleArr[0]?></a></li>
            <li><a href="<?php echo $menuItemsUrlArr[1]?>" class="btn"><?php echo $menuItemsTitleArr[1]?></a></li>
            <li><a href="<?php echo $menuItemsUrlArr[2]?>" class="btn"><?php echo $menuItemsTitleArr[2]?></a></li>
            <li><a href="<?php echo $menuItemsUrlArr[3]?>" class="btn"><?php echo $menuItemsTitleArr[3]?></a></li>
          </ul>
          <a href="<?php bloginfo('url'); ?>" class="logo" id="logoNormal"><img src="<?php bloginfo('template_url'); ?>/assets/LOGO_raccourcis.svg" alt=""></a>
          <ul>
            <li><a href="<?php echo $menuItemsUrlArr[4]?>" class="btn"><?php echo $menuItemsTitleArr[4]?></a></li>
            <li><a href="#" class="btn">FAQ</a></li>
            <li><a href="#"><button class="btnBleu">Devenir membre</button></a></li>
            <li><a href="#"><button class="btnB">Se connecter</button></a></li>
            <li><a href="<?php echo $menuItemsUrlArr[5]?>" class="btn">FR</a></li>
          </ul>
        </div>
        <div class="boxBurger">
          <div class="burgerBtn not-active">
            <span class="spanBurger"></span>
            <span class="spanBurger"></span>
            <span class="spanBurger"></span>
          </div>
        </div>
        <!--<img src="./medias/img/burger_placeholder.png" alt="burger" class="burgerBtn">-->
      </div>
    </div>
	</nav>

	<?php 
		// Affiche la description de site se trouvant dans "General Settings" dans l'admin WordPress
		bloginfo( 'description' ); 
	?>
</header>

<main><!-- Débute le contenu principal de notre site -->
