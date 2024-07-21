<?= $this->session->flashdata('alert'); ?>

<div class="modals-single mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalone">Tambah Pembayaran</button>
    <div class="modal fade" id="myModalone">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table1" class="display text-dark" style="min-width: 845px;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Fakultas</th>
                                            <th>Prodi</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($mahasiswa as $ab) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $ab['nim']; ?></td>
                                                <td><?= $ab['nama_mahasiswa']; ?></td>
                                                <td><?= $ab['fakultas']; ?></td>
                                                <td><?= $ab['prodi']; ?></td>
                                                <td><a href="<?= base_url("transaksi/pembayaran/transaksi/" . $ab['id_mahasiswa'] . '/' . $ab['golongan']) ?>" class="btn btn-primary">Pilih</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Fakultas</th>
                                            <th>Prodi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pembayaran Hari ini</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Nota</th>
                                <th>Mahasiswa</th>
                                <th>Semester</th>
                                <th>Harga</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $no = 1;
                            foreach ($pembayaran as $ab) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ab['nota']; ?></td>
                                    <td><?= $ab['nama_mahasiswa']; ?></td>
                                    <td><?= $ab['semester']; ?></td>
                                    <td>Rp.<?= number_format($ab['harga']); ?></td>
                                    <td>
                                        <a href="<?= base_url("transaksi/pembayaran/invoice/" . $ab['nota']) ?>" class="btn btn-success notika-btn-success waves-effect"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php $total = $total + $ab['harga'];
                            } ?>
                        </tbody>
                        <tr>
                            <td colspan="4">Total</td>
                            <td colspan="">Rp. <?= number_format($total); ?> </td>
                        </tr>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>No Nota</th>
                                <th>Mahasiswa</th>
                                <th>Semester</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>