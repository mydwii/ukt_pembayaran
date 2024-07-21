<?= $this->session->flashdata('alert'); ?>

<div class="modals-single mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalone">Tambah Mahasiswa</button>
    <div class="modal fade" id="myModalone">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mahasiswa/daftar/simpan') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nim</label>
                                <input type="text" class="form-control" placeholder="Nim" name="nim" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="nama_mahasiswa" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Gaji Orang Tua</label>
                                <select id="inputState" name="id_golongan" class="form-control" required>
                                    <option selected>Pilih...</option>
                                    <?php foreach ($golongan as $ab) { ?>
                                        <option value="<?= $ab['id_golongan'] ?>">Rp.<?php if ($ab['gaji_orang_tua'] <= 1000000) {
                                                                                            echo "<=";
                                                                                        } else if ($ab['gaji_orang_tua'] >= 7000000) {
                                                                                            echo ">=";
                                                                                        }
                                                                                        echo number_format($ab['gaji_orang_tua']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fakultas</label>
                                <select id="inputState" name="fakultas" class="form-control" required>
                                    <option selected>Pilih fakultas...</option>
                                    <?php foreach ($fakultas as $ab) { ?>
                                        <option value="<?= $ab['id_fakultas'] ?>"><?= $ab['fakultas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prodi</label>
                                <select id="inputState" name="prodi" class="form-control" disabled>
                                    <option selected>Pilih prodi...</option>
                                </select>
                                <samp class="text-danger" style="font-size: 0.7em;">* Prodi dapat dipilih setelah memilih fakultas</samp>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tahun Masuk</label>
                                <input type="year" class="form-control" placeholder="Tahun Masuk" name="tahun_masuk" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telepon</label>
                                <input type="text" class="form-control" placeholder="Telepon" name="telp" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Alamat</label>
                                <textarea class="form-control" placeholder="Alamat" name="alamat" required></textarea>
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
                <h4 class="card-title">Data Mahasiswa</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table1" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Golongan</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>
                                <th>Tahun Masuk</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($mhs as $ad) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ad['nim']; ?></td>
                                    <td><?= $ad['nama_mahasiswa']; ?></td>
                                    <td><?= $ad['golongan']; ?></td>
                                    <td><?= $ad['fakultas']; ?></td>
                                    <td><?= $ad['prodi']; ?></td>
                                    <td><?= $ad['tahun_masuk']; ?></td>
                                    <td><?= $ad['telp']; ?></td>
                                    <td><?= $ad['alamat']; ?></td>
                                    <td>
                                        <a href="<?= site_url('mahasiswa/daftar/delete_data/' . $ad['id_mahasiswa']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus?')" class="btn btn-danger fa fa-trash font-10 align-middle mr-2 mb-2"></i></a>
                                        <button type="button" class="btn btn-primary fa fa-pencil font-10 align-middle mr-2 mb-2" data-toggle="modal" data-target="#myModaltwo<?= $ad['id_mahasiswa'] ?>"></button>
                                        <div class="modal fade" id="myModaltwo<?= $ad['id_mahasiswa'] ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Data Mahasiswa</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('mahasiswa/daftar/update') ?>" method="post">
                                                        <input type="hidden" name="id_mahasiswa" value="<?= $ad['id_mahasiswa'] ?>">
                                                        <div class="modal-body form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Nim</label>
                                                                <input type="text" class="form-control" placeholder="Nim" name="nim" value="<?= $ad['nim'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>Nama Mahasiswa</label>
                                                                <input type="text" class="form-control" placeholder="Nama Mahasiswa" value="<?= $ad['nama_mahasiswa'] ?>" name="nama_mahasiswa">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tanggal Lahir</label>
                                                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?= $ad['tanggal_lahir'] ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Golongan</label>
                                                                <select id="inputState" name="id_golongan" class="form-control">
                                                                    <?php foreach ($golongan as $ab) { ?>
                                                                        <option value="<?= $ab['id_golongan'] ?>"><?= $ab['golongan'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Fakultas</label>
                                                                <select id="inputState" name="fakultas" class="form-control">
                                                                    <?php foreach ($fakultas as $ab) { ?>
                                                                        <option value="<?= $ab['id_fakultas'] ?>"><?= $ab['fakultas'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Prodi</label>
                                                                <select id="inputState" name="prodi" class="form-control" disabled>
                                                                    <option value="selected">Pilih prodi</option>
                                                                </select>
                                                                <samp class="text-danger" style="font-size: 0.7em;">* Prodi dapat diubah setelah memilih fakultas</samp>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tahun Masuk</label>
                                                                <input type="year" class="form-control" placeholder="Tahun Masuk" name="tahun_masuk" value="<?= $ad['tahun_masuk'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>No Telepon</label>
                                                                <input type="text" class="form-control" placeholder="Telepon" name="telp" value="<?= $ad['telp'] ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Alamat</label>
                                                                <textarea class="form-control" placeholder="Alamat" name="alamat"><?= $ad['alamat'] ?></textarea>
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
                                        <a href="<?= base_url("mahasiswa/daftar/riwayat/" . $ad['id_mahasiswa']) ?>" class="btn btn-success notika-btn-success waves-effect"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Golongan</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>
                                <th>Tahun Masuk</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>