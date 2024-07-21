<?= $this->session->flashdata('alert'); ?>

<div class="modals-single mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalone">Tambah Pemilihan Beasiswa</button>
    <div class="modal fade" id="myModalone">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pemilihan Beasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('beasiswa/pemilihan_beasiswa/simpan') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label>Beasiswa</label>
                                <select id="inputState" name="id_beasiswa" class="form-control" required>
                                    <option selected>Pilih Beasiswa...</option>
                                    <?php foreach ($beasiswa as $p) { ?>
                                        <option value="<?= $p['id_beasiswa'] ?>"><?= $p['keterangan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Mahasiswa</label>
                                <select id="inputState" name="id_mahasiswa" class="form-control" required>
                                    <option selected>Pilih Mahasiswa...</option>
                                    <?php foreach ($mahasiswa as $p) { ?>
                                        <option value="<?= $p['id_mahasiswa'] ?>"><?= $p['nama_mahasiswa'] ?></option>
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
                <h4 class="card-title">Data Pemilihan Beasiswa</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table1" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Beasiswa</th>
                                <th>Nama Mahasiswa</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($beasiswamhs as $ab) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ab['keterangan']; ?></td>
                                    <td><?= $ab['nama_mahasiswa']; ?></td>
                                    <td><?php
                                        if ($ab['status'] == 'aktif') {
                                            echo "<span class='bg-success p-2'>" . $ab['status'] . "</span>";
                                        } else {
                                            echo "<span class='bg-danger p-2'>" . $ab['status'] . "</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('beasiswa/pemilihan_beasiswa/delete_data/' . $ab['id_beasiswa_mhs']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus?')" class="btn btn-danger fa fa-trash font-18 align-middle mr-2 mb-2"></i></a>
                                        <button type="button" class="btn btn-primary fa fa-pencil font-10 align-middle mr-2" data-toggle="modal" data-target="#myModaltwo<?= $ab['id_beasiswa_mhs'] ?>"></button>
                                       
                                        <div class="modal fade" id="myModaltwo<?= $ab['id_beasiswa_mhs'] ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Pemilihan Beasiswa</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('beasiswa/pemilihan_beasiswa/update') ?>" method="post">
                                                        <input type="hidden" name="id_beasiswa_mhs" value="<?= $ab['id_beasiswa_mhs'] ?>">
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-12">
                                                                    <label>Beasiswa</label>
                                                                    <select id="inputState" name="id_beasiswa" class="form-control" required>
                                                                        <option selected>Pilih Beasiswa...</option>
                                                                        <?php foreach ($beasiswa as $p) { ?>
                                                                            <option value="<?= $p['id_beasiswa'] ?>" <?php if ($p['id_beasiswa'] == $ab['id_beasiswa']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>><?= $p['keterangan'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <label>Mahasiswa</label>
                                                                    <select id="inputState" name="id_mahasiswa" class="form-control" required>
                                                                        <?php foreach ($mahasiswa as $p) { ?>

                                                                            <option value="<?= $p['id_mahasiswa'] ?>" <?php if ($p['id_mahasiswa'] == $ab['id_mahasiswa']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>><?= $p['nama_mahasiswa']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <label>Status</label>
                                                                    <select id="inputState" name="status" class="form-control" required>
                                                                        <option selected>Pilih Status...</option>
                                                                        <option value="aktif" <?php if ($ab['status'] == 'aktif') {
                                                                                                    echo "selected";
                                                                                                } ?>>aktif</option>
                                                                        <option value="tidak aktif" <?php if ($ab['status'] == 'tidak aktif') {
                                                                                                        echo "selected";
                                                                                                    } ?>>tidak aktif</option>

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
                                <th>Pemilihan Beasiswa</th>
                                <th>Nama Mahasiswa</th>
                                <th>Keterangan Pemilihan Beasiswa</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>