<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(['blogpost-entry', 'column']); ?> style="margin-bottom: 2rem; padding: 0 2rem 1rem;">
	<header>
		<?php #foundationpress_entry_meta(); ?>
        <time class="updated" datetime="<?php echo get_the_time( 'c' ) ?>"><?php echo get_the_date() ?></time>
        <span class="separator">|</span>
        <?php echo get_bloginfo(); ?>
        <span class="separator">|</span>
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" rel="author" class="fn"><?php echo get_the_author() ?></a>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-content" style="min-height: 3rem;">
        <?php
            # Print the teaser if there is one. Otherwise print nothing.
            if(strpos($GLOBALS['pages'][0], '<!--more') !== FALSE) {
                the_content( __( 'Continue reading...', 'foundationpress' ) );
            } else {
                # See https://developer.wordpress.org/reference/functions/the_excerpt/#comparison-with-the-more-quicktag
        ?>
                <a href="<?php the_permalink(); ?>"><?php echo __( 'Continue reading...', 'foundationpress' ); ?></a>
        <?php
            }

            # The following only yields plain text without markup: echo wp_trim_excerpt();
        ?>
	</div>
	<footer>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
<!--	<hr />-->
</div>
