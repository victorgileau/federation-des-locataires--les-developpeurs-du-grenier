<!--Début Services (Kenza)-->
<section class="services">
        <div class="services__background"></div>
    <?php 
    $argstitle = array(
        'post_type' => 'service',
        'posts_per_page'=> 1,
        );
    $the_titleService = new WP_Query( $argstitle );
    while ($the_titleService->have_posts()): $the_titleService-> the_post();
    ?>
        
        <h2><?php the_field('titlepartial'); ?></h2>
        <?php endwhile; ?>
        <div class="services__cards">
    
<?php
$next_args = array(
    'post_type' => 'service',
    'posts_per_page'=> 4,
    );

$the_query = new WP_Query( $next_args );

    while ($the_query->have_posts()): $the_query-> the_post();
    ?>
    <div class="service">
        <div class="service__titre">
            <?php the_title(); ?>
        </div>
        <div class="service__icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                <path
                    d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
            </svg></div>
        <div class="service__line">
            <hr>
        </div>
        <div class="service__info">
            <?php the_field('service_shortdesc'); ?>
            <!--Un Comité consultatif de résidant-e-s est une instance qui permet aux locataires de HLM de
            participer à la gestion de leur immeuble.-->
        </div>
        
        <button class="service__btn btnL">
            <a href="<?php the_permalink(); ?>">
                <?php the_field('service_btncontent'); ?><!--S'informer--> <svg class="btn__fleche" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                </svg>
            </a>
        </button>
    </div>
    <?php
endwhile;
wp_reset_postdata();

?>

    </div>

</section>
<!--Fin Services(Kenza)-->
