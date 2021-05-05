<div class="row">
    <div class="col-sm-3 shadow-sm p-4" style="width:50%;text-align:center;margin:0 auto;">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Cras justo odio
            </a>
            <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
            <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
        </div>
    </div>
    <div class="col-sm-9 shadow-sm" style="width:50%;text-align:center;margin:0 auto;">
        <div id="messageBox" class="messageBox row p-5" style="height:400px;overflow:auto;">
            <div class="col">
                <div id="add-message">
                </div>
                <?php foreach ($content as $c) :
                    if ($c['id'] == $id) { ?>
                        <div class="mb-3 shadow-sm container">
                            <div class="p-2"><?= $c['content'] ?></div>
                            <span class="p-2 time-left"><?= human_shortdate_id($c['created_at'], 'datetime') ?></span>
                        </div>
                    <?php } else if ($c['created_for'] == $id_kirim) { ?>
                        <div class="mb-3 shadow-sm container darker">
                            <div class="p-2"><?= $c['content'] ?></div>
                            <span class="p-2 time-right"><?= human_shortdate_id($c['created_at'], 'datetime') ?></span>
                        </div>
                    <?php } ?>
                <?php endforeach ?>
            </div>
        </div>
        <?= form_open_multipart(base_url('home/insertMessage/5')); ?>
        <div class="row shadow-sm" style="background-color:#Cad4d8;border-bottom-right-radius:10px;">
            <div class="col-11 p-3">
                <textarea id="content" name="content"></textarea>
            </div>
            <div class="col-1 p-3" style="display:flex;align-items:center;">
                <button href="#" style="font-size:20px" class="btn btn-primary mr-2"><span class="fa fa-paper-plane"></button>
            </div>
        </div>
    </div>

</div>