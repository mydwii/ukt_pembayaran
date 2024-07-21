<?= $this->session->flashdata('alert'); ?>

<div class="modals-single mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalone">Tambah Golongan</button>
    <div class="modal fade" id="myModalone">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Golongan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mahasiswa/golongan/simpan') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Golongan</label>
                                <input type="text" class="form-control" placeholder="Golongan" name="golongan">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Gaji Orang Tua</label>
                                <input type="text" class="form-control" placeholder="Gaji Orang Tua" name="gaji_orang_tua">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
                <h4 class="card-title">Data Golongan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table1" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Golongan</th>
                                <th>Gaji Orang Tua</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($golongan as $ab) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ab['golongan']; ?></td>
                                    <td>Rp.<?= number_format($ab['gaji_orang_tua']); ?></td>
                                    <td>
                                        <a href="<?= site_url('mahasiswa/golongan/delete_data/' . $ab['id_golongan']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus?')" class="btn btn-danger fa fa-trash font-18 align-middle mr-2 mb-2"></i> Hapus</a>
                                        <button type="button" class="btn btn-primary fa fa-pencil font-10 align-middle mr-2" data-toggle="modal" data-target="#myModaltwo<?= $ab['id_golongan'] ?>">Edit</button>
                                        <div class="modal fade" id="myModaltwo<?= $ab['id_golongan'] ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Golongan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('mahasiswa/golongan/update') ?>" method="post">
                                                        <input type="hidden" name="id_golongan" value="<?= $ab['id_golongan'] ?>">
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Golongan</label>
                                                                    <input type="text" class="form-control" placeholder="Golongan" name="golongan" value="<?= $ab['golongan']; ?>">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>Gaji Orang Tua </label>
                                                                    <input type="text" class="form-control" placeholder="Gaji Orang Tua" name="gaji_orang_tua" value="<?= $ab['gaji_orang_tua']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Golongan</th>
                                <th>Gaji Orang Tua</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>