<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda yakin ingin keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Ya</a>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->
<script>
    const base = '<?= base_url(); ?>';
</script>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script src="<?= base_url(); ?>assets/js/leaflet/leaflet-src.js"></script>
<script src="<?= base_url(); ?>assets/js/dist/leaflet-realtime.js"></script>
<script src="<?= base_url(); ?>assets/js/dist/leaflet.rotatedMarker.js"></script>

<script src="<?= base_url(); ?>assets/js/script_message.js?=3"></script>

<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js?"></script>

<!-- CK Editor -->
<script src="<?= base_url('assets/js/admin/ckeditor5-build-classic/ckeditor.js') ?>" type="text/javascript"></script>

<style>
    .ck-editor__editable {
        min-height: 100px;
        background-color: royalblue
    }

    .ck-sticky-panel {
        width: 100%;
    }
</style>
<script>
    const list = $(".nav-link.text-white");
    const title = $("title").html();
    for (let i = 0; i < list.length; i++) {
        if (list[i].innerHTML == title) {
            list[i].classList.add("active");
        }
    }

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    let valEditor;
    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            valEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>

</body>

</html>