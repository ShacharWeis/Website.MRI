<?php get_header(); ?>
<!-- Main Content -->

<header class="header text-center text-white" data-overlay="7"
        style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
    <div class="container">

        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Latest Packet39 Articles</h1>
                <p class="lead-2 opacity-90 mt-6">Updates from the Packet39 team on
                    Virtual Reality, Artificial
                    Intelligence, and Computer&nbsp;Vision</p>
            </div>
        </div>

    </div>
</header>

<main class="main-content">
    <div class="section bg-gray">
        <div class="container">
            <div class="row">
                <?php if (have_posts()) : ?>

                    <div class="row">
                        <div class="col-md-8 col-xl-9">
                            <div class="row gap-y">

                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="card hover-shadow-7 my-8">
                                        <div class="row">
                                            <?php if (has_post_thumbnail()) : ?>
                                            <div class="col-md-4">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <img
                                                        class="fit-cover position-absolute h-100"
                                                        src="<?php echo the_post_thumbnail_url(); ?>"
                                                        alt="...">
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <div class="<?php echo has_post_thumbnail() ? 'col-md-8' : ''; ?>">
                                                <div class="p-7">
                                                    <h4><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                                                    <?php the_excerpt(); ?>
                                                    <a class="small ls-1"
                                                       href="<?php echo get_permalink(); ?>">Read
                                                        More <span class="pl-1">⟶</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>

                            <nav class="flexbox mt-30">
                                <a class="btn btn-white" href="<?php echo get_previous_posts_page_link(); ?>"><i
                                        class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                                <a class="btn btn-white" href="<?php echo get_next_posts_page_link(); ?>">Older <i
                                        class="ti-arrow-right fs-9 ml-4"></i></a>
                            </nav>
                        </div>

                        <div class="col-md-4 col-xl-3">
                            <div class="sidebar px-4 py-md-0 my-8">
                                <?php if (is_active_sidebar('article-sidebar')) : ?>
                                    <?php dynamic_sidebar('article-sidebar'); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
