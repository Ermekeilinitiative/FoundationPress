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

<div class="row expanded front-page-teaser">
	<div class="welcome-text">
        <h1><?php echo get_bloginfo(); ?></h1>
        <p class="entry-text"><?php echo get_option('blog_long_description'); ?></p>
<!--
		<h1>Ermekeilinitiative <span style="text-transform:none;">e. V.</span></h1>
		<p class="entry-text">Das Quartier mit dem integrativem Nutzungskonzept – entwickelt von und für BürgerInnen.</p>
-->
		<p class="text-center">
		<a href="#" class="button white-ghost">Mehr erfahren</a>
		</p>
	</div>
</div>

<div class="row section">
	<div class="small-12 columns text-center">
        <?php
        // See https://developer.wordpress.org/reference/functions/the_content/
        $args = array(
            'name'           => 'initiative',
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'posts_per_page' => 1
        );

        $posts = get_posts( $args );
        
        if( $posts ) {
            $post = $posts[0];
            setup_postdata( $post );
        ?> 
            <h2 class="dark-green"><?php the_title(); ?></h2>
            <?php the_content(''); ?>
        <?php
        }
        wp_reset_postdata();
        ?>
<!--
		<h2 class="dark-green">Die Ermekeilinitiative e. V.</h2>
		<p>
		Das Ermekeil-Karree: Inmitten der Bonner Südstadt, umgeben von Wohnhäusern, Geschäften, Cafés und Gaststätten. Die historischen Gebäude befinden sich mit weiteren neueren Bauten auf einem weitläufigen Gelände. Dieses wird begrenzt von den Straßen Bonner Talweg, Reuterstraße, Argelanderstraße und Ermekeilstraße und umfasst eine Gesamtfläche von insgesamt 25.000 qm - das entspricht der Fläche von drei bis vier Fußballfeldern.
		</p>
		<p>
		Unser Verein zur zivilen Nutzung der Ermekeilkaserne: „Ermekeilinitiative e. V.“, setzt sich seit 2005 aktiv für eine neue Gestaltung des Geländes als sozial, kulturell und nach Generationen gemischtes Quartier mit vielfältigen und ökologisch nachhaltigen Nutzungen ein. Hierfür hat die Initiative ein integratives Nutzungskonzept entwickelt und lädt alle BürgerInnen und AnwohnerInnen ein sich an der Schaffung eines solchen Ortes der Vielfalt zu beteiligen.
		</p>
-->
		<p style="margin-top: 2rem;">
		<a href="initiative#ziele" class="button green-ghost">Unsere Ziele</a>
		<a href="#" class="button blue" style="margin-left: 2rem;">Mitglied werden</a>
		</p>
	</div>
</div>

<div class="row expanded section working-groups" id="arbeitsgruppen">
	<div class="small-up-1 medium-up-2 large-up-3" style="max-width: 990px; margin: 0 auto;">
		<h2 class="brown">Themen- und Arbeitsgruppen der Initiative</h2>

        <?php
#       Please note that restore_current_blog() is only able to restore the blog that was active
#       before the current one. Therefore, we need to keep the current blog id, i.e. the id of
#       the network's main blog.
        $network_id = get_current_blog_id();
        $sites = wp_get_sites();

        foreach($sites as $site) {
            $site = (object)$site;
            
            if($site->blog_id == $network_id) continue;
            switch_to_blog($site->blog_id);
        ?>
        <div class="column">
			<div class="card">
				<div class="image-content">
					<a href="<?php echo get_bloginfo('url') ?>" title="<?php echo get_bloginfo(); ?>">
                    <?php echo wp_get_attachment_image(get_option('blog_cover_image'), [600, 400]);  ?>
					</a>
				</div>
				<div class="text-content">
					<h3><?php echo get_bloginfo(); ?></h3>
					<h4><?php echo get_bloginfo('description'); ?></h4>
					<p><?php echo get_option('blog_long_description'); ?></p>
					<p><a href="<?php echo get_bloginfo('url') ?>" title="<?php echo get_bloginfo(); ?>">Mehr erfahren ›</a>
					</p>
				</div>
			</div>
		</div>
        <?php
        }
#       Return to network's main blog.
        switch_to_blog($network_id);
        ?>
        <!-- TODO: how to handle Themengruppen und Repair Café -->
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
<!--
        <div>
			<p class="text-center">
			<a href="#" class="button brown-ghost">Arbeitsgruppen anzeigen</a>
			</p>
		</div>
-->
	</div>
</div>
<div class="row section" id="termine">
	<div class="small-up-1 medium-up-2 large-up-3" style="max-width: 990px; margin: 0 auto;">
		<h2 class="blue">Die nächsten Termine und Veranstaltungen</h2>

<?php
#echo EM_Locations::output(array());
#print_r(EM_Events::get_default_search($args));

$args = array(
    'category' => '-7',  # Exclude category garden. TODO: this should only exlcude Gartenöffnungszeiten and be customizable!
    'limit' => 10,
    'format' =>
        '<div class="column vevent">
			<a href="#_EVENTURL" class="url">
				<div class="schedule-card">
					<div class="calendar-sheet">
						<time class="dtstart" datetime="#@c">										<!-- INSERT DATE HERE -->
                            <span class="month">#@M.</span>
							<span class="day">#@d</span>
						</time>
					</div>
					<div class="schedule-text">
						<span class="schedule-location location">#_LOCATIONNAME</span>
						<span class="schedule-title summary">#_EVENTNAME</span>
					</div>
				</div>
			</a>
		</div>'
    );

echo EM_Events::output($args);
?>
<?php
/*		<div class="column vevent">
			<a href="#" class="url">																		<!-- INSERT SCHEDULE-URL HERE -->
				<div class="schedule-card">
					<div class="calendar-sheet">
						<time class="dtstart" datetime="YYYY-MM-DD">										<!-- INSERT DATE HERE -->
							<span class="month">Jan.</span>													<!-- INSERT SHORT MONTH (GERMAN) HERE -->
							<span class="day">04</span>														<!-- INSERT SHORT DAY (GERMAN) HERE -->
						</time>	
					</div>
					<div class="schedule-text">
						<span class="schedule-location location">Haus 2 – Raum 107</span>						<!-- INSERT LOCATION HERE -->
						<span class="schedule-title summary">Treffen der AG Quartier und Kultur</span>		<!-- INSERT SCHEDULE-TITLE HERE -->
					</div>
				</div>
			</a>
		</div>
*/     
?>
	</div>
	<div class="columns end">
		<p class="text-center">
		    <a href="#" class="button blue-ghost">Alle Termine anzeigen</a>
		</p>
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
