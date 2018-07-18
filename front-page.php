<?php
/**
 * Template Name: Front Page
 *
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

<div class="row expanded front-page-teaser" style="height: auto;">
    <div class="welcome-text">
        <h1><?php echo get_bloginfo(); ?></h1>
    </div>
    <!-- Vorlage: '/home/daniel/freizeit/ermekeilkarree/wordpress/Material Michael/Ermekeilinitiative Website Desktop-Tablet Wireframe3.jpg' -->
    <!-- TODO: check the following classes and which CSS get applied when switching to next version of Foundation -->
    <div class="site menu-centered">
    <?php
        wp_nav_menu(array(
            'container' => true,                           // Remove nav container
            'menu_class' => 'menu',                        // Adding custom nav class
            'items_wrap'     => '<ul id="%1$s" class="%2$s show-for-medium" data-dropdown-menu>%3$s</ul>',
            'theme_location' => 'site',                     // Where it's located in the theme
            'depth' => 1,                                   // Limit the depth of the nav
            'fallback_cb' => false,                         // Fallback function (see below)
            'walker' => new Foundationpress_Top_Bar_Walker(),
        ));
    ?>
    </div>
</div>

<?php ### Introduction: based on the static page ?>
<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="section">
<div class="row">
    <div class="small-10 small-centered columns">
        <h2 class="dark-green"><?php the_title(); ?></h2>
    </div>

    <div class="small-12 columns">
        <?php get_template_part( 'parts/featured-image' ); ?>
    </div>
</div>
<div class="row">
    <div class="small-10 small-centered columns">
        <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
        <?php the_content(); ?>
    </div>
</div>
</div>
<?php endwhile; ?>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php ### Veranstaltungen: based on Events Manager Plugin http://wp-events-plugin.com/ ?>
<div class="row section" id="termine" style="border-top: 1px solid #e2e7e3;">
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
                                <span class="schedule-title summary">#_EVENTNAME</span>
                            </div>
                        </div>
                    </a>
                </div>'
            );
            echo EM_Events::output($args);
        ?>
    </div>

    <?php # Gartenöffnungszeiten berechnet aus Gartenevents
    #TODO if(blog id === zwischennutzung)
    /*
    ?>
    <div class="small-12 column callout text-center">
        <strong>Gartenöffnungszeiten:</strong><br />
        <?php
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
        ?>
    </div>
    */ ?>

    <div class="columns end">
        <p class="text-center">
            <a href="veranstaltungen/" class="button blue-ghost">Alle Termine anzeigen</a>
        </p>
    </div>
</div>


<?php ### Latest Blog Posts ?>
<div class="expanded row section" role="main" style="border-top: 1px solid #e2e7e3;">
    <h2 style="margin-top: 1rem;">Neueste Beiträge</h2>

    <article class="small-up-1 medium-up-2" style="max-width: 990px; margin: 0 auto; display: flex; flex-wrap: wrap;">
        <?php
        # Display six latest blog entries.
        $args = array(
            'numberposts' => 6
        );
        $posts = get_posts( $args );

        foreach($posts as $post) {
            setup_postdata($post);
            # Use content.php or content-<post_format>.php to render the post's content.
            get_template_part('teaser', get_post_format());
#           wp_reset_postdata();
        }

        if(empty($posts)) {
            get_template_part('content', 'none');
        }
        ?>
    </article>

    <div class="columns end">
        <p class="text-center">
<?php
            # We expect a static page "Blog" to be used as the "Posts page". Most
            # probably, the corresponding URL may be retrieved from Wordpress.
?>
            <a href="blog/" class="button green-ghost">Alle Beiträge anzeigen</a>
        </p>
    </div>
</div>

<?php get_footer(); ?>
