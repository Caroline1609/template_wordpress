<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header>
        <div class="site-navigation">
            <nav>
                <?php wp_nav_menu(['theme_location' => 'menuPrincipal']); ?> 
            </nav>
        </div>
    </header>
    <div class="dispo">
    <main>
        <!-- FIN HEADER -->