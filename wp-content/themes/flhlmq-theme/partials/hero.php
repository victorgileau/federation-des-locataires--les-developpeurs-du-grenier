<?php
/**
 * Template Name: hero
 * Template Post Type: errorpage, hero
 */

$titleHero;
$titleHeroId;

if ( $args['id'] && $args['title']) {
    $titleHero = $args['title'];
    echo '<br>| hero test ' . $args['title'];
    echo '<br>| hero test ' . $args['id'];
    $titleHeroId = $args['id'];
}

if ( have_posts() ) : 
    //va chercher les posts 'groupe'
    $arguments = array(
        'post_type' => 'hero',
        'posts_per_page' => 1,
    );
    $errorPageAll = new WP_Query($arguments); // 👈 Utilisation
    //va a travers tout les posts 'groupe'
    while ($errorPageAll->have_posts()) : $errorPageAll->the_post();
    
    $image = get_field('hero_image');
?>

<section class="hero">
        <div class="hero equipe">
            <h1 class="hero__titre titre"><?php the_field('hero_title'); ?></h1>
            <div class="hero__bgHero bgHero">
                <img class="hero__img" src="<?php echo esc_url($image['url']); ?>" alt="hero image">
            </div>
            <p class="hero__page page"><a href="<?php bloginfo('url'); ?>">Accueil</a> > <?php the_field('hero_title'); ?></p>
        </div>
</section>

<?php
	endwhile;
	wp_reset_postdata();
    endif;
?>