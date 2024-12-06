<?php
$next_args = array(
    'post_type' => 'service',
    'posts_per_page'=> 3,
    );

$the_query = new WP_Query( $next_args );
if ($the_query->have_posts()) {

    while ($the_query->have_posts()){
        
     $the_query-> the_post();

    ?>
        <!--CCR-->
        <a href="<?php the_permalink(); ?>" class="participation" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
            <div class="participation__titre">
            <?php the_title(); ?>
            </div>
            <div class="participation__icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                <path
                d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
            </svg></div>
            <div class="participation__line">
            <hr>
            </div>
            <div class="participation__info">
            <?php the_field('service_shortdesc'); ?>
            </div>
            <button class="participation__btn">
            <?php the_field('service_btncontent'); ?> <svg class="btn__fleche" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
            </svg>
            </button>
            <div class="participation__bg--color"> </div>
        </a>
    <?php 
    }
}
wp_reset_postdata();
?>

<!--associations
			<a href="" class="participation">
				<div class="participation__titre">
				Associations
				</div>
				<div class="participation__icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
					class="bi bi-people-fill" viewBox="0 0 16 16">
					<path
					d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
				</svg></div>
				<div class="participation__line">
				<hr>
				</div>
				<div class="participation__info">
				Une association de locataires, c'est le regroupement des locataires d'un ou de plusieurs HLM. Cette
				association
				est mise sur pied par les locataires et pour les locataires.
				</div>
				<button class="participation__btn">
				S'informer <svg class="btn__fleche" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
					class="bi bi-arrow-right" viewBox="0 0 16 16">
					<path fill-rule="evenodd"
					d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
				</svg>
				</button>
				<div class="participation__bg--color"> </div>
			</a>-->

			<!--CA de l'OMH
			<a href="" class="participation">
				<div class="participation__titre">
				CA de l'OMH
				</div>
				<div class="participation__icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
					class="bi bi-megaphone-fill" viewBox="0 0 16 16">
					<path
					d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25 25 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009l.496.008a64 64 0 0 1 1.51.048m1.39 1.081q.428.032.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a66 66 0 0 1 1.692.064q.491.026.966.06" />
				</svg></div>
				<div class="participation__line">
				<hr>
				</div>
				<div class="participation__info">
				La Loi sur la SHQ prévoit que le conseil d'administration (CA) d'un office d'habitation est composé d'un
				nombre
				fixe d'administrateurs pouvant être de cinq à quinze personnes.
				</div>
				<button class="participation__btn">
				S'informer <svg class="btn__fleche" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
					class="bi bi-arrow-right" viewBox="0 0 16 16">
					<path fill-rule="evenodd"
					d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
				</svg>
				</button>
				<div class="participation__bg--color"> </div>
			</a>
			</div>-->