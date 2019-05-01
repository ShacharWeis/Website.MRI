<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Header -->
        <header class="header text-white pb-80"
                style="background-image: url(<?php echo the_post_thumbnail_url(); ?>);" data-overlay="9">
            <div class="container text-center">

                <div class="row">
                    <div class="col-lg-8 mx-auto align-self-center">

                        <h1 class="display-4 mt-7 mb-8"><?php echo the_title(); ?></h1>
                        <p><?php echo the_date(); ?></p>
                    </div>

                    <div class="col-12 align-self-end text-center">
                        <a class="scroll-down-1 scroll-down-white"
                           href="#section-content"><span></span></a>
                    </div>

                </div>

            </div>
        </header><!-- /.header -->

        <!-- Main Content -->
        <main class="main-content">

            <!--
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            | Blog content
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            !-->
            <div class="section" id="section-content">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-10 mx-auto pt-3 pt-lg-8">

                            <?php echo the_content(); ?>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 mx-auto gap-xy-4">
                            <div class="text-center align-self-center flex-column">
                                <hr>
                                <p><?php _e('Written by'); ?></p>
                                <?php
                                $author_bio_avatar_size = apply_filters('twentyfifteen_author_bio_avatar_size', 56);
                                ?>
                                <p><img class="avatar avatar-sm"
                                        src="<?php echo get_avatar_url(get_the_author_meta('user_email'), $author_bio_avatar_size); ?>"
                                        alt="<?php echo get_the_author(); ?>">
                                </p>
                                <h3 class="author-title"><?php echo get_the_author(); ?></h3>

                                <p class="author-bio">
                                    <?php the_author_meta('description'); ?>
                                </p><!-- .author-bio -->

                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!--
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            | Comments
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            !-->
            <div class="section bg-gray pt-4 pt-lg-6">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-8 mx-auto">

                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                echo '<hr/>';
                                comments_template();
                            endif;

                            ?>

                        </div>
                    </div>

                </div>
            </div>

        </main>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

