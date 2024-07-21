<?= $this->session->flashdata('alert'); ?>

<div class="modals-single mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalone">Tambah Prodi</button>
    <div class="modal fade" id="myModalone">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Prodi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mahasiswa/prodi/simpan') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Prodi</label>
                                <input type="text" class="form-control" placeholder="Prodi" name="prodi">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Fakultas</label>
                                <select id="inputState" name="id_fakultas" class="form-control">
                                    <option selected>Choose...</option>
                                    <?php foreach ($fakultas as $ab) { ?>
                                        <option value="<?= $ab['id_fakultas'] ?>"><?= $ab['fakultas'] ?></option>
                                    <?php } ?>
                                </select>
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
                <h4 class="card-title">Data Prodi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table1" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Prodi</th>
                                <th>Fakultas</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($prodi as $ab) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ab['prodi']; ?></td>
                                    <td><?= $ab['fakultas']; ?></td>
                                    <td>
                                        <a href="<?= site_url('mahasiswa/prodi/delete_data/' . $ab['id_prodi']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus?')" class="btn btn-danger fa fa-trash font-18 align-middle mr-2 mb-2 "></i> Hapus</a>
                                        <button type="button" class="btn btn-primary fa fa-pencil font-10 align-middle mr-2" data-toggle="modal" data-target="#myModaltwo<?= $ab['id_prodi'] ?>">Edit</button>
                                        <div class="modal fade" id="myModaltwo<?= $ab['id_prodi'] ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Nama Prodi</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('mahasiswa/Prodi/update') ?>" method="post">
                                                        <input type="hidden" name="id_prodi" value="<?= $ab['id_prodi'] ?>">
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Nama Prodi</label>
                                                                    <input type="text" class="form-control" placeholder="Prodi" name="prodi" value="<?= $ab['prodi']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Fakultas</label>
                                                                    <select id="inputState" name="id_fakultas" class="form-control">
                                                                        <option selected><?= $ab['fakultas'] ?></option>
                                                                        <?php foreach ($fakultas as $ab) { ?>
                                                                            <option value="<?= $ab['id_fakultas'] ?>"><?= $ab['fakultas'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
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
                                <th>Nama Prodi</th>
                                <th>Fakultas</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>