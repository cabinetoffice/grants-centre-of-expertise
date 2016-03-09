<?php
/**
 * Day View Template
 * The wrapper template for day view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

do_action( 'tribe_events_before_template' );
?>

<!-- List Title -->
<?php do_action( 'tribe_events_before_the_title' ); ?>
<h2 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h2>
<?php do_action( 'tribe_events_after_the_title' ); ?>

<!-- Tribe Bar -->
<?php tribe_get_template_part( 'modules/bar' ); ?>

<!-- Main Events Content -->
<?php tribe_get_template_part( 'day/content' ) ?>

<div class="tribe-clear"></div>

<?php
do_action( 'tribe_events_after_template' );
