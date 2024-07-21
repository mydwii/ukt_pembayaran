<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>UKT Pembayaran</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/focus') ?>/images/favicon.png">
    <link rel="stylesheet" href="<?= base_url('assets/focus') ?>/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/focus') ?>/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?= base_url('assets/focus') ?>/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/focus') ?>/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/focus') ?>/css/style.css" rel="stylesheet">




</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="<?= base_url('assets/focus') ?>/images/logo.png" alt="">
                <img class="logo-compact" src="<?= base_url('assets/focus') ?>/images/logo-text.png" alt="">
                <img class="brand-title" src="<?= base_url('assets/focus') ?>/images/logo-text.png" alt=""><span>UKT</span>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <?= $halaman ?>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <?php $menu =  $this->uri->segment(1) ?>
                    <?php $menu1 =  $this->uri->segment(2) ?>
                    <li class="<?php if ($menu == 'home') {
                                    echo 'active';
                                } ?>"><a href="<?= base_url('home') ?>" class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-world-2"></i><span class="nav-text">Mahasiswa</span></a>
                        <ul aria-expanded="false">
                            <li class="<?php if ($menu1 == 'daftar') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('mahasiswa/daftar') ?>">Daftar Mahasiswa</a></li>
                            <li class="<?php if ($menu1 == 'fakultas') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('mahasiswa/fakultas') ?>">Fakultas</a></li>
                            <li class="<?php if ($menu1 == 'golongan') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('mahasiswa/golongan') ?>">Golongan</a></li>
                            <li class="<?php if ($menu1 == 'semester') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('mahasiswa/semester') ?>">Semester</a></li>
                            <li class="<?php if ($menu1 == 'prodi') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('mahasiswa/prodi') ?>">Prodi</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-form"></i><span class="nav-text">Transaksi</span></a>
                        <ul aria-expanded="false">
                            <li class="<?php if ($menu1 == 'pembayaran') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('transaksi/pembayaran') ?>">Pembayaran</a></li>
                            <li class="<?php if ($menu1 == 'riwayat') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('transaksi/riwayat') ?>">Riwayat Transaksi</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-form"></i><span class="nav-text">Beasiswa</span></a>
                        <ul aria-expanded="false">
                            <li class="<?php if ($menu1 == 'beasiswa') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('beasiswa/beasiswa') ?>">Beasiswa</a></li>
                            <li class="<?php if ($menu1 == 'pemilihan_beasiswa') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('beasiswa/pemilihan_beasiswa') ?>">Pemilihan Beasiswa </a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-form"></i><span class="nav-text">Audio</span></a>
                        <ul aria-expanded="false">
                            <li class="<?php if ($menu1 == 'music') {
                                            echo 'active';
                                        } ?>"><a href="<?= base_url('music/index') ?>">Dokumentasi</a></li>

                        </ul>
                    </li>
                    <li class="<?php if ($menu == 'user') {
                                    echo 'active';
                                } ?>"><a href="<?= base_url('user') ?>" class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span class="nav-text">User</span></a>
                    </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <?= $contents ?>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors 
        -->
    <script src="<?= base_url('assets/focus') ?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/focus') ?>/js/quixnav-init.js"></script>
    <script src="<?= base_url('assets/focus') ?>/js/custom.min.js"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="<?= base_url('assets/focus') ?>/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= base_url('assets/focus') ?>/js/plugins-init/chartjs-init.js"></script>
    <script>
        //gradient area chart

        const transaksi_bulan = document.getElementById("transaksi_bulan").getContext('2d');
        //generate gradient
        const transaksi_bulangradientStroke = transaksi_bulan.createLinearGradient(500, 0, 100, 0);
        transaksi_bulangradientStroke.addColorStop(0, "rgba(26, 51, 213, 1)");
        transaksi_bulangradientStroke.addColorStop(1, "rgba(26, 51, 213, 0.5)");

        transaksi_bulan.height = 100;

        new Chart(transaksi_bulan, {
            type: 'line',
            data: {
                defaultFontFamily: 'Poppins',
                labels: ["<?= $nama_4 ?>", "<?= $nama_3 ?>", "<?= $nama_2 ?>", "<?= $nama_1 ?>", "<?= $nama_jigeum ?>"],
                datasets: [{
                    label: "Pembayaran sebesar",
                    data: [<?= $bulan_4 ?>, <?= $bulan_3 ?>, <?= $bulan_2 ?>, <?= $bulan_1 ?>, <?= $bulan_ini ?>],
                    borderColor: transaksi_bulangradientStroke,
                    borderWidth: "1",
                    backgroundColor: transaksi_bulangradientStroke
                }]
            },
            options: {
                legend: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false,
                            max: <?= $maxend ?>,
                            min: <?= $minend ?>,
                            stepSize: 5000000,
                            padding: 10
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            padding: 10
                        }
                    }]
                }
            }
        });
    </script>

    <!-- Vectormap -->
    <script src="<?= base_url('assets/focus') ?>/vendor/raphael/raphael.min.js"></script>
    <script src="<?= base_url('assets/focus') ?>/vendor/morris/morris.min.js"></script>


    <script src="<?= base_url('assets/focus') ?>/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url('assets/focus') ?>/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="<?= base_url('assets/focus') ?>/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="<?= base_url('assets/focus') ?>/vendor/flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets/focus') ?>/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="<?= base_url('assets/focus') ?>/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="<?= base_url('assets/focus') ?>/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets/focus') ?>/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="<?= base_url('assets/focus') ?>/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="<?= base_url('assets/focus') ?>/js/dashboard/dashboard-1.js"></script>
    <!-- Datatable -->
    <script src="<?= base_url('assets/focus/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/focus/') ?>js/plugins-init/datatables.init.js"></script>

    <script>
        $(document).ready(function() {
            // dataTables
            $("#table1").dataTable();
            $("#table2").dataTable();

            let hostServer = window.location.origin;
            let AplicationPath = window.location.pathname;

            let baseUrl = hostServer + (AplicationPath.substring(0, 16));

            if ((hostServer + AplicationPath) == "http://localhost/ukt_pembayaran/mahasiswa/daftar") {
                $(document).delegate("select[name='fakultas']", "change", function() {
                    let nilaiIDFakultas = $(this).val() != undefined ? $(this).val() : null;

                    $("select[name='prodi']").removeAttr("disabled");

                    if (nilaiIDFakultas != null) {
                        try {
                            $.get(
                                baseUrl + "Mahasiswa/daftar/ambil_data_prodi_berdasarkan_fakultas/" + nilaiIDFakultas,
                                function(data) {
                                    data = JSON.parse(data);

                                    if (data.status == "success") {
                                        let dataOpsiBidangProdi = `<option selected>Pilih prodi...</option>`;
                                        data.data.forEach(prodi => {
                                            dataOpsiBidangProdi += `<option value="${prodi.id_prodi}">${prodi.prodi}</option>`;
                                        })

                                        $("select[name='prodi']").empty();

                                        $("select[name='prodi']").append(dataOpsiBidangProdi);
                                    } else {
                                        alert("Mohon maaf, Terdapat kesalahan dalam pengambilan data Prodi. Pastikan telah terdapat data Prodi untuk fakultas yang anda pilih! ");
                                    }
                                }
                            )
                        } catch (error) {
                            alert("Mohon maaf, Terdapat kesalahan dalam pengambilan data Prodi. Pastikan telah terdapat data Prodi untuk fakultas yang anda pilih!");
                        }
                    }

                })
            }
        });
    </script>



</body>

</html>