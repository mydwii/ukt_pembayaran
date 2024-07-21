<?= $this->session->flashdata('alert'); ?>

<div class="modals-single mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalone">Tambah Semester</button>
    <div class="modal fade" id="myModalone">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Semester</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mahasiswa/semester/simpan') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Semester</label>
                                <input type="text" class="form-control" placeholder="Semester" name="semester">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Golongan</label>
                                <select id="inputState" name="golongan" class="form-control">
                                    <option selected>Pilih golongan</option>
                                    <?php foreach ($golongan as $ab) { ?>
                                        <option value="<?= $ab['golongan'] ?>"><?= $ab['golongan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Harga</label>
                                <input type="text" class="form-control" placeholder="Harga" name="harga">
                            </div>
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Semester</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table1" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Semester</th>
                                <th>Golongan</th>
                                <th>Harga</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($semester as $ab) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ab['semester']; ?></td>
                                    <td><?= $ab['golongan']; ?></td>
                                    <td>Rp<?= number_format($ab['harga']); ?></td>
                                    <td>
                                        <a href="<?= site_url('mahasiswa/semester/delete_data/' . $ab['id_semester']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus?')" class="btn btn-danger fa fa-trash font-18 align-middle mr-2 mb-2"></i> Hapus</a>
                                        <button type="button" class="btn btn-primary fa fa-pencil font-10 align-middle mr-2" data-toggle="modal" data-target="#myModaltwo<?= $ab['id_semester'] ?>">Edit</button>
                                        <div class="modal fade" id="myModaltwo<?= $ab['id_semester'] ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Nama Semester</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('mahasiswa/semester/update') ?>" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_semester" value="<?= $ab['id_semester'] ?>">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Semester</label>
                                                                    <input type="text" class="form-control" placeholder="Semester" name="semester" value="<?= $ab['semester']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Golongan</label>
                                                                    <select id="inputState" name="golongan" class="form-control">
                                                                        <?php foreach ($golongan as $ac) { ?>
                                                                            <option value="<?= $ac['golongan'] ?>"><?= $ac['golongan'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Harga</label>
                                                                    <input type="text" class="form-control" placeholder="Harga" name="harga" value="<?= $ab['harga']; ?>">
                                                                </div>
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
                                <th>Semester</th>
                                <th>Golongan</th>
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