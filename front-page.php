
<?php get_header(); ?>
    <?php if (have_posts()): while(have_posts()): the_post(); ?>
    <style>
        .home.hero {
            background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.85)), url("<?= get_the_post_thumbnail_url(); ?>");
            background-size: cover;
            background-position: center;
        }
    </style>
    <main class="container page-<?= $post->post_name; ?>">
        <section class="<?= $post->post_name; ?> hero">
            <div class="hero__wrapper">
                <h1 class="text-center"><?= get_the_title(); ?></h1>
                <p><?= get_the_content(); ?></p>
                <button class="button-primary">
                    <a href="<?= site_url('/about'); ?>">Learn More</a></button>
            </div>
        </section>
        
        <section id="events" class="events">
            <h2>Upcoming events</h2>
            <article class="events-wrapper">
                <div class="event headings">
                    <p>Date</p>
                    <p>Event</p>
                    <p>Location</p>
                </div>
                <?php
                    $homepage_events = new WP_Query(array(
                        'post_type' => 'event',
                        'posts_per_page' => 2,
                        'meta_key' => 'event_date', // Replace with your ACF date field name
                        'orderby' => 'meta_value_num', // Sort by numeric value of the date
                        'order' => 'ASC', // Change to 'DESC' for descending order
                        'meta_query' => array(
                            array(
                                'key' => 'event_date', // Replace with your ACF date field name
                                'compare' => 'EXISTS', // Ensure that only posts with this meta key are included
                            ),
                        ),
                    ));
                    if($homepage_events->have_posts()): while($homepage_events->have_posts()): $homepage_events->the_post(); 
                ?>
                <div class="event">
                    <p><?= get_field('event_date'); ?></p>
                    <p><a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></p>
                    <p><?php echo (get_field('event_location_city_state') != '') ? get_field('event_location_city_state') : 'Location Unset' ?></p>
                </div>
                <?php endwhile;  ?>
                <?php else: ?>
                    <div class="event">
                        <p>Sorry, no events yet. Stay tuned!</p>
                    </div>
                <?php endif; wp_reset_postdata(); endwhile; endif; ?>
            </article>
        </section>
        
        
    </main>
    <script>
        console.log('template: front-page.php');
    </script>
    
<?php get_footer(); ?>