<?= $this->session->flashdata('alert'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Pembayaran Hari ini </div>
                        <div class="stat-digit">Rp.<?= number_format($hari_ini) ?></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success w-100" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Pembayaran Bulan ini</div>
                        <div class="stat-digit">Rp.<?= number_format($bulan_ini) ?></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary w-100" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Transaksi Hari ini </div>
                        <div class="stat-digit"><?= number_format($transaksi) ?></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning w-100" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Jumlah mahasiswa</div>
                        <div class="stat-digit"><?= number_format($mahasiswa) ?> Mahasiswa</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger w-100" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transaksi 5 Bulan Terakhir</h4>
                </div>
                <div class="card-body">
                    <canvas id="transaksi_bulan"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card" style="height:340px">
                <div class="card-header">
                    <h4 class="card-title">Transaksi Terakhir</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($transaksi_terakhir as $ab) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><span><?= $ab['nama_mahasiswa'] ?></span></td>
                                        <td><a href="<?= base_url("transaksi/pembayaran/invoice/" . $ab['nota']) ?>" class="badge badge-success">Invoice</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Jumlah Fakultas</div>
                        <div class="stat-digit"><?= number_format($fakultas) ?> Tersedia</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger w-100" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Program Studi </div>
                        <div class="stat-digit"><?= number_format($prodi) ?> Tersedia</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning w-100" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Beasiswa Full Tanggungan</div>
                        <div class="stat-digit"><?= $beasiswamhs ?> Mahasiswa</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary w-100" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Beasiswa 1/2 Tanggungan </div>
                        <div class="stat-digit"><?= $beasiswamhs1 ?> Mahasiswa</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success w-100" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>