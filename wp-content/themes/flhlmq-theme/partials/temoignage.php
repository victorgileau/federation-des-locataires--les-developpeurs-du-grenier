<?php
 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	$temoin = new WP_Query('post_type=temoignage');
    $classTab = ["un", "deux", "troix"];
    $i = 0;
    while ($temoin->have_posts()) : $temoin->the_post();
    ?>
      <div class="temoignage <?php echo 'temoignage--', $classTab[$i] ?>">
        <div class="temoignage__titre">
          <?php the_title(); ?>
          <p><?php the_field("job"); ?></p>
        </div>
        <div class="tem">
          <div class="tem__img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
          <div class="tem__info">
          <?php the_content(); ?>
          </div>
        </div>
      </div>

      <?php 
      $i++;
    endwhile;
  wp_reset_postdata();
    ?>

  