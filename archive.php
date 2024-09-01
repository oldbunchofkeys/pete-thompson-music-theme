<?php get_header(); ?>

<main >
    <h1 id="archive-title"><?= str_replace('Archives:', '', get_the_archive_title()); ?></h1>
</main>

<script>
    console.log('template: archive.php');
</script>
<?php get_footer(); ?>
