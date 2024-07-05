
<?php get_header(); ?>
    <main class="container home">
        <section class="hero">
            <div class="hero__wrapper">
                <h1 class="text-center">A blog focused on web development.</h1>
                <p class="hero__main">I write about topics including CSS, JavaScript, PHP, WordPress, Shopify, and any other web development topics on my mind. I especially enjoy making things and then discussing them here.</p>
            </div>
        </section>
        <section class="recent-posts">
            <h2 class="text-center">Recent posts</h2>
            <?php display_recent_post_excerpts(); ?>
        </section>
    </main>
<?php get_footer(); ?>
    

