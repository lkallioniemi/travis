<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php bloginfo('name'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:title" content="<?php bloginfo('name'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">

    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/min/main.min.css">
    <!--<![endif]-->

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo get_bloginfo("template_directory"); ?>/assets/css/min/ie.min.css">
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="l-wrap">

    <div class="l-constrained">

        <header role="banner">
            <h1><?php bloginfo('name'); ?></h1>
        </header>

        <nav role="navigation">
            <ul class="nav-primary">
            <?php wp_nav_menu(
                array(
                    'menu' => 'main',
                    'container' => false,
                    'items_wrap' => '%3$s'
                )
            ); ?>
            </ul>
        </nav>

    </div>