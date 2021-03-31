<body class="bg-gradient" style="background-color:#961B1B">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Change your password for</h1>
                                        <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password1"
                                                name="password1" placeholder="Enter New Password...">
                                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password2"
                                                name="password2" placeholder="Repeat Password...">
                                            <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn auth btn-user btn-block">
                                            Change Password
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>