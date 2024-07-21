<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pembayaran UKT </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/focus') ?>/images/favicon.png">
    <link href="<?= base_url('assets/focus') ?>/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-lg-4">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Aplikasi Pembayaran UKT</h4>
                                    <?= $this->session->flashdata('alert'); ?>
                                    <form action="<?= base_url('auth/login') ?>" method="post">
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets/focus') ?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/focus') ?>/js/quixnav-initjs"></script>
    <script src="<?= base_url('assets/focus') ?>/js/custom.min.js"></script>

</body>

</html>