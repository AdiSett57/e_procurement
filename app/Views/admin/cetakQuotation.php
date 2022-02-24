<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quotation | Wakabe E-Procurement</title>
  <link href="<?= base_url(); ?>/css/table.min.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Zen+Antique+Soft&display=swap');

    /* Isi = font-family: 'Open Sans', sans-serif;
    Head = font-family: 'Zen Antique Soft', serif; */

    div.main {
      margin-top: 151.18110236px;
      margin-left: 151.18110236px;
      margin-right: 113.38582677px;
      margin-bottom: 151.18110236px;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }

    div.row.header-area {
      margin-bottom: 1em;
    }

    div.hero-right {
      float: right;
      margin-right: 9em;

    }

    p.head-title {
      font-family: 'Zen Antique Soft', serif;
      color: #4E9F3D;
      font-size: 32px;
    }

    p.head-sub_title {
      font-family: 'Zen Antique Soft', serif;
      color: #191919;
      font-size: 15px;
    }

    p.head-sub_title_customer {

      font-family: 'Zen Antique Soft', serif;
      color: #191919;
      font-size: 15px;
      margin-top: 5px;
      margin-bottom: 0;
    }

    p.isi-head {
      font-family: 'Open Sans', sans-serif;
      font-size: 12px;
      margin-top: -1em;
      font-style: italic;
      margin-left: 4px;
    }


    table.tbl-header {
      width: auto;
      margin-top: 4em;
      font-size: 14px;
      font-family: 'Open Sans', sans-serif;
    }

    table.tbl-header tr.head-tbl {
      background-color: #4E9F3D;
      color: #ffffff;
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
      background-color: #4E9F3D;
      color: #ffffff;
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

      div.row.header-area div.col {
        margin-bottom: 1em;
        width: 100%;
      }

      div.hero-right {
        width: 100%;
        z-index: 22;
        position: relative;
        right: 0;
        left: 40%;
      }

      p.head-title {
        font-family: 'Zen Antique Soft', serif;
        color: #4E9F3D;
        font-size: 28px;
      }

      p.head-sub_title {
        font-family: 'Zen Antique Soft', serif;
        color: #191919;
        font-size: 15px;
      }

      p.head-sub_title_customer {
        font-family: 'Zen Antique Soft', serif;
        color: #191919;
        font-size: 15px;
        margin: 0;
      }

      p.isi-head {
        font-family: 'Open Sans', sans-serif;
        font-size: 11px;
        margin-top: -1.6em;
        font-style: italic;
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

      div.main {
        margin-top: 151.18110236px;
        margin-left: 128.50393701px;
        margin-right: 113.38582677px;
        margin-bottom: 151.18110236px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
      }

      table.tbl-header {
        margin-top: 4em;
        font-size: 14px;
        font-family: 'Open Sans', sans-serif;
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
        background-color: #4E9F3D;
        color: #ffffff;
      }

    }
  </style>
</head>

<body>
  <div class="main">
    <div class="row header-area">
      <div class="col">
        <img class="img-header" src="<?= base_url('img/logo-tagline.png'); ?>" alt="">
        <table class="tbl-header">
          <tr class="head-tbl">
            <td>
              Customer :
            </td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td style="font-size:small;">
              No : <?= $detail_procurement['0']['no_spph_masuk']; ?>
            </td>
          </tr>
          <tr>
            <td style="font-size:small;">
              Cp : <?= ucwords($detail_procurement['0']['pic']); ?>
            </td>
          </tr>
          <tr>
            <td>
              <p class="head-sub_title_customer"><?= $detail_procurement['0']['nama_perusahaan']; ?></p>
            </td>
          </tr>
          <tr>
            <td style="font-size: small;">
              <?= $detail_procurement['0']['alamat']; ?>
            </td>
          </tr>
          <tr>
            <td style="font-size: small;">
              <?= $detail_procurement['0']['no_telp']; ?>
            </td>
          </tr>
          <tr>
            <td style=" font-size: small;">
              <?= $detail_procurement['0']['email']; ?>
            </td>
          </tr>
        </table>
      </div>
      <div class="col">
        <div class="hero-right">
          <p class="head-title">Quotation</p>
          <p class="head-sub_title">PT. Wakabe Indonesia</p>
          <p class="isi-head">No : <?= $detail_procurement['0']['no_procurement']; ?></p>
          <p class="isi-head">Head Office :</p>
          <p class="isi-head">Jl. Raya Berlian Biru No.48, 50 PPS</p>
          <p class="isi-head">Suci, Manyar, Gresik 61151</p>
          <p class="isi-head">Tel : +62 31 9900 6778 | Fax : +62 31 9900 6779</p>
          <p class="isi-head">Email : wakabe.indonesia@gmail.com</p>
        </div>
      </div>
    </div>

    <br>

    <br>
    <p>Quotation prepared by :</p>

    <table class="table-bordered table-permintaan" border="1" cellpadding="7">
      <thead>
        <tr align="center">
          <th scope="col" style="width: 2%;">No</th>
          <th scope="col" style="width: 64%;">Item</th>
          <th scope="col" style="width: 3%;">Qty</th>
          <th scope="col" style="width: 1%;">UOM</th>
          <th scope="col" style="width: 10%;">Unit Price</th>
          <th scope="col" style="width: 10%;">Line Total</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($detail_procurement as $isi) : ?>
          <tr>
            <td align="center" scope="row"><?= $i++; ?></td>
            <td scope="row"><?= $isi['nama_barang']; ?></td>
            <td align="center" scope="row"><?= $isi['volume']; ?></td>
            <td align="center" scope="row"><?= $isi['satuan']; ?></td>
            <td scope="row" class="harga_satuan"><?= number_format($isi['hj_satuan'], 2, ',', '.'); ?></td>
            <td scope="row" class="total"><?= number_format($isi['hj_total'], 2, ',', '.'); ?></td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td colspan="5" align="center"><b>Total</b></td>
          <td><b><?= number_format($total, 2, ',', '.'); ?></b></td>
        </tr>
        <script>

        </script>
      </tbody>
    </table>
    <br>
    <p>Don't hesitate contact me if you have any question, thank You.</p>
    <br>
    <div class="place-foot">
      <p>Warm Regards,</p>
      <div style="height: 50px;"></div>
      <p class="foot-name">Marketing Team</p>
      <p class="foot">Wakabe Indonesia</p>
    </div>
  </div>





  <script type="text/javascript">
    window.print();
  </script>

</body>

</html>