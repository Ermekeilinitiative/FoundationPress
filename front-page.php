<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row expanded sub-page-teaser valign-middle">
	<div class="working-group columns">
		<h1><?php echo get_bloginfo( 'name' ); ?></h1>
		<ul class="sub-navi">
            <li><a href="">Flüchtlingsarbeit</a></li>
            <li><a href="">Repair Café Bonn</a></li>
            <li><a href="">Ermekeilgarten</a></li>
            <li><a href="">Kulturveranstaltungen</a></li>
        </ul>
	</div>
</div>

<div id="page" role="main">
	<article class="main-content">
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php } ?>

	</article>
	<?php get_sidebar(); ?>

</div>

<div class="row expanded section working-groups" id="arbeitsgruppen">
	<div class="small-up-1 medium-up-2 large-up-3" style="max-width: 990px; margin: 0 auto;">
		<h2 class="dark-green">Themengruppen der <?php echo get_bloginfo( 'name' ); ?></h2>
		<div class="column">
			<div class="card">
				<div class="image-content">
					<a href="#" title="">
					<img src="http://placehold.it/600x400" alt="" />
					</a>
				</div>
				<div class="text-content">
					<h3>AG Zwischennutzung</h3>
					<h4>Von der Kaserne zum Karree</h4>
					<p>
					Themen: Flüchtlingshilfe, Urban Gardening, Konzerte, Kunstausstellungen, Repair Café usw.
					</p>
					<p>
					<a href="#" title="AG Zwischennutzung">Mehr erfahren ›</a>
					</p>
				</div>
			</div>
		</div>

		<div class="column">
			<div class="card">
				<div class="image-content">
					<a href="#" title="">
					<img src="http://placehold.it/600x400" alt="" />
					</a>
				</div>
				<div class="text-content">
					<h3>AG Wohnen</h3>
					<h4>Von der Kaserne zum Karree</h4>
					<p>
					Themen: Gemeinschaftliche Wohnprojekte, gefördeter Wohnungsbau, Städtebau, Barrierefreies Bauen usw.
					</p>
					<p>
					<a href="#" title="AG Wohnen">Mehr erfahren ›</a>
					</p>
				</div>
			</div>
		</div>

		<div class="column">
			<div class="card">
				<div class="image-content">
					<a href="#" title="">
					<img src="http://placehold.it/600x400" alt="" />
					</a>
				</div>
				<div class="text-content">
					<h3>AG „Q“ – Quartier &amp; Kultur</h3>
					<h4>Von der Kaserne zum Karree</h4>
					<p>
					Themen: Bau-Workshops, Ideenfindung und -umsetzung, Quartiersentwicklung usw.
					</p>
					<p>
					<a href="#" title="AG Quartier & Kultur">Mehr erfahren ›</a>
					</p>
				</div>
			</div>
		</div>

		<div class="column">
			<div class="card">
				<div class="image-content">
					<a href="#" title="">
					<img src="http://placehold.it/600x400" alt="" />
					</a>
				</div>
				<div class="text-content">
					<h3>AG Öffentlichkeitsarbeit</h3>
					<h4>Unser Sprachrohr</h4>
					<p>
					Themen: Betreuung der Website, Gestaltung von Druckmaterial, Beschilderung, Pressearbeit usw.
					</p>
					<p>
					<a href="#" title="AG Öffentlichkeitsarbeit">Mehr erfahren ›</a>
					</p>
				</div>
			</div>
		</div>

		<div class="column">
			<div class="card">
				<div class="image-content">
					<a href="#" title="">
					<img src="http://placehold.it/600x400" alt="" />
					</a>
				</div>
				<div class="text-content">
					<h3>TG Flüchtlingsarbeit</h3>
					<h4>Für unsere neuen Nachbarn</h4>
					<p>
					Themen: Kleiderkammer, Deutschunterricht, Kontakt Café, Kinderbetreuung usw.
					</p>
					<p>
					<a href="#" title="TG Flüchtlingsarbeit">Mehr erfahren ›</a>
					</p>
				</div>
			</div>
		</div>

		<div class="column">
			<div class="card">
				<div class="image-content">
					<a href="#" title="">
					<img src="http://placehold.it/600x400" alt="" />
					</a>
				</div>
				<div class="text-content">
					<h3>Das Repair Café Bonn</h3>
					<h4>BürgerInnen helfen BürgerInnen</h4>
					<p>
					Die ehrenamtlichen Helfer reparieren zusammen mit Ihnen kaputte Gegenstände, die Sie mitbringen.
					</p>
					<p>
					<a href="#" title="Repair Café Bonn">Mehr erfahren ›</a>
					</p>
				</div>
			</div>
		</div>
		<div>
			<p class="text-center">
			<a href="#" class="button brown-ghost">Arbeitsgruppen anzeigen</a>
			</p>
		</div>
	</div>
</div>

<div class="row section">
	<div class="small-12 columns">
		<h2 class="blue">Die nächsten Termine und Veranstaltungen</h2>
		<p>
		Kalender-Modul
		</p>
		<div>
			<p class="text-center">
			<a href="#" class="button blue-ghost">Alle Termine anzeigen</a>
			</p>
		</div>
	</div>
</div>

<!--
<div id="page" role="main">
	<article class="main-content">
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>
	</article>

</div>
-->

<?php get_footer(); ?>
