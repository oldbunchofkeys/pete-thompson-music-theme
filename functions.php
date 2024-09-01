<?php

//theme styles
function pbt_register_theme_styles(){
    wp_enqueue_style( 'theme-styles', get_template_directory_uri(). "/theme.css", array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'pbt_register_theme_styles');

//theme javascript
function pbt_register_theme_script(){
    wp_enqueue_script( 'theme-script', get_theme_file_uri("/index.js") , array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'pbt_register_theme_script');
//support featured media for posts
add_theme_support('post-thumbnails');

function pbt_get_page_data_for_menu() {
    $args = array(
        'post_type' => 'page', // Only retrieve pages
        'posts_per_page' => -1 // Retrieve all pages
    );
    
    // Instantiate custom query
    $custom_query = new WP_Query($args);
    
    // Output custom query loop
    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post();
            // Your loop code here
            // Example: Display page title and content
            if (strpos(get_the_title(), "Pete Thompson Music") === false) {
                ?>
                <li class="<?php if (rtrim(get_the_permalink(), '/') === pbt_get_current_page_url()) {
                    ?>current-page<?php
                } ?>"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
                <?php
            }
        endwhile;
    else :
        // If no pages are found
        echo 'No pages found';
    endif;
    
    // Reset post data
    wp_reset_postdata();
}
function pbt_get_current_page_url() {
    global $wp;
    return home_url( $wp->request );
}


// function pbt_the_post_name() {
//     //works for posts AND pages
//     global $post;
//     echo $post->post_name;
// }

function site_features() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'site_features');