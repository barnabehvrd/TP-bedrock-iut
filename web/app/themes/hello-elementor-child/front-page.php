<?php
get_header(); // Inclut l'en-tête du thème
?>

    <main id="primary" class="site-main">
        <section class="presentation">
            <p><?php echo get_bloginfo('description'); ?></p>
            <div class="competences">
                <h2>Mes Compétences</h2>
                <h3>Langages</h3>
                <ul>
                    <li>JavaScript</li>
                    <li>TypeScript</li>
                    <li>Java</li>
					<li>kotlin</li>
                    <li>Bash</li>
                    <li>PHP</li>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Python</li>
                    <li>C</li>
                </ul>
                <h3>SGBD & ORM</h3>
                <ul>
					<li>MySQL</li>
					<li>MariaDB</li>
					<li>SQLite</li>
					<li>SQLServer</li>
                    <li>MongoDB</li>
                    <li>Redis</li>
                    <li>Neo4j</li>
                    <li>Prisma</li>
                    <li>Doctrine</li>
                </ul>
                <h3>Outils & IDEs</h3>
                <ul>
					<li>IntelliJ IDEA</li>
					<li>Android Studio</li>
                    <li>VS Code</li>
					<li>Figma</li>
					<li>Insomnia</li>
					<li>Termius</li>
					<li>Trello</li>
                </ul>
                <h3>Frameworks</h3>
                <ul>
                    <li>FastAPI</li>
                    <li>Express</li>
                    <li>Bootstrap</li>
                    <li>Symfony</li>
                    <li>Ionic</li>
                </ul>
                <h3>Divers</h3>
                <ul>
					<li>Github</li>
                    <li>Github Copilot</li>
                    <li>Github Actions</li>
					<li>Docker</li>
					<li>Portainer</li>
					<li>Nginx</li>
					<li>Cloudflare</li>
					<li>Certbot</li>
					<li>Ubuntu</li>
            </div>
        </section>
    </main>

    <section class="best-projects">
        <h2>Mes Meilleures Réalisations</h2>
        <div class="projects-grid">
			<?php
			$args = array(
				'post_type' => 'portfolio',
				'posts_per_page' => 3,
				'meta_key' => 'meilleure_realisation',
				'meta_value' => true,
			);
			$query = new WP_Query($args);

			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post();
					?>
                    <article class="project-item">
                        <a href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail()) : ?>
                                <div class="project-thumbnail">
									<?php the_post_thumbnail('medium'); ?>
                                </div>
							<?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <p><strong>Client :</strong> <?php echo get_field('client'); ?></p>
                        <p><strong>Date :</strong> <?php echo get_field('date_de_realisation'); ?></p>
                    </article>
				<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo '<p>Aucune réalisation trouvée.</p>';
			endif;
			?>
        </div>
    </section>

<?php
get_footer(); // Inclut le pied de page du thème
?>