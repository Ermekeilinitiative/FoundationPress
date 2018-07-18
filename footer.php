<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>

		<div class="row expanded donation-request">
				<div class="row small-12 columns" style="max-width: 990px; margin: 0 auto;">
					<span>
						Unterstützen Sie unsere Arbeit mit einer Spende.
					</span>
                    <div class="clearfix show-for-medium-only"></div>
					<a href="#" title="Jetzt Spenden" class="button white-ghost">Jetzt Spenden</a>
				</div>
		</div>

		<div id="footer-container">

			<footer id="footer">
				<?php do_action( 'foundationpress_before_footer' ); ?>

				<div class="small-up-1 medium-up-2 large-up-4">
					<div class="column">
						<div class="logo-wrapper">
							<a href="http://www.ermekeilkarree.de/"><img src="/wp-content/themes/FoundationPress/assets/images/Ermekeilinitiative-Logo-2x.png" alt="Ermekeilinitiative e. V." class="logo" /></a>
						</div>
						<p>
						<strong>Ermekeilinitiative e. V.</strong><br />
						Initiative zur zivilen Nutzung<br />
						der Bonner Ermekeilkaserne
						<p>
						Ermekeilstraße 27<br />
						53115 Bonn
						</p>
						<p>
						Tel.: 0228 / 69 22 55<br />
						Fax: 0228 / 69 29 06<br />
						</p>
						<p>
						E-Mail: info@ermekeilkarree.de
						</p>
					</div>
					<div class="column">
						<ul>
							<li><a href="#"><strong>Initiative</strong></a></li>
							<li><a href="#">Unser Vorstand</a></li>
							<li><a href="#">Unsere Satzung</a></li>
							<li><a href="#">Mitglied werden</a></li>
						</ul>

						<br />

						<ul>
							<li><a href="#"><strong>Arbeitsgruppen</strong></a></li>
							<li><a href="#"><abbr title="Arbeitsgruppe">AG</abbr> Zwischennutzung</a></li>
							<li><a href="#"><abbr title="Arbeitsgruppe">AG</abbr> Wohnen</a></li>
							<li><a href="#"><abbr title="Arbeitsgruppe">AG</abbr> Quartier und Kultur</a></li>
							<li><a href="#"><abbr title="Arbeitsgruppe">AG</abbr> Öffentlichkeitsarbeit</a></li>
						</ul>

					</div>
					<div class="column">
						<ul>
							<li><a href="#"><strong>Kasernengelände</strong></a></li>
							<li><a href="#">Historie  der Ermekeilkaserne</a></li>
							<li><a href="#">Die Ermekeilstraße</a></li>
							<li><a href="#">Gebäude der Ermekeilkaserne</a></li>
							<li><a href="#">Gründung der Bundeswehr</a></li>
							<li><a href="#">Fotos, Videos und Impressionen</a></li>
						</ul>

						<br />

						<ul>
							<li><strong>Sonstiges</strong></li>
							<li><a href="#">Unser Netzwerk</a></li>
							<li><a href="#">Interner Bereich</a></li>
						</ul>
					</div>
					<div class="column">
						<ul>
							<li><strong>Rechtliches</strong></li>
							<li><a href="#">Kontakt</a></li>
							<li><a href="#">Impressum &amp; Datenschutz</a></li>
							<li><a href="#">Haftungsausschluss</a></li>
							<li><a href="#">Sitemap</a></li>
						</ul>

						<br />
						<br />
						<br />
						<br />

						<ul>
							<li><a href="https://www.facebook.com/Ermekeilkaserne" title="Ermekeilinitiative e. V. bei Facebook"><img src="http://46.101.191.124/wp-content/themes/FoundationPress/assets/images/FB-f-Logo__blue_512.png" alt="Ermekeilinitiative e. V. bei Facebook" width="32" height="32" />&nbsp;&nbsp; /Ermekeilkaserne</a></li>
						</ul>

					</div>
				</div>

				<?php dynamic_sidebar( 'footer-widgets' ); ?>
				<?php do_action( 'foundationpress_after_footer' ); ?>
			</footer>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>

    <script>
        // Smooth scroller for local page links.
			jQuery(function() {
				jQuery('a[href*=#]:not([href=#])').click(function() {
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = jQuery(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							jQuery('html,body').animate({
								scrollTop: target.offset ().top -0
							}, 600);
							return false;
						}
					}
				});
			});
    </script>

</body>
</html>
