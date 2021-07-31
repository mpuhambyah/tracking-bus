<div class="row">
    <div class="col-sm-3 shadow-sm p-4" style="width:50%;text-align:center;margin:0 auto;">
        <div class="list-group">
            <?php foreach ($list_user as $l) : if ($id != $l['id']) { ?>
                    <a href="<?= base_url('home/messagePage/' . $l['id'] . "/") ?>" id="idReceiver[<?= $l['id'] ?>]" class="buttonReceiver list-group-item list-group-item-action">
                        <?= $l['name'] ?>
                        <span id="unread-message<?= $l['id'] ?>" class="ml-2 badge badge-info"></span>
                    </a>
            <?php }
            endforeach ?>
        </div>
    </div>
    <div class="col-sm-9 shadow-sm" style="width:50%;text-align:center;margin:0 auto;">
        <div id="messageBox" data-id="<?= $id ?>" data-id_receiver="<?= $id_kirim ?>" class="messageBox row p-5" style="height:400px;overflow:auto;">
            <div class="col">
                <div id="add-message"></div>
                <?php if ($content) { ?>
                    <?php foreach ($content as $c) :
                        if ($c['created_by'] == $id_kirim) { ?>
                            <div class="scrollContent mb-3 shadow-sm container" id="<?= $c['id'] ?>">
                                <div class="p-2"><?= $c['content'] ?></div>
                                <span class="p-2 time-left"><?= human_shortdate_id($c['created_at'], 'datetime') ?></span>
                            </div>
                        <?php } else if ($c['created_by'] == $id) { ?>
                            <div class="scrollContent mb-3 shadow-sm container darker" id="<?= $c['id'] ?>">
                                <div class="p-2"><?= $c['content'] ?></div>
                                <span class="p-2 time-right"><?= human_shortdate_id($c['created_at'], 'datetime') ?></span>
                            </div>
                        <?php } ?>
                    <?php endforeach ?>
                <?php } ?>
                <div id="new-message"></div>
            </div>
        </div>
        <div id="message-alert"></div>
        <div class="row shadow-sm" style="height:auto;background-color:#Cad4d8;border-bottom-right-radius:10px;">
            <div class="col-11 p-3">
                <input id="id_receiver" type="text" name="id_receiver" value="<?= $id_kirim ?>" hidden></input>
                <textarea id="content" name="content"></textarea>
            </div>
            <div class="col-1 p-3" style="display:flex;align-items:center;">
                <a href="#" id="sendMessage" data-id_receiver="<?= $id_kirim ?>" style="font-size:20px" class="btn btn-primary mr-2"><span class="fa fa-paper-plane"></a>
            </div>
        </div>
    </div>

</div>