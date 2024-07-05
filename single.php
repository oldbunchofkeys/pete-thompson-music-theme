<?php 
    global $post;
    $post_slug = $post->post_name;
?>
<?php get_header(); ?>
    <main class="container single-post <?php echo $post_slug ?>">
        <section class="single__content">
            <?php display_single_post(); ?>
        </section>
        
    </main>
<?php get_footer(); ?>