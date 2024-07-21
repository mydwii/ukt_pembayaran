<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran UKT</title>

    <link href="<?= base_url('assets/focus') ?>/css/style.css" rel="stylesheet">
</head>

<body>
    ====================================== <br>
    Universitas XYZ <br>
    Jln. Imam Bonjol no.9 <br>
    Telp. 08654345678 <br>
    ====================================== <br>
    <table>
        <tr>
            <td>No. Nota</td>
            <td> : #<?= $nota ?></td>
        </tr>
        <tr>
            <td>Nama Mahasiswa</td>
            <td> : <?= $pembayaran->nama_mahasiswa ?></td>
        </tr>
    </table>
    ====================================== <br>
    <table>
        <tr>
            <td>UKT semester <?= $pembayaran->semester ?></td>
            <td> : Rp.<?= number_format($pembayaran->harga) ?></td>
        </tr>
    </table>
    ====================================== <br>

    <table class="d-flex justify-content-right">
        <tr>
            <td>Dibayar</td>
            <td> : Rp.<?= number_format($pembayaran->uang_bayar) ?></td>
        </tr>
        <tr>
            <?php if (($pembayaran->uang_bayar) - ($pembayaran->harga) <= 0) {
                echo "<td>Kembali</td>
                <td>: Rp.0 </td>";
            } else { ?>
                <td>Kembali</td>
                <td> : Rp.<?= number_format($pembayaran->uang_bayar - $pembayaran->harga);
                        } ?></td>
        </tr>
    </table>
    ===============TERIMA KASIH===========
</body>
<script>
    window.print();
</script>

</html>