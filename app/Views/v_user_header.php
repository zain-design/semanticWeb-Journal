<!DOCTYPE html>
<html lang="en" class="b-reith-sans-font b-reith-serif-font id-svg b-reith-sans-loaded b-reith-serif-loaded bp_3">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>Beranda</title>
    <meta name="description" content="Projects" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        :root {
            --bbc-font: ReithSans, Arial, Helvetica, freesans, sans-serif;
            --bbc-font-legacy: Arial, Helvetica, freesans, sans-serif;
        }
    </style>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="<?php echo base_url("user") ?>/css/beranda extended.css" rel="stylesheet" />
    <link href="<?php echo base_url("user") ?>/css/beranda.css" rel="stylesheet" />
    <link href="<?php echo base_url("admin") ?>/css/pagination.css" rel="stylesheet" />
</head>

<body class="standard-page page-projects" cz-shortcut-listen="true">
    <!-- Styling hook for shared modules only -->
    <div id="orb-modules">
        <div id="main" class="b-g-m b-r">
            <header>
                <h1>
                    <a href="<?php echo base_url() ?>">Sistem Informasi Pencarian Karya Ilmiah</a>
                </h1>
            </header>
            <nav id="blq-local-nav" class="container">
                <h2 class="hidden b-font-family-serif">BBC R&amp;D navigation</h2>
                <ul id="nav-site" class="clearfix">
                    <li id="index-link" class="link">
                        <a href="<?php echo base_url() ?>/">Home</a>
                    </li>
                    <li id="projects-link" class="link <?php echo $type == 'about' ? "on first" : "" ?>">
                        <a href="<?php echo base_url() ?>/about">About</a>
                    </li>

                </ul>
                <a class="more-button" href="<?php echo base_url('user') ?>/publications#" style="min-width: 39px">More</a>
                <ul id="nav-site-more" class="clearfix more-list"></ul>
                <h3 class="b-font-family-serif">Publications</h3>
                <ul id="nav-page" class="clearfix"></ul>
                <a class="more-button" href="<?php echo base_url('user') ?>/publications#" style="min-width: 39px">More</a>
                <ul id="nav-page-more" class="clearfix more-list"></ul>
                <script src="./Projects - BBC R&amp;D_files/nav-1718a1f964be204ac6d1b5e9d058806d.js.download"></script>
            </nav>