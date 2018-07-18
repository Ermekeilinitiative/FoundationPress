<?php
/**
 * Author: Michael Zipser
 * URL: http://www.michaelzipser.com
 *
 * Newsletter-Registration Form
 *
 * Adds the Newsletter-Registration Form to every Site or Post that includes the Shortcode '[newsletter]'
 */

function newsletter_function(){
	return "
	<div class='row'>
		<div class='small-12 columns newsletter-registration'>
			<div class='row'>
				<h3>Newsletter-Anmeldung</h3>
				<p>
				Wenn du über alle aktuellen Ereignisse und Veranstaltungen der Ermekeilinitiative e.V. informiert bleiben möchtest, kannst du dich hier für den Newsletter-Regisitrieren.
				</p>
			</div>
			
			<div class='row collapse'>
				<div class='small-10 columns'>
					<input type='text' placeholder='E-Mail Adresse eingeben …'>
				</div>
				<div class='small-2 columns'>
					<input type='submit' value='Anmelden' class='postfix' />
				</div>
			</div>
			<div class='row'>
				<p class='small'>
				Ich möchte keine weiteren Neuigkeiten erhalten und mich vom <a href='#'>Newsletter abmelden</a>.
				</p>
			</div>
		</div>
	</div>
	";
}

add_shortcode('newsletter', 'newsletter_function' );

?>