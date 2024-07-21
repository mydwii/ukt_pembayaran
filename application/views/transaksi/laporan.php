<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,
        td {
            padding: 3px;
        }
    </style>
</head>

<body>
    <center>
        <h3>Laporan Pembayaran <?= date_format(date_create($tanggal1), " d M Y") ?> sampai <?= date_format(date_create($tanggal2), " d M Y") ?></h3>
        <table id="table2" class="display text-dark" style="min-width: 700px" border=1>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Nota</th>
                    <th>Tanggal</th>
                    <th>Mahasiswa</th>
                    <th>Semester</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                $no = 1;
                foreach ($pembayaran as $ab) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>#<?= $ab['nota']; ?></td>
                        <td><?= date_format(date_create($ab['tanggal']), " d M Y") ?></td>
                        <td><?= $ab['nama_mahasiswa']; ?></td>
                        <td style="text-align:center"><?= $ab['semester']; ?></td>
                        <td style="text-align:right">Rp.<?= number_format($ab['harga']); ?></td>
                    </tr>
                <?php $total = $total + $ab['harga'];
                } ?>
                <tr>
                    <td colspan="5">Total</td>
                    <td colspan="" style="text-align:right">Rp. <?= number_format($total); ?> </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>
<script>
    window.print();
</script>

</html>