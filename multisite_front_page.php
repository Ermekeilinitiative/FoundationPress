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
		<p class="text-center">
		<a href="#" class="button white-ghost">Mehr erfahren</a>
		</p>
	</div>
</div>

<?php ### Introduction: based on a (separate) page 'initiative' ?>
<div class="row section">
	<div class="small-12 columns text-center">
<?php
    $page = get_page_by_path('initiative');

    if( $page ) {
?>
        <h2 class="dark-green"><?php echo get_the_title($page); ?></h2>
<?php
        // See https://developer.wordpress.org/reference/functions/the_content/
        setup_postdata( $page );
        the_content('');
        wp_reset_postdata();
    }
?>
		<p style="margin-top: 2rem;">
		<a href="initiative#ziele" class="button green-ghost">Unsere Ziele</a>
		<a href="#" class="button blue" style="margin-left: 2rem;">Mitglied werden</a>
		</p>
	</div>
</div>

<?php ### Themen und Arbeitsgruppen: based on network blogs (and pages?) ?>
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

        <?php # TODO: how to handle Themengruppen und Repair Café ?>
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

<?php ### Veranstaltungen: based on Events Manager Plugin http://wp-events-plugin.com/ ?>
<div class="row section" id="termine">
	<div class="small-up-1 medium-up-2 large-up-3" style="max-width: 990px; margin: 0 auto;">
		<h2 class="blue">
<?php
    echo get_the_title(get_page_by_path('veranstaltungen'));
?>
		</h2>
<?php
$args = array(
    'category' => '-7',  # Exclude category garden. TODO: this should only exlcude Gartenöffnungszeiten and be customizable!
    'limit' => 10,
    'format' =>
        '<div class="column vevent">
			<a href="#_EVENTURL" class="url">
				<div class="schedule-card">
					<div class="calendar-sheet">
						<time class="dtstart" datetime="#@Y-#@m-#@d">
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
	</div>
	<div class="columns end">
		<p class="text-center">
		    <a href="veranstaltungen/" class="button blue-ghost">Alle Termine anzeigen</a>
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
