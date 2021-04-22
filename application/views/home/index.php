<html>

<head>
    <title>Leaflet Realtime</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <style>
        #map {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script>
        const base = '<?= base_url(); ?>';
    </script>
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet-src.js"></script>
    <script src="<?= base_url(); ?>assets/js/dist/leaflet-realtime.js"></script>
    <script src="<?= base_url(); ?>assets/js/script.js"></script>
</body>

</html>