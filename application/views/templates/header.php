<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css?v=3" type="text/css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/css.css?v=1" type="text/css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" type="text/css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>

    <link rel="icon" href="<?= base_url() ?>/assets/img/logo-its.png" type="image/gif">

    <title><?= $title ?></title>

    <style>
        #map {
            height: 100%;
        }

        .custom .leaflet-popup-content-wrapper,
        .custom .leaflet-popup-tip {
            text-align: center;
            background-color: gray;
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg border-bottom px-5" style="background-color: #1176AE;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <b><a class="nav-link text-white py-3 px-3" href="<?= base_url('home') ?>">Dashboard Tracking</a></b>
                </li>
                <li class="nav-item">
                    <b><a class="nav-link text-white py-3 px-3" href="<?= base_url('home/configurePage') ?>">Configure</a></b>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <b><a class="nav-link mr-auto text-white py-3 px-3" href="<?= base_url('profile') ?>"><?= $name ?></a></b>
                </li>
                <li class="nav-item">
                    <b><a class="nav-link mr-auto text-white py-3 px-3" href="" data-toggle="modal" data-target="#logoutModal">Logout</a></b>
                </li>
            </ul>
        </div>
    </nav>