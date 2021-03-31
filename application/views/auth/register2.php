<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Template</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/login.css">
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 col-sm-6 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="<?= base_url('assets/'); ?>images/logo.svg" alt="logo" class="logo">
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title text-center">Registration!</h1>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="POST" action="<?= base_url('auth/register'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    placeholder="Full Name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email"
                                    placeholder="Email Address" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-xl-6 mb-3 mb-xl-0">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        name="password" placeholder="Password">
                                </div>
                                <div class="col-xl-6">
                                    <input type="password" class="form-control form-control-user" id="repassword"
                                        name="repassword" placeholder="Repeat Password">
                                </div>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" class="login-btn btn btn-primary btn-user btn-block mt-5">
                                Register Account
                            </button>
                        </form>
                        <p class="login-wrapper-footer-text text-center">Already have an account? <a
                                href="<?= base_url('auth'); ?>" class="text-reset">Login</a></p>
                    </div>
                    <p class="text-center text-muted mb-0"><small>All rights reserved Bus Tracking ITS 2021</small></p>
                </div>
                <div class="col-xl-7 col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://images.pexels.com/photos/2085503/pexels-photo-2085503.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                        alt="login image" class="login-img">
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>