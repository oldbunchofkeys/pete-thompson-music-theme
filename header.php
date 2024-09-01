<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
    <header class="container">
        <a href="<?= get_site_url(); ?>"><?= get_bloginfo('', 'raw'); ?></a>
        <nav>
            <ul>
                <?php pbt_get_page_data_for_menu() ?>
            </ul>
        </nav>
    </header>