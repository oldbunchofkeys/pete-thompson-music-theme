

<?php get_header(); ?>
<main class="container page">
    <?php // loop through page content ?>
    <h1><?= get_the_title(); ?></h1>
</main>
<script>
    console.log('template: page.php');
</script>
<?php get_footer(); ?>