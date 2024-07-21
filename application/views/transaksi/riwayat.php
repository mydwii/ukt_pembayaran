<?= $this->session->flashdata('alert'); ?>

<div class="modals-single mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalone">Laporan</button>
    <div class="modal fade" id="myModalone">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Laporan Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('transaksi/riwayat/laporan') ?>" method="get" target="_blank">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Dari</label>
                                        <input type="date" class="form-control" name="tanggal1" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Sampai</label>
                                        <input type="date" class="form-control" name="tanggal2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Print</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Riwayat Pembayaran</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Nota</th>
                                <th>Tanggal</th>
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
                                    <td><?= $ab['tanggal']; ?></td>
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
                            <td colspan="5">Total</td>
                            <td colspan="">Rp. <?= number_format($total); ?> </td>
                        </tr>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>No Nota</th>
                                <th>Tanggal</th>
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