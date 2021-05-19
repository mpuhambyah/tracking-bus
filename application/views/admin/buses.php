<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="" data-toggle="modal" data-target="#AddBus" class="btn btn-sm btn-primary shadow-sm tombolTambahBus">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="row mx-1">
                    <?= $this->session->flashdata('message-bus'); ?>
                </div>
                <?php if (empty($list)) { ?>
                    <div class="alert alert-danger" role="alert">
                        Data not found!
                    </div>
                <?php } else { ?>
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1;
                            foreach ($list as $l) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><img src="<?= base_url(); ?>assets/img/<?= $l['image']; ?>" alt="" style="width: 150px" class="img-thumbnail"></td>
                                    <td><?= $l['name']; ?></td>
                                    <td><?= $l['description']; ?></td>

                                    <td>
                                        <a href=" <?= base_url('admin/edit/') . $l['id']; ?>" class="btn btn-info tombolEditBus" data-id="<?= $l['id']; ?>" data-toggle="modal" data-target="#UserEdit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="<?= base_url('admin/delete/') . $l['id']; ?>" onclick="return confirm('Yakin?');" class="btn btn-danger">
                                            <i class="fas fa-trash "></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>

<div class="modal fade" id="AddBus" tabindex="-1" role="dialog" aria-labelledby="UserEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UserEditLabel">Add New Bus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('admin'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nama Bus</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Deskripsi</label>
                    <input type="text" class="form-control" name="description">
                    <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="email" id="email">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@eb.its.ac.id</div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Password</label>
                    <input type="password" class="form-control" name="password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="file">Image</label>
                    <input type="file" class="form-control-file" name="image" size="20">
                    <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- ############################################################################################################################## -->

<div class="modal fade" id="UserEdit" tabindex="-1" role="dialog" aria-labelledby="UserEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UserEditLabel">Edit Bus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/edit') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input class="form-control" type="text" name="id" id="id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Bus</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Deskripsi</label>
                        <input type="text" class="form-control" id="description" name="description">
                        <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="file">Image (Klik pilih gambar jika ingin mengganti gambar)</label>
                        <img id="image" src="" alt="" style="width: 150px" class="img-thumbnail mb-3">
                        <input type="file" class="form-control-file" name="image" size="20">
                        <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>