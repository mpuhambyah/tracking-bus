<div class="container" style="height: 100vh;">
    <!-- Outer Row -->
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-xl-12 col-md-9" style="height: 70%!important;">
            <div class="card o-hidden border-0 shadow-lg h-100">
                <div class="card-body p-0 h-100">
                    <!-- Nested Row within Card Body -->
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img class="img-fluid"
                                src="https://images.pexels.com/photos/2085503/pexels-photo-2085503.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                alt=""
                                style="object-fit: cover; object-position: bottom; width: fit-content; height: 70vh;">
                        </div>
                        <div class=" col-lg-6">
                            <div class="p-5">
                                <div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email"
                                                name="email" placeholder="Enter Email Address..."
                                                value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot
                                            Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/register'); ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>