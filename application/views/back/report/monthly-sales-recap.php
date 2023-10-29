<!DOCTYPE html>
<html>
<head>
  <style>
    .table,
    tr,
    td,
    th {
      border: 1px solid #000;
    }

    td, th { padding: 1px 5px; }

    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }

    html {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
    }
  </style>
</head>

<body>
  <div style="margin:0 auto; width: 19cm;">
    <div style="text-align:center;">
      <h3>LAPORAN REKAPITULASI HARIAN TRANSAKSI PENJUALAN</h3>
      <h4>VINEX-D FUTSAL</h4>
      <h4>Periode: <?= tgl_indo($startDate) ?> - <?= tgl_indo($endDate) ?></h4>
    </div>
    <table style="border-collapse:collapse;border:1px solid #000;width:100%;">
      <thead>
        <tr style="background:#777;color:white;">
          <th style="width:5%;">No.Urut</th>
          <th style="">Tanggal</th>
          <th style="">Hari</th>
          <th style="">Jml Jam</th>
          <th style="">Jml Transaksi</th>
          <th style="">Jumlah (Rp.)</th>
        </tr>
      </thead>
      <tbody>
        <?php $grandTotal = 0 ?>
        <?php $totalTransaction = 0 ?>
        <?php $totalDuration = 0 ?>
        <?php $no = 1; ?>
        <?php foreach ($items as $item): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td class="text-center"><?= IntlDateFormatter::formatObject(new DateTime($item->date), 'd') ?></td>
            <td class="text-center"><?= IntlDateFormatter::formatObject(new DateTime($item->date), 'eeee') ?></td>
            <td class="text-right"><?= number_format($item->duration, 0, ',', '.') ?></td>
            <td class="text-right"><?= number_format($item->transactionCount, 0, ',', '.') ?></td>
            <td class="text-right"><?= number_format($item->total, 0, ',', '.') ?></td>
            <?php $grandTotal += $item->total ?>
            <?php $totalTransaction += $item->transactionCount ?>
            <?php $totalDuration += $item->duration ?>
          </tr>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <tr style="background:#777;color:white;">
          <th colspan="3" class="text-right">Grand Total</th>
          <th class="text-right"><?= number_format($totalDuration, 0, ',', '.') ?></th>
          <th class="text-right"><?= number_format($totalTransaction, 0, ',', '.') ?></th>
          <th class="text-right"><?= number_format($grandTotal, 0, ',', '.') ?></th>
        </tr>
      </tfoot>
    </table>

  </div>
</body>

</html>