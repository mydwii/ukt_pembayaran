<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Riwayat Pembayaran Mahasiswa</h4>
                <h6 class=""><?= $mhs ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Nota</th>
                                <th>Tanggal</th>
                                <th>Semester</th>
                                <th>Harga</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $no = 1;
                            foreach ($riwayat as $ab) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ab['nota']; ?></td>
                                    <td><?= $ab['tanggal']; ?></td>
                                    <td><?= $ab['semester']; ?></td>
                                    <td>Rp.<?= number_format($ab['harga']); ?></td>
                                </tr>
                            <?php $total = $total + $ab['harga'];
                            } ?>
                        <tfoot>
                            <tr>
                                <td colspan="4">Total</td>
                                <td colspan="">Rp. <?= number_format($total); ?> </td>
                            </tr>
                            </tbody>
                            <tr>
                                <th>No</th>
                                <th>No Nota</th>
                                <th>Tanggal</th>
                                <th>Semester</th>
                                <th>Harga</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>