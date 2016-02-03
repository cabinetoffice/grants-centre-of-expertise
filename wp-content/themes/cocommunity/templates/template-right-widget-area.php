<?php
/* Template name: Right Widget Area */

the_post();
?>

<main id="content" role="main" class="main">

    <div class="row">
        <div class="large-8 columns">
            <header class="page-header">
                <h1><?php the_title(); ?></h1>
            </header>
            <div class="page-element row">
                <div class="medium-12 large-12 columns">
                    <article class="rte">
                        <?php if (has_post_thumbnail()) : ?>
                            <figure>
                                <?php the_post_thumbnail('large'); ?>
                            </figure>
                        <?php endif ?>
                        <?php the_content(); ?>
                    </article>
                </div>
            </div>
        </div>
        <div class="large-4 columns">
            <?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
                <div id="secondary-sidebar" class="secondary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar( 'sidebar-right' ); ?>
                </div><!-- #primary-sidebar -->
            <?php endif; ?>
        </div>
    </div>

</main>
