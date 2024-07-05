<?php

//theme styles
function register_theme_styles(){
    wp_enqueue_style( 'theme-styles', get_template_directory_uri(). "/theme.css", array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'register_theme_styles');

//support featured media for posts
add_theme_support('post-thumbnails');

// the loop - blog post excerpts
function display_post_excerpts() {
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h3 class="entry-title">', '</h3>'); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php 
                        // Display the post excerpt
                        the_excerpt(); 
                    ?>

                </div><!-- .entry-content -->
                <a href="<?php get_post_permalink() ?>"></a>

                <footer class="entry-footer">
                    <!-- Entry footer content -->
                </footer><!-- .entry-footer -->
            </article><!-- #post-<?php the_ID(); ?> -->
            <?php
        endwhile;
    else :
        // If no content, include the "No posts found" template part
        get_template_part('template-parts/content', 'none');
    endif;
}

// the loop - most recent 4 blog post excerpts
function display_recent_post_excerpts() {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4 // Limit to 4 posts
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            ?>
            <a class="no-underline" href="<?php echo get_post_permalink() ?>">
                <?php echo get_the_post_thumbnail() ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h3 class="entry-title">', '</h3>'); ?>
                    </header>
                    <div class="entry-content">
                        <?php 
                            the_excerpt(); 
                        ?>
                    </div>
                    <p>Read post</p>
                </article><!-- #post-<?php the_ID(); ?> -->
            </a>
            <?php
        endwhile;
        wp_reset_postdata(); // Reset post data
    else :
        // If no content, include the "No posts found" template part
        get_template_part('template-parts/content', 'none');
    endif;
}
function display_single_post() {
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>

                    <div class="entry-content ">
                        <?php 
                            // Display the post content
                            the_content(); 
                        ?>
                    </div>
                </article>
    <?php endwhile; endif;
}
