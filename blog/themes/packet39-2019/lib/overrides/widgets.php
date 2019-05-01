<?php

/**
 * Extend Recent Posts Widget
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

    function widget($args, $instance) {

        extract( $args );

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);

        if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
            $number = 10;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if( $r->have_posts() ) :

            echo $before_widget;
            if( $title ) echo $before_title . $title . $after_title; ?>
            <?php while( $r->have_posts() ) : $r->the_post(); ?>
                <a class="media text-default align-items-center mb-5" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                    <img class="rounded w-65px mr-4" src="<?php echo the_post_thumbnail_url(); ?>">
                    <?php endif; ?>
                    <p class="media-body small-2 mb-0 <?php echo has_post_thumbnail() ? 'lh-4' : '';?>"><?php the_title(); ?></p>
                </a>
            <?php endwhile; ?>
            <?php
            echo $after_widget;

            wp_reset_postdata();

        endif;
    }
}
function my_recent_widget_registration() {
    unregister_widget('WP_Widget_Recent_Posts');
    register_widget('My_Recent_Posts_Widget');
}

add_action('widgets_init', 'my_recent_widget_registration');
