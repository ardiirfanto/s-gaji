<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <!-- Title -->
    <title>SiGaji - Sistem Kelola Gaji Karyawan</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="<?= base_url(); ?>assets/css/connect.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/dark_theme.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">

    <!-- Init Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script> -->

    <!-- Init Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Init Swal -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="auth-page sign-in">

    <div id="app_login">
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="auth-form">
                            <div class="row">
                                <div class="col">
                                    <div class="logo-box">
                                        <a href="#" class="logo-text">
                                            {{title}}
                                        </a>
                                        <p>Sistem Informasi Penggajian Pegawai</p>
                                    </div>
                                    <form method="POST" action="<?= base_url() ?>/auth/login" autocomplete="off">
                                        <div class="form-group">
                                            <input ref="username" id="username" name="username" type="text" class="form-control" placeholder="Masukan Username" autocomplete="false">
                                        </div>
                                        <div class="form-group">
                                            <input ref="password" id="password" name="password" type="password" class="form-control" placeholder="Masukan Password">
                                        </div>
                                        <button v-on:click="doLogin" type="button" class="btn btn-primary btn-block btn-submit">Log In</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block d-xl-block">
                        <div class="auth-image"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/connect.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/functions/alerts.js"></script>
    <script src="<?= base_url(); ?>assets/js/functions/utils.js"></script>
    <script src="<?= base_url(); ?>vue/login.js"></script>
</body>

</html>