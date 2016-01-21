<article <?php post_class(); ?>>

	<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	
	<?php if ( function_exists( 'tribe_events_event_schedule_details' ) ) echo tribe_events_event_schedule_details( get_the_ID(), '<p>', '</p>' ); ?>

</article>
