
<article <?php post_class('summary'); ?>>
	<header>
		<h4><a href="<?php echo get_post_type() == 'reply' ? bbp_get_reply_url( get_the_ID() ) : get_permalink(); ?>"><?php the_title(); ?></a></h4>
	</header>

	<?php the_breadcrumbs(false) ?>

	<?php the_excerpt(); ?>
</article>
