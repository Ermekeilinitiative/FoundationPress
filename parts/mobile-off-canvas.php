<?php
/**
 * Template part for off canvas menu
 *
 * See also navigation.php, and assets/scss/ermekeil.scss
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="off-canvas position-right" id="offCanvas" data-off-canvas data-position="right" data-accordion-menu role="navigation">
  <header class="site-header title-bar" style="background: rgb(241, 243, 240); text-align: right; line-height: 44.3px;">
    <?php // TODO: Use assets/images/Menu-Close-Icon-2x.png as icon ?>
    <button class="menu-icon" type="button" data-toggle="offCanvas" style="width: auto; height: auto;">Menü schließen</button>
  </header>
  <?php foundationpress_mobile_nav(); ?>
</nav>

<div class="off-canvas-content" data-off-canvas-content>
