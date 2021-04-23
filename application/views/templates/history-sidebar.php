<div id="wrapper" class="">
    <aside id="sidebar-wrapper" class="shadow-lg p-3 mb-5">
        <div class="container-data px-3">
            <div class="content mt-2 my-3">
                <div id="card-image"></div>
                <div class="card text-center" style="width: auto">
                    <div class="card-body">
                        <h5 id="card-title"></h5>
                        <p id="card-content" class="card-text">Pilih salah satu bus untuk melihat tracking history</p>
                    </div>
                </div>
            </div>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php foreach ($list_buses as $l) : ?>
                    <a class="nav-link getId" id="'v-pills-tab" data-id="<?= $l['id'] ?>" data-toggle="pill" href="<?= '#v-pills-' . $l['id'] ?>" role="tab" aria-controls="<?= 'v-pills-' . $l['id'] ?>" aria-selected="true"><?= $l['name'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </aside>
</div>