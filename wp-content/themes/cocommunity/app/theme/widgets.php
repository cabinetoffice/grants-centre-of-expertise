<?php

/**
 * Adds CO_Downloads_Widget widget.
 */
class CO_Downloads_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'CO_Downloads_Widget', // Base ID
			__( 'Cabinet Office Downloads Widget', 'cabinetoffice' ), // Name
			array( 'description' => __( 'A widget displaying all available downloads by menu order.', 'cabinetoffice' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		$documents = new WP_Query( array( 'post_type' => 'document', 'orderby' => 'menu_order', 'order' => 'asc', 'posts_per_page' => -1 ) );

		if ( $documents->have_posts() ) : ?>

			<ul>
				<?php while ( $documents->have_posts() ) : $documents->the_post(); ?>
					<?php $document = get_field( 'file_upload' ); ?>

					<li>
						<a href="<?php the_permalink(); ?>">
							<i class="fa <?php echo get_fa_icon_for_mime_type( $document['mime_type'] ); ?>"></i>
							<?php the_title(); ?>
						</a>
					</li>
				<?php endwhile; ?> 
			</ul>

			<?php wp_reset_query();

		endif;

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Downloads', 'cabinetoffice' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class CO_Downloads_Widget