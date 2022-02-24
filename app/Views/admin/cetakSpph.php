<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>print spph | Wakabe E-Procurement</title>
  <link href="<?= base_url(); ?>/css/table.min.css" rel="stylesheet">

  <style>
    body {
      margin-top: 151.18110236px;
      margin-left: 151.18110236px;
      margin-right: 113.38582677px;
      margin-bottom: 151.18110236px;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }

    table.tbl-header {
      font-size: 12px;
      font-family: Arial, Helvetica, sans-serif;
    }

    .table-permintaan {
      border: 1px solid black;
      width: 90%;
      font-family: Helvetica, Arial, sans-serif;
      font-size: 12px;
    }

    table.table-permintaan thead {
      border: 1px solid black;
      font-family: Helvetica, Arial, sans-serif;
      font-size: 13px !important;
      font-weight: bold !important;
      background-color: #DDDDDD;
    }

    .place-foot {
      width: auto;
      position: relative;
      float: left;
    }

    .foot-name {
      text-decoration: underline;
      font-weight: bold;
      font-size: 12px;
    }

    .foot {
      margin-top: -1.4em;
    }

    @media print {
      @page {
        margin: 0;
      }

      .place-foot {
        width: auto;
        position: relative;
        float: left;
      }

      .foot-name {
        text-decoration: underline;
        font-weight: bold;
        font-size: 12px;
      }

      .foot {
        margin-top: -1.4em;
      }

      body {
        margin-top: 151.18110236px;
        margin-left: 128.50393701px;
        margin-right: 113.38582677px;
        margin-bottom: 151.18110236px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
      }

      table.tbl-header {
        font-size: 12px;
        font-family: Arial, Helvetica, sans-serif;
      }

      .table-permintaan {
        border: 1px solid black;
        width: 100%;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
      }

      table.table-permintaan thead {
        border: 1px solid black;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 13px !important;
        font-weight: bold !important;
        background-color: #DDDDDD;
      }

    }
  </style>
</head>

<body>
  <div class="main">
    <table class="tbl-header">
      <tr>
        <td style="width: 30%;">No Surat</td>
        <td style="width: 5%;">:</td>
        <td style="width: 65%;"><?= $isi->no_spph_keluar; ?></td>
      </tr>
      <tr>
        <td style="width: 30%;">Tanggal</td>
        <td style="width: 5%;">:</td>
        <td style="width: 65%;"><?= $isi->tanggal; ?></td>
      </tr>
      <tr>
        <td style="width: 30%; vertical-align: top;">Prihal</td>
        <td style="width: 5%; vertical-align: top;">:</td>
        <td style="width: 65%;"><b>Surat Permohonan Penawaran Harga</b></td>
      </tr>
    </table>
    <br>
    <table class="tbl-header">
      <tr>
        <td>
          Kepada Yth :
        </td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td>
          <b><?= $datVen['vendor']; ?></b>
        </td>
      </tr>
      <tr>
        <td>
          <b>u.p Bp/Ibu <?= $datVen['fullname']; ?></b>
        </td>
      </tr>
    </table>
    <br>
    <p>Bersama ini kami sampaikan permohonan informasi harga untuk produk sebagai berikut :</p>

    <table class="table-bordered table-permintaan" border="1" cellpadding="7">
      <thead>
        <tr align="center">
          <th scope="col" style="width: 2%;">No</th>
          <th scope="col" style="width: 64%;">Nama Barang</th>
          <th scope="col" style="width: 3%;">Vol</th>
          <th scope="col" style="width: 1%;">Satuan</th>
          <th scope="col" style="width: 10%;">Harga Satuan</th>
          <th scope="col" style="width: 10%;">Jumlah</th>
          <th scope="col" style="width: 10%;">Durasi Pengiriman</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($con as $isi) : ?>
          <tr>
            <td align="center" scope="row"><?= $i++; ?></td>
            <td scope="row"><?= $isi->nama_barang; ?></td>
            <td align="center" scope="row"><?= $isi->volume; ?></td>
            <td align="center" scope="row"><?= $isi->satuan; ?></td>
            <td scope="row"></td>
            <td scope="row"></td>
            <td scope="row"></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br>
    <p>Demikian surat permohonan ini, terima kasih atas perhatian dan kerjasamanya.</p>
    <br>
    <div class="place-foot">
      <p>Hormat Kami,</p>
      <div style="height: 50px;"></div>
      <p class="foot-name">Rosyidah Maulidiyah</p>
      <p class="foot">Procurement</p>
    </div>
  </div>





  <script type="text/javascript">
    window.print();
  </script>

</body>

</html>