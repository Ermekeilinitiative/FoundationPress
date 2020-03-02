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
	<h1><?php echo get_global_title(); ?></h1>
        <?php /* TODO: change following element to p.h1 with newer Foundation */ ?>
        <h2 class="entry-text"><?php echo get_option('blog_long_description'); ?></h2>
        <p class="text-center">
        <a href="#" class="button white-ghost">Mehr erfahren</a>
        </p>
    </div>
</div>

<?php ### Alert: display the latest published alert based on a custom post type
    $args = array(
        'post_type' => 'alert',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'post_per_page' => '1'
    );
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
        $query->the_post();
?>

<div class="row expanded front-page-alert">
    <div class="small-12 columns text-center">
        <?php the_content(); ?>
    </div>
</div>

<?php
        /* Restore original Post Data */
        wp_reset_postdata();
    }
?>


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
        <a href="#" class="button blue">Mitglied werden</a>
        </p>
    </div>
</div>

<?php ### Themen und Arbeitsgruppen: based on network blogs (and pages?) ?>
<div class="row expanded section working-groups" id="arbeitsgruppen">
    <h2 class="brown">Themen- und Arbeitsgruppen der Initiative</h2>

    <div class="small-up-1 medium-up-2 large-up-3" style="max-width: 990px; margin: 0 auto; display: flex; flex-wrap: wrap;">

        <?php
#       Please note that restore_current_blog() is only able to restore the blog that was active
#       before the current one. Therefore, we need to keep the current blog id, i.e. the id of
#       the network's main blog.
        $network_id = get_current_blog_id();
        $sites = get_sites();

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
                            </div>
                <p>
                    <a href="<?php echo get_bloginfo('url') ?>" title="<?php echo get_bloginfo(); ?>">Mehr erfahren ›</a>
                        </p>
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
                            </div>
                <p>
                                <a href="#" title="TG Flüchtlingsarbeit">Mehr erfahren ›</a>
                </p>
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
                            </div>
                <p>
                                <a href="#" title="Repair Café Bonn">Mehr erfahren ›</a>
                </p>
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
                                <h3>Eine andere AG oder TG</h3>
                                <h4>Beschreibung</h4>
                                <p>
                                Hier steht der Beschreibungstext für die Arbeits- oder Themengruppe.
                                </p>
                            </div>
                <p>
                                <a href="#" title="">Mehr erfahren ›</a>
                </p>
                </div>
        </div>

    </div>

    <div style="clear: both;">
        <p class="text-center">
        <a href="#" class="button brown-ghost">Arbeitsgruppen anzeigen</a>
        </p>
    </div>
</div>

<?php ### Veranstaltungen: based on Events Manager Plugin http://wp-events-plugin.com/ ?>
<div class="row section" id="termine">
    <h2 class="blue">
        <?php
                echo get_the_title(get_page_by_path('veranstaltungen'));
        ?>
    </h2>

    <div class="small-up-1 medium-up-2 large-up-3" style="max-width: 990px; margin: 0 auto;">
        <?php
        $args = array(
                'category' => '-7',  # Exclude category garden. TODO: this should only exclude Gartenöffnungszeiten and be customizable!
                'limit' => 6,
            'pagination' => false,
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
                                <span class="schedule-location location">#_EVENTTIMES</span>
<!--                                                            <span class="schedule-location location">#_LOCATIONNAME</span>  -->
                                                        <span class="schedule-title summary">#_EVENTNAME</span>
                                                </div>
                                        </div>
                                </a>
                        </div>'
                );

#        if( EM_Events::count($args) > 0 ) {
            echo EM_Events::output($args);
#        }
        # TODO: this seems to be a bug in events manager!
        switch_to_blog($network_id);
        ?>
    </div>

    <?php # Gartenöffnungszeiten berechnet aus Gartenevents ?>
    <div class="small-12 column callout text-center">
        <strong>Gartenöffnungszeiten:</strong><br />
        <?php
#            print_r( get_garden_opening() );

            $events = get_garden_opening();
            foreach($events as $days => $times) {
                $opening = [];
                for($i = 0; $i < count($times); $i+=2) {
                    array_push($opening, substr($times[$i], 0, -3) . '-' . substr($times[$i+1], 0, -3) . ' Uhr');
                }

                if($times) {
                    echo $days . ' ' . join($opening, ', ') . '<br />';
                } else {
                    echo $days . ' geschlossen' . '<br />';
                }
            }

            switch_to_blog($network_id);
        ?>
<!--        <strong>Gartenöffnungszeiten:</strong><br /> Mi. und Do. 17:00 – 20:00 Uhr<br /> Fr. 14:00 – 20:00 Uhr<br /> Sa. und So 14:00 – 18:00 Uhr<br />
        <span style="color: #3adb76;"><strong>Der Garten ist offen</strong></span>
-->
    </div>

    <div class="columns end">
        <p class="text-center">
            <a href="veranstaltungen/" class="button blue-ghost">Alle Termine anzeigen</a>
        </p>
    </div>
</div>


<?php ### Latest Network Blog Posts ?>
<div class="row section" role="main" style="border-top: 1px solid #e2e7e3;">
    <h2>Neueste Beiträge</h2>

<!--    <article class="main-content">-->
    <article class="small-up-1 medium-up-2" style="max-width: 990px; margin: 0 auto; display: flex; flex-wrap: wrap;">
        <?php
        $network_id = get_current_blog_id();
        $sites = get_sites();

        # Display six latest blog entries.
        $posts = get_posts_for_sites($sites, 6);

        foreach($posts as $post) {
                switch_to_blog($post->site_id);
                setup_postdata($post);
            # Use content.php or content-<post_format>.php to render the post's content.
                get_template_part('teaser', get_post_format());
        #    wp_reset_postdata();
        }
        switch_to_blog($network_id);

        if(empty($posts)) {
                get_template_part('content', 'none');
        }
        ?>
    </article>

    <div class="columns end">
        <p class="text-center">
            <a href="#" class="button green-ghost">Alle Beiträge anzeigen</a>
        </p>
    </div>
</div>

<?php
/*
<div class="expanded" style="border-top: 1px solid #e2e7e3;">
    <div class="row section" id="News">
        <div class="row">
                <div class="small-12 columns">
                        <h2>Neues aus den Arbeitsgruppen</h2>
                </div>
        </div>

        <div class="row">

                <div class="small-4 columns">
                        <p>
                                <small>01.05.2016 | AG-Zwischennutzung</small><br />
                                <!-- Beitragstitel bitte nach 35 Zeichen mit drei Punkten abkürzen -->
                                <a href="#" title="">Ein langer Titel eines Blogbeitrags …</a>
                        </p>

                        <p>
                                <small>01.05.2016 | AG-Zwischennutzung</small><br />
                                <!-- Beitragstitel bitte nach 35 Zeichen mit drei Punkten abkürzen -->
                                <a href="#" title="">Ein langer Titel eines Blogbeitrags …</a>
                        </p>

                        <p>
                                <small>01.05.2016 | AG-Zwischennutzung</small><br />
                                <!-- Beitragstitel bitte nach 35 Zeichen mit drei Punkten abkürzen -->
                                <a href="#" title="">Ein langer Titel eines Blogbeitrags …</a>
                        </p>
                </div>

                <div class="small-4 columns">
                        <p>
                                <small>01.05.2016 | AG-Zwischennutzung</small><br />
                                <!-- Beitragstitel bitte nach 35 Zeichen mit drei Punkten abkürzen -->
                                <a href="#" title="">Ein langer Titel eines Blogbeitrags …</a>
                        </p>

                        <p>
                                <small>01.05.2016 | AG-Zwischennutzung</small><br />
                                <!-- Beitragstitel bitte nach 35 Zeichen mit drei Punkten abkürzen -->
                                <a href="#" title="">Ein langer Titel eines Blogbeitrags …</a>
                        </p>

                        <p>
                                <small>01.05.2016 | AG-Zwischennutzung</small><br />
                                <!-- Beitragstitel bitte nach 35 Zeichen mit drei Punkten abkürzen -->
                                <a href="#" title="">Ein langer Titel eines Blogbeitrags …</a>
                        </p>
                </div>

                <div class="small-4 columns">
                        <p>
                                <small>01.05.2016 | AG-Zwischennutzung</small><br />
                                <!-- Beitragstitel bitte nach 35 Zeichen mit drei Punkten abkürzen -->
                                <a href="#" title="">Ein langer Titel eines Blogbeitrags …</a>
                        </p>

                        <p>
                                <small>01.05.2016 | AG-Zwischennutzung</small><br />
                                <!-- Beitragstitel bitte nach 35 Zeichen mit drei Punkten abkürzen -->
                                <a href="#" title="">Ein langer Titel eines Blogbeitrags …</a>
                        </p>

                        <p>
                                <small>01.05.2016 | AG-Zwischennutzung</small><br />
                                <!-- Beitragstitel bitte nach 35 Zeichen mit drei Punkten abkürzen -->
                                <a href="#" title="">Ein langer Titel eines Blogbeitrags …</a>
                        </p>
                </div>
        </div>
    </div>
</div>
*/
?>

<?php get_footer(); ?>
