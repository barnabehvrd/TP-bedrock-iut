<?php
get_header(); // Inclut l'en-tête du thème
?>

	<main id="primary" class="site-main">
		<?php
		while (have_posts()) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>


                    <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <?php endif; ?>



				<div class="entry-content">
                    <p><strong>Description :</strong> <?php the_content(); ?></p>
					<p><strong>Client :</strong> <?php echo get_field('client'); ?></p>
					<p><strong>Date de réalisation :</strong> <?php echo get_field('date_de_realisation'); ?></p>
					<p><strong>Lien du projet :</strong> <a href="<?php echo get_field('lien_du_projet'); ?>">Voir le projet</a></p>
					<div class="gallery">
						<?php $images = get_field('galerie_images'); ?>
						<?php if ($images) : ?>
							<?php foreach ($images as $image) : ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</article>
		<?php
		endwhile; // Fin de la boucle
		?>
	</main>

<?php
get_sidebar(); // Inclut la sidebar si nécessaire
get_footer(); // Inclut le pied de page du thème
?>