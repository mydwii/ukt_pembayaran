<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran UKT</title>

    <link href="<?= base_url('assets/focus') ?>/css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .invoice-container {
            margin-top: 50px;
        }

        .invoice-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .invoice-body {
            padding: 20px;
            background-color: white;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .invoice-footer {
            padding: 15px;
            background-color: #f5f5f5;
            border-top: 1px solid #dee2e6;
            text-align: center;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .thank-you-note {
            font-size: 1.1em;
            font-weight: bold;
            color: #343a40;
        }

        .detail-section {
            padding-bottom: 15px;
            margin-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .detail-section h5 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .detail-section p {
            margin-bottom: 5px;
        }

        .item {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .item-description {
            font-weight: bold;
            color: #343a40;
        }

        .total-amount {
            font-size: 1.2em;
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container invoice-container">
        <div class="card shadow">
            <div class="invoice-header">
                <h3 class="mb-0">Invoice Pembayaran UKT</h3>
            </div>
            <div class="invoice-body">
                <div class="row detail-section">
                    <div class="col-md-6">
                        <h5>Detail Mahasiswa</h5>
                        <p><strong>Nama:</strong> <?= $pembayaran->nama_mahasiswa ?></p>
                        <p><strong>NIM:</strong> <?= $pembayaran->nim ?></p>
                        <p><strong>Fakultas:</strong> <?= $pembayaran->fakultas ?></p>
                        <p><strong>Program Studi:</strong> <?= $pembayaran->prodi ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5>Detail Pembayaran</h5>
                        <p><strong>Tanggal:</strong> <?= date('d F Y', strtotime($pembayaran->tanggal)) ?></p>
                        <p><strong>No. Invoice:</strong> #<?= $nota ?><br></p>
                        <p><strong>Nama Kasir :</strong> <?php echo $user->username ?></p>
                    </div>
                </div>
                <hr>
                <div class="item">
                    <div class="row">
                        <div class="col-md-6 item-description">
                            Uang Kuliah Tunggal semester <?= $pembayaran->semester ?>
                        </div>
                        <div class="col-md-6 text-md-end">
                            Rp.<?= number_format($pembayaran->harga) ?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-6 item-description">
                            Uang Yang Dibayar
                        </div>
                        <div class="col-md-6 text-md-end">
                            Rp.<?= number_format($pembayaran->uang_bayar) ?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-6 item-description">
                            Kembalian
                        </div>
                        <div class="col-md-6 text-md-end">
                            <?php if (($pembayaran->uang_bayar) - ($pembayaran->harga) <= 0) {
                                echo "Rp.0";
                            } else { ?>
                                Rp.<?= number_format(($pembayaran->uang_bayar) - ($pembayaran->harga));
                                } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invoice-footer">
                <p class="thank-you-note">Terima kasih atas pembayaran Anda.</p>
                <p><strong>Universitas XYZ</strong></p>
                <span class="pull-center hidden-print">
                    <a href="<?= base_url('transaksi/pembayaran/print/' . $nota) ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                </span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>