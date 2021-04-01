<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css?v=3" type="text/css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/css.css?v=5" type="text/css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link rel="stylesheet" href="style.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <link rel="icon" href="<?= base_url() ?>/assets/img/logo-its.png" type="image/gif">

    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg border-bottom px-5" style="background-color: #1176AE;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <b><a class="nav-link text-white py-3 px-3" href="<?= base_url('main') ?>">Dashboard Tracking</a></b>
                </li>
                <li class="nav-item">
                    <b><a class="nav-link text-white py-3 px-3" href="<?= base_url('main/configurePage') ?>">Configure</a></b>
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