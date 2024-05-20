<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Sysfood</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../../assets/images/sysfood_logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/fonts/boxicons.css" />

    <link rel="stylesheet" href="../../assets/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <link rel="stylesheet" href="../../assets/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <script src="../../assets/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
    <style>
    .card-img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo" style="margin: 20px;">
                    <span class="" style="padding: 20px;">
                        <a href="../dashboard/bem_vindo.php" class="logo">
                            <img src="../../assets/images/sysfood_logo.png" alt="Sysfood"
                                style="width: 90px; height: 90px;">
                        </a>
                    </span>
                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <?php session_start(); ?>