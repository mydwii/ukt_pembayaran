<div class="row">
    <div class="col-xl-6 col-xxl-12">
        <?php echo $this->session->flashdata('alert');
        $jsonSemesters = json_encode($harga);
        ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Mahasiswa</h4>
                <h4 style="float:right;">#<?= $nota ?></h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" class="form-control input-rounded" placeholder="input-rounded" value="<?= $nama ?>" readonly>
                    </div>
                    <form action="<?= base_url('transaksi/pembayaran/bayar') ?>" method="post">
                        <input type="hidden" value="<?= $nota ?>" name="nota">
                        <input type="hidden" class="form-control input-rounded" placeholder="input-rounded" name="id_mahasiswa" value="<?= $id_mahasiswa ?>" readonly>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Golongan Mahasiswa</label>
                                <input type="text" class="form-control input-rounded" placeholder="input-rounded" name="id_golongan" value="<?= $golongan->golongan ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Semester</label>
                                <select id="inputState" name="semester" class="form-control input-rounded">
                                    <?php
                                    if (!empty($semester)) {
                                        $statusOptionNull = false;
                                        foreach ($semester as $sem) {
                                            if ($sem['golongan'] == $this->uri->segment(5)) { ?>
                                                <option value="<?= $sem['semester'] ?>"><?= $sem['semester'] ?></option>
                                    <?php } else {
                                                if ($statusOptionNull == false) {
                                                    $statusOptionNull = true;
                                                    echo '<option value="">-</option>';
                                                }
                                            }
                                        }
                                    } else {
                                        echo '<option value="">-</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" class="form-control input-rounded" id="harga_ukt_pembayaran" placeholder="input-rounded" name="harga" value="-" readonly>
                        </div>

                        <?php
                        if ($beasiswamhs == null) {
                            echo " <div class=\"form-group\">
                        <label for=\"\">Uang Yang Dibayar</label>
                        <input type=\"text\" class=\"form-control input-rounded\" placeholder=\"Masukkan Nominal Uang\" name=\"uang_bayar\" id=\"uang_bayar\" value=\"\">
                        </div>";
                        } elseif ($id_mahasiswa == $beasiswamhs->id_mahasiswa && $beasiswamhs->status == 'aktif') { ?>
                            <div class="form-group">
                                <label for="">Nominal Beasiswa Pembayaran </label>
                                <?php

                                ?>
                                <input type="text" class="form-control input-rounded" placeholder="" name="uang_bayar" id="uang_bayar" value="" readonly>
                            </div>
                            <div class="form-group" id="additionalPaymentForm" style="display:none;">
                                <label for="">Uang Tambahan</label>
                                <input type="text" class="form-control input-rounded" placeholder="Masukkan Nominal Uang Tambahan" name="uang_tambahan" id="uang_tambahan" value="">
                            </div>
                        <?php }  ?>

                        <div class="form-group">
                            <label for="">Uang Dibayar Terbilang</label>
                            <input id="terbilang_uang_bayar" class="form-control input-rounded" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Kembalian</label>
                            <input type="text" class="form-control input-rounded" placeholder="" name="kembalian" id="kembalian" value="Kembalian" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Kembalian Terbilang</label>
                            <input id="terbilang_kembalian" class="form-control input-rounded" readonly>
                        </div>
                        <input type="hidden" name="golongan" value="<?= $this->uri->segment(5) ?>">
                        <button type="submit" class="btn btn-primary float-right" onclick="return confirm('Apakah Pembayaran UKT telah dilakukan?')">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const semesters = <?= $jsonSemesters ?>;
        const semesterSelect = document.querySelector('select[name="semester"]');
        const hargaInput = document.getElementById('harga_ukt_pembayaran');
        const uangBayarInput = document.getElementById('uang_bayar');
        const kembalianInput = document.getElementById('kembalian');
        const terbilangUangBayarInput = document.getElementById('terbilang_uang_bayar');
        const terbilangKembalianInput = document.getElementById('terbilang_kembalian');
        const additionalPaymentForm = document.getElementById('additionalPaymentForm');
        const uangTambahanInput = document.getElementById('uang_tambahan');

        function terbilang(angka) {
            const bilangan = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
            if (angka < 12) {
                return bilangan[angka];
            } else if (angka < 20) {
                return bilangan[angka - 10] + " Belas";
            } else if (angka < 100) {
                return terbilang(Math.floor(angka / 10)) + " Puluh " + bilangan[angka % 10];
            } else if (angka < 200) {
                return "Seratus " + terbilang(angka - 100);
            } else if (angka < 1000) {
                return terbilang(Math.floor(angka / 100)) + " Ratus " + terbilang(angka % 100);
            } else if (angka < 2000) {
                return "Seribu " + terbilang(angka - 1000);
            } else if (angka < 1000000) {
                return terbilang(Math.floor(angka / 1000)) + " Ribu " + terbilang(angka % 1000);
            } else if (angka < 1000000000) {
                return terbilang(Math.floor(angka / 1000000)) + " Juta " + terbilang(angka % 1000000);
            } else if (angka < 1000000000000) {
                return terbilang(Math.floor(angka / 1000000000)) + " Miliar " + terbilang(angka % 1000000000);
            } else if (angka < 1000000000000000) {
                return terbilang(Math.floor(angka / 1000000000000)) + " Triliun " + terbilang(angka % 1000000000000);
            }
        }

        function updateHarga() {
            const selectedSemester = semesterSelect.value;
            const selectedGolongan = "<?= $golongan->golongan ?>";

            const selectedData = semesters.find(item => item.semester === selectedSemester && item.golongan === selectedGolongan);
            if (selectedData) {
                hargaInput.value = selectedData.harga;
            } else {
                hargaInput.value = "-";
            }
            calculateChange();
        }

        function calculateChange() {
            const harga = parseFloat(hargaInput.value.replace(/[^0-9.-]+/g, ""));
            let uangBayar = parseFloat(uangBayarInput.value.replace(/[^0-9.-]+/g, ""));
            let uangTambahan = parseFloat(uangTambahanInput.value.replace(/[^0-9.-]+/g, ""));

            if (isNaN(uangTambahan)) {
                uangTambahan = 0;
            }

            const totalUangBayar = uangBayar + uangTambahan;
            const kembalian = totalUangBayar - harga;

            if (!isNaN(harga) && !isNaN(totalUangBayar) && totalUangBayar >= harga) {
                if (kembalian === 0) {
                    kembalianInput.value = kembalian;
                    terbilangKembalianInput.value = "Nol Rupiah";
                } else {
                    kembalianInput.value = kembalian;
                    terbilangKembalianInput.value = terbilang(kembalian) + ' Rupiah';
                }
                terbilangUangBayarInput.value = terbilang(totalUangBayar) + ' Rupiah';
            } else {
                kembalianInput.value = '';
                terbilangKembalianInput.value = '';
                terbilangUangBayarInput.value = '';
            }

            if (totalUangBayar < harga) {
                additionalPaymentForm.style.display = 'block';
            } else {
                additionalPaymentForm.style.display = 'none';
            }
        }

        semesterSelect.addEventListener('change', updateHarga);
        uangBayarInput.addEventListener('input', calculateChange);
        uangTambahanInput.addEventListener('input', calculateChange);

        // Trigger updateHarga on page load
        updateHarga();
        const hargaInputNilai = parseInt(hargaInput.value, 10);
        const nominal_value = <?php echo isset($nominal->nominal) ? $nominal->nominal : 0; ?>;
        const uangBayarValue = (hargaInputNilai / 100) * nominal_value;

        uangBayarInput.value = uangBayarValue;
        terbilangUangBayarInput.value = terbilang(uangBayarValue) + ' Rupiah';

        if (hargaInputNilai > uangBayarValue) {
            additionalPaymentForm.style.display = 'block';
        }

        calculateChange();
    });
</script>