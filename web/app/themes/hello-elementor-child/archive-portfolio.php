<?php
get_header(); // Inclut l'en-tête du thème
?>

	<main id="primary" class="site-main">
		<header class="page-header">
			<h1 class="page-title">Mes Réalisations :</h1>
		</header>

		<div class="portfolio-grid">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
						<a href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail()) : ?>
								<div class="portfolio-thumbnail">
									<?php the_post_thumbnail('medium'); ?>
								</div>
							<?php endif; ?>
							<h2 class="portfolio-title"><?php the_title(); ?></h2>
						</a>
						<p><strong>Client :</strong> <?php echo get_field('client'); ?></p>
						<p><strong>Date :</strong> <?php echo get_field('date_de_realisation'); ?></p>
					</article>
				<?php
				endwhile;
			else :
				echo '<p>Aucune réalisation trouvée.</p>';
			endif;
			?>
		</div>

		<?php
		// Pagination
		the_posts_pagination(array(
			'prev_text' => __('Précédent'),
			'next_text' => __('Suivant'),
		));
		?>
	</main>

<?php
get_sidebar(); // Inclut la sidebar si nécessaire
get_footer(); // Inclut le pied de page du thème
?>