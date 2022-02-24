  <?= $this->extend('templates/index'); ?>
  <?= $this->section('page-content'); ?>
  <!-- Change color theme  -->
  <?php

    use phpDocumentor\Reflection\Types\Null_;

    $inisial = '';
    $icon = '';
    if (in_groups('superadmin')) {
        $inisial = 'hijau';
        $icon = 'hijau';
    } elseif (in_groups('admin')) {
        $inisial = 'biru';
        $icon = 'biru';
    } elseif (in_groups('marketing')) {
        $inisial = 'pink';
        $icon = 'pink';
    } else {
        $inisial = 'hijau';
        $icon = 'hijau';
    } ?>
  <!-- End change -->
  <div class="container">
      <!-- Header document -->
      <div class="row">
          <div class="col">
              <table style="width: 100%; box-shadow:none; margin-left:1em;">
                  <tr>
                      <td style="width: 20%;"><b>Perusahaan</b></td>
                      <td style="width: 5%;"><b>:</b></td>
                      <td style="width: 75%;"><b><?= $detailProcess['0']['nama_perusahaan']; ?></b></td>
                  </tr>
                  <tr>
                      <td style="width: 20%;"><b>Status Pajak</b></td>
                      <td style="width: 5%;"><b>:</b></td>
                      <td style="width: 75%;"><b>Wapu</b></td>
                  </tr>
                  <tr>
                      <td style="width: 20%;"><b>Pekerjaan</b></td>
                      <td style="width: 5%;"><b>:</b></td>
                      <td style="width: 75%;">
                          <?php
                            $no_procurement = $detailProcess['0']['no_procurement'];
                            $pekerjaan = $detailProcess['0']['pekerjaan'];
                            ?>
                          <?php if ($pekerjaan == '-') : ?>
                              <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="pekerjaan" onblur="sendPekerjaan('<?= $no_procurement; ?>')">
                          <?php endif; ?>
                          <?php if ($pekerjaan != '-') : ?>
                              <span><?= $pekerjaan; ?></span>
                          <?php endif; ?>
                      </td>
                  </tr>
              </table>
          </div>
          <div class="col">
              <table style="width: 100%; box-shadow:none; margin-left:14em; margin-right:0px">
                  <tr>
                      <td style="width: 20%;"><b>Tanggal</b></td>
                      <td style="width: 5%;"><b>:</b></td>
                      <td style="width: 75%;"><b><?= $detailProcess['0']['tanggal']; ?></b></td>
                  </tr>
                  <tr>
                      <td style="width: 20%;"><b>Nomor</b></td>
                      <td style="width: 5%;"><b>:</b></td>
                      <td><b><?= $detailProcess['0']['no_spph_masuk']; ?></b></td>
                  </tr>
                  <tr>
                      <td><b>Cp</b></td>
                      <td><b>:</b></td>
                      <td><b><?= $detailProcess['0']['pic']; ?></b></td>
                  </tr>
              </table>
          </div>
      </div>

      <!-- table content -->
      <div class="row mt-3">
          <div class="col">
              <table class="table table-bordered table-sm">
                  <thead class="thead-dark">
                      <tr>
                          <th style="width: 43.8%; background-color:#FF1700; border-color:#FF1700;">I. DIRECT COSTS</th>
                          <th style="width: 21%; text-align:center; background-color:#FF8E00; border-color:#FF8E00">Harga Beli</th>
                          <th style="width: 14%; text-align:center; background-color: #FFE400; border-color:#FFE400;">Margin</th>
                          <th style="text-align:center; background-color: #FFB5B5; border-color:#FFB5B5;">Harga Jual</th>
                      </tr>
                  </thead>
              </table>
              <table class="table table-bordered table-sm" id="table_analisa" style="margin-top: -1em; width: 100%; font-size:medium; background-color: #FAFAFA;">
                  <thead>
                      <tr>
                          <th style="width: 2%; color:#FF1700;">No</th>
                          <th style=" width: 29%; color:#FF1700;">Deskripsi Pekerjaan</th>
                          <th style="width: 5%; color:#FF1700; text-align:center;">Volume</th>
                          <th style=" width: 5%; color:#FF1700; text-align:center;">Satuan</th>

                          <th style="width: 10.5%; color:#FF8E00;">Harga Satuan</th>
                          <th style="width: 10.5%; color:#FF8E00; text-align:center;">Jumlah</th>
                          <th style="width: 5%; color: #FFE400; text-align:center;">%</th>
                          <th style="width: 9%; color: #FFE400; text-align:center;">Nilai</th>
                          <th style="color: #FFB5B5; text-align:center;">Harga Satuan</th>
                          <th style="color: #FFB5B5; text-align:center;">Jumlah</th>
                      </tr>
                  </thead>
                  <tbody style="font-size: small;">
                      <tr>
                          <th colspan="10">I. MATERIAL</th>
                      </tr>
                      <?php $no = 1; ?>
                      <?php foreach ($detailProcess as $detail) : ?>
                          <tr>
                              <td style="width: 2%; text-align:center;"><?= $no++; ?></td>
                              <td style="width: 29%;"><?= $detail['nama_barang']; ?></td>
                              <td style="width: 5%; text-align:center;"><?= $detail['volume']; ?></td>
                              <td style="width: 5%; text-align:center;"><?= $detail['satuan']; ?></td>
                              <td style="width: 10.5%; text-align:center;">Rp <?= number_format($detail['hb_satuan'], 0, ',', '.'); ?></td>
                              <td style="width: 10.5%; text-align:center;">Rp <?= number_format($detail['hb_total'], 0, ',', '.'); ?></td>
                              <td style="width: 2%; text-align:center;"><?php $margin = $detail['margin'];
                                                                        if ($margin > 0) : ?>
                                      <?= $detail['margin']; ?>
                                  <?php endif; ?>
                                  <?php if ($detail['margin'] == 0) : ?>
                                      <input type="text" style="width: 1.6em; border:1px solid #D5D5D5; border-radius:5px;" name="margin" class="margin" onblur=hitung(<?= $detail['id_penawaran']; ?>)>
                                  <?php endif; ?>
                              </td>
                              <td style="width: 5%; text-align:center;">Rp <span id="nilai_margin"> <?= number_format($detail['nilai_margin'], 0, ',', '.'); ?></span></td>
                              <td style="text-align:center;">Rp <?= number_format($detail['hj_satuan'], 0, ',', '.'); ?></td>
                              <td style="text-align: center;">Rp <?= number_format($detail['hj_total'], 0, ',', '.'); ?></td>
                          </tr>
                      <?php endforeach; ?>
                      <tr>
                          <td colspan="4"></td>
                          <?php $hb_total = $total = $hj_tot = 0;
                            foreach ($detailProcess as $tot_hb) : ?>
                              <?php $total += $tot_hb['hb_total'];  ?>
                              <?php $hj_tot += $tot_hb['hj_total']; ?>
                          <?php endforeach; ?>
                          <input type="text" class="hb_total" value="<?= $total; ?>" hidden>
                          <td style="text-align: center;"><b>JUMLAH</b></td>
                          <td style="text-align: center;"><b>Rp <?= number_format($total, 0, ',', '.'); ?></b></td>
                          <input type="text" class="hj_total" value="<?= $hj_tot; ?>" hidden>
                          <td colspan="2" style="text-align:center;"></td>
                          <td style="text-align: center;"><b>JUMLAH</b></td>
                          <td style="text-align: center;"><b>Rp <?= number_format($hj_tot, 0, ',', '.'); ?></b></td>
                      </tr>

                      <tr>
                          <th colspan="10">II. PEKERJAAN JASA</th>
                      </tr>
                      <tr>
                          <td style="text-align: center;">1</td>

                          <td colspan="3">
                              <?php
                                $no_procurement = $detailProcess['0']['no_procurement'];
                                $jasa = $detailProcess['0']['jasa'];
                                ?>
                              <?php if ($jasa == null) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="jasa" placeholder="Masukkan pekerjaan jasa">
                              <?php endif; ?>
                              <?php if ($jasa != null) : ?>
                                  <?= $jasa; ?>
                              <?php endif; ?>
                          </td>
                          <td style="text-align: center;">
                              <?php
                                $no_procurement = $detailProcess['0']['no_procurement'];
                                $harga_jasa = $detailProcess['0']['harga_jasa'];
                                ?>
                              <?php if ($harga_jasa == 0) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="harga_jasa" placeholder="Masukkan harga jasa" onblur="sendJasa('<?= $no_procurement; ?>')">
                              <?php endif; ?>
                              <?php if ($harga_jasa != 0) : ?>
                                  Rp <?= number_format($harga_jasa, 0, ',', '.'); ?>
                              <?php endif; ?>
                          </td>
                          <td style="text-align: center;">Rp <?= number_format($harga_jasa, 0, ',', '.'); ?></td>
                          <td colspan="2"></td>
                          <td style="text-align: center;">Rp <?= number_format($harga_jasa, 0, ',', '.'); ?></td>
                          <td style="text-align: center;">Rp <?= number_format($harga_jasa, 0, ',', '.'); ?></td>
                      </tr>
                      <tr>
                          <input type="text" value="<?= $harga_jasa; ?>" class="hjasa_total" hidden>
                          <td colspan="4"></td>
                          <td style="text-align: center;"><b>JUMLAH</b></td>
                          <td style="text-align: center;"><b>Rp <?= number_format($harga_jasa, 0, ',', '.'); ?></b></td>
                          <td colspan="2"></td>
                          <td style="text-align: center;"><b>JUMLAH</b></td>
                          <td style="text-align: center;"><b>Rp <?= number_format($harga_jasa, 0, ',', '.'); ?></b></td>
                      </tr>
                      <tr>
                          <td colspan="10">-</td>
                      </tr>
                      <tr style="background-color: #DADDFC; color:#000000;">
                          <td colspan="4"></td>
                          <td style="text-align: center;"><b>SUB TOTAL</b></td>
                          <td><b>Rp <span id="subtotal_hb"></span></b></td>
                          <td colspan="3"></td>
                          <td><b>Rp <span id="subtotal_hj"></span></b></td>
                          <input type="text" id="sub_hj" readonly hidden>
                      </tr>
                  </tbody>
              </table>

              <!------------------------------ Indirect cost ----------------------------------------------->
              <table class="table table-bordered table-sm">
                  <thead class="thead-dark">
                      <tr>
                          <th colspan="10" style="width: 43.8%; background-color:#FF1700; border-color:#FF1700;">II. INDIRECT COSTS</th>
                  </thead>
              </table>
              <table class="table table-bordered table-sm" id="table_analisa" style="margin-top: -1em; width: 100%; background-color: #FAFAFA;">
                  <thead>
                      <tr>
                          <th style="width: 2%; color:#FF1700; text-align:center;">No</th>
                          <th style=" width: 25%; color:#FF1700; text-align:center;">Deskripsi Biaya</th>
                          <th style="width: 6%; color:#FF1700; text-align:center;">Volume</th>
                          <th style=" width: 6%; color:#FF1700; text-align:center;">Satuan</th>
                          <th style="width: 25%; color:#FF8E00; text-align:center;">Jumlah</th>
                  </thead>
                  <tbody style="font-size: small;">

                      <!-- Cost OF Money  -->
                      <tr>
                          <td style="text-align: center;">1</td>
                          <td>Cost of Money</td>
                          <td style="text-align: center;">
                              <?php if ($detailProcess['0']['cost_of_money_volume'] == null) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="cost_of_money_volume" onblur="hitungIndirectCost_COM()" required>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['cost_of_money_volume'] != null) : ?>
                                  <span><?= $detailProcess['0']['cost_of_money_volume']; ?></span>
                              <?php endif; ?>
                          </td>
                          <td style="text-align: center;">%</td>
                          <td style="text-align: center;"><?php if ($detailProcess['0']['jumlah_COM'] == 0) : ?>
                                  <p>Rp <span id="jumlah_COM"></span></p>
                                  <input type="text" class="jumlah_COM" readonly hidden>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['jumlah_COM'] != 0) : ?>
                                  Rp <span id="jumlah_COM"><?= number_format($detailProcess['0']['jumlah_COM'], 0, ',', '.'); ?></span>
                              <?php endif; ?>

                              <script>
                                  function hitungIndirectCost_COM() {
                                      var hb_total = $('.hb_total').val();
                                      var harga_jasa = $('.hjasa_total').val();
                                      var hitung = parseInt(hb_total) + parseInt(harga_jasa);

                                      var delivery_cost_volume = $('.cost_of_money_volume').val();
                                      var persen = delivery_cost_volume / 100;
                                      var total = hitung * persen;

                                      var bilangan = total;
                                      var reverse = bilangan.toString().split('').reverse().join(''),
                                          ribuan = reverse.match(/\d{1,3}/g);
                                      ribuan = ribuan.join('.').split('').reverse().join('');
                                      document.getElementById('jumlah_COM').innerHTML = ribuan;
                                      $('.jumlah_COM').val(total);
                                  }
                              </script>

                          </td>
                      </tr>

                      <!---------------------- Delivery Cost ------------------------------->
                      <tr>
                          <td style="text-align: center;">2</td>
                          <td>Delivery cost</td>
                          <td style="text-align: center;">
                              <?php if ($detailProcess['0']['delivery_cost_volume'] == null) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="delivery_cost_volume" required>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['delivery_cost_volume'] != null) : ?>
                                  <span><?= $detailProcess['0']['delivery_cost_volume']; ?></span>
                              <?php endif; ?>
                          </td>
                          <td style="text-align: center;"><?php if ($detailProcess['0']['delivery_cost_satuan'] == null) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="delivery_cost_satuan" required>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['delivery_cost_satuan'] != null) : ?>
                                  <span><?= $detailProcess['0']['delivery_cost_satuan']; ?></span>
                              <?php endif; ?>
                          </td>
                          <td style="text-align: center;"><?php if ($detailProcess['0']['jumlah_DC'] == 0) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="jumlah_DC" id="jumlah_DC">
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['jumlah_DC'] != 0) : ?>
                                  Rp <span id="jumlah_DC"><?= number_format($detailProcess['0']['jumlah_DC'], 0, ',', '.'); ?></span>
                              <?php endif; ?>
                          </td>
                      </tr>

                      <!-- ----------------PPN 10% ------------------------------------->
                      <tr>
                          <td style="text-align: center;">3</td>
                          <td>PPN 10%</td>
                          <td style="text-align: center;">
                              <?php if ($detailProcess['0']['pph_10_volume'] == null) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="pph_10_volume" onblur="hitungIndirectCost_PPH10()" required>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['pph_10_volume'] != null) : ?>
                                  <span><?= $detailProcess['0']['pph_10_volume']; ?></span>
                              <?php endif; ?>
                          </td>
                          <td style="text-align: center;">%</td>
                          <td style="text-align: center;"><?php if ($detailProcess['0']['pph_10'] == 0) : ?>
                                  <p>Rp <span id="pph_10"></span></p>
                                  <input type="text" class="pph_10" readonly hidden>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['pph_10'] != 0) : ?>
                                  Rp <span id="pph_10"><?= number_format($detailProcess['0']['pph_10'], 0, ',', '.'); ?></span>
                              <?php endif; ?>

                              <script>
                                  function hitungIndirectCost_PPH10() {
                                      var hb_total = $('.hb_total').val();
                                      var harga_jasa = $('.hjasa_total').val();
                                      var hitung = parseInt(hb_total) + parseInt(harga_jasa);

                                      var pph_10_volume = $('.pph_10_volume').val();
                                      var persen = pph_10_volume / 100;
                                      var total = hitung * persen;

                                      var bilangan = total;
                                      var reverse = bilangan.toString().split('').reverse().join(''),
                                          ribuan = reverse.match(/\d{1,3}/g);
                                      ribuan = ribuan.join('.').split('').reverse().join('');
                                      document.getElementById('pph_10').innerHTML = ribuan;
                                      $('.pph_10').val(total);
                                  }
                              </script>

                          </td>
                      </tr>

                      <!-------------------------- PPH 22  --------------------------------->
                      <tr>
                          <td style="text-align: center;">4</td>
                          <td>PPH 22</td>
                          <td style="text-align: center;">
                              <?php if ($detailProcess['0']['pph_22_volume'] == null) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="pph_22_volume" onblur="hitungIndirectCost_PPH22()" required>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['pph_22_volume'] != null) : ?>
                                  <span><?= $detailProcess['0']['pph_22_volume']; ?></span>
                              <?php endif; ?>
                          </td>
                          <td style="text-align: center;">%</td>
                          <td style="text-align: center;"><?php if ($detailProcess['0']['pph_22'] == 0) : ?>
                                  <p>Rp <span id="pph_22"></span></p>
                                  <input type="text" class="pph_22" readonly hidden>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['pph_22'] != 0) : ?>
                                  Rp <span id="pph_22"><?= number_format($detailProcess['0']['pph_22'], 0, ',', '.'); ?></span>
                              <?php endif; ?>

                              <script>
                                  function hitungIndirectCost_PPH22() {
                                      var hb_total = $('.hb_total').val();
                                      var harga_jasa = $('.hjasa_total').val();
                                      var hitung = parseInt(hb_total) + parseInt(harga_jasa);

                                      var pph_22_volume = $('.pph_22_volume').val();
                                      var persen = pph_22_volume / 100;
                                      var total = hitung * persen;

                                      var bilangan = total;
                                      var reverse = bilangan.toString().split('').reverse().join(''),
                                          ribuan = reverse.match(/\d{1,3}/g);
                                      ribuan = ribuan.join('.').split('').reverse().join('');
                                      document.getElementById('pph_22').innerHTML = ribuan;
                                      $('.pph_22').val(total);
                                  }
                              </script>

                          </td>
                      </tr>

                      <!---------------- PPH 23  ----------------------------------------->
                      <tr>
                          <td style="text-align: center;">5</td>
                          <td>PPH 23</td>
                          <td style="text-align: center;">
                              <?php if ($detailProcess['0']['pph_23_volume'] == null) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="pph_23_volume" onblur="hitungIndirectCost_PPH23()" required>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['pph_23_volume'] != null) : ?>
                                  <span><?= $detailProcess['0']['pph_23_volume']; ?></span>
                              <?php endif; ?>
                          </td>
                          <td style="text-align: center;">%</td>
                          <td style="text-align: center;">
                              <?php if ($detailProcess['0']['pph_23'] == 0) : ?>
                                  <p>Rp <span id="pph_23" class="pph_23"></span></p>
                                  <input type="text" class="pph_23" name="pph_23" readonly hidden>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['pph_23'] != 0) : ?>
                                  Rp <span id="pph_23"><?= number_format($detailProcess['0']['pph_23'], 0, ',', '.'); ?></span>
                              <?php endif; ?>

                              <script>
                                  function hitungIndirectCost_PPH23() {
                                      var hb_total = $('.hb_total').val();
                                      var harga_jasa = $('.hjasa_total').val();
                                      var hitung = parseInt(hb_total) + parseInt(harga_jasa);

                                      var pph_23_volume = $('.pph_23_volume').val();
                                      var persen = pph_23_volume / 100;
                                      var total = hitung * persen;

                                      var bilangan = total;
                                      var reverse = bilangan.toString().split('').reverse().join(''),
                                          ribuan = reverse.match(/\d{1,3}/g);
                                      ribuan = ribuan.join('.').split('').reverse().join('');
                                      document.getElementById('pph_23').innerHTML = ribuan;
                                      $('.pph_23').val(total);
                                  }
                              </script>

                          </td>
                      </tr>

                      <!-------------------- PPH Final  ------------------------------------>
                      <tr>
                          <td style="text-align: center;">6</td>
                          <td>PPH FINAL</td>
                          <td style="text-align: center;">
                              <?php if ($detailProcess['0']['pph_final_volume'] == null) : ?>
                                  <input type="text" style="width: 100%; border: 1px solid #D5D5D5; border-radius:20px;" class="pph_final_volume" onblur="hitungIndirectCost_PPHFINAL()" required>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['pph_final_volume'] != null) : ?>
                                  <span><?= $detailProcess['0']['pph_final_volume']; ?></span>
                              <?php endif; ?>
                          </td>
                          <td style="text-align: center;">%</td>
                          <td style="text-align: center;">
                              <?php $no_procurement = $detailProcess['0']['no_procurement'];
                                if ($detailProcess['0']['pph_final'] == 0) : ?>
                                  <p>Rp <span id="pph_final" class="pph_final"></span></p>
                                  <input type="text" class="pph_final" name="pph_final" readonly hidden>
                              <?php endif; ?>
                              <?php if ($detailProcess['0']['pph_final'] != 0) : ?>
                                  Rp <span id="pph_final"><?= number_format($detailProcess['0']['pph_final'], 0, ',', '.'); ?></span>
                              <?php endif; ?>
                              <input type="text" class="no_procurement" value="<?= $no_procurement; ?>" hidden>

                              <script>
                                  function hitungIndirectCost_PPHFINAL() {
                                      var cost_of_money_volume = $('.cost_of_money_volume').val();
                                      var delivery_cost_volume = $('.delivery_cost_volume').val();
                                      var jumlah_DC = $('.jumlah_DC').val();
                                      var delivery_cost_satuan = $('.delivery_cost_satuan').val();
                                      var pph_10_volume = $('.pph_10_volume').val();
                                      var pph_22_volume = $('.pph_22_volume').val();
                                      var pph_23_volume = $('.pph_23_volume').val();

                                      if (cost_of_money_volume == "" | delivery_cost_volume == "" | delivery_cost_satuan == "" | jumlah_DC == "" | pph_10_volume == "" | pph_22_volume == "" | pph_23_volume == "") {
                                          Swal.fire({
                                              icon: 'error',
                                              title: 'Oops...',
                                              text: 'Isi terlebih dahulu semua field diatas!'
                                          })
                                      } else {
                                          var hb_total = $('.hb_total').val();
                                          var harga_jasa = $('.hjasa_total').val();
                                          var hitung = parseInt(hb_total) + parseInt(harga_jasa);
                                          var pph_final = $('.pph_final_volume').val();
                                          var persen = pph_final / 100;
                                          var total = hitung * persen;
                                          var bilangan = total;
                                          var reverse = bilangan.toString().split('').reverse().join(''),
                                              ribuan = reverse.match(/\d{1,3}/g);
                                          ribuan = ribuan.join('.').split('').reverse().join('');
                                          document.getElementById('pph_final').innerHTML = ribuan;
                                          $('.pph_final').val(total);
                                          var no_procurement = $('.no_procurement').val();
                                          indirectCost(no_procurement);
                                      }

                                  }
                              </script>

                          </td>
                      </tr>

                      <!-- ---------------- Sub Total Indirect cost ------------------------>
                      <tr>
                          <td colspan="2"></td>
                          <td style="text-align:center;"><b>SUB TOTAL</b></td>
                          <?php
                            $jumlah_COM = $detailProcess[0]['jumlah_COM'];
                            $jumlah_DC = $detailProcess[0]['jumlah_DC'];
                            $pph_10 = $detailProcess[0]['pph_10'];
                            $pph_22 = $detailProcess[0]['pph_22'];
                            $pph_23 = $detailProcess[0]['pph_23'];
                            $pph_final = $detailProcess[0]['pph_final'];
                            $jumlahkan = $jumlah_COM + $jumlah_DC + $pph_10 + $pph_22 + $pph_23 + $pph_final;
                            ?>
                          <input type="text" class="sub_indirect" value="<?= $jumlahkan; ?>" readonly hidden>
                          <td style="text-align: center;"><b>Rp <span id=""></span> <?= number_format($jumlahkan, 0, ',', '.'); ?></b></td>
                      </tr>
                      <tr style="background-color: #DADDFC; color:#000000;">
                          <td colspan="2"></td>
                          <td style="text-align: center;"><b>JUMLAH</b></td>
                          <td style="text-align: center;"><b>Rp <span id="total_hb"></span></b></td>
                          <td style="text-align: right;"><b class="mr-2">Rp <span id="total_hj"></span></b></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
      <div class="row">
          <div class="col-6 mt-3">
              <table style="width: 100%; font-size:small; text-align: center; background-color: #FAFAFA;" class="table table-bordered">
                  <tr style="background-color: #FFCCD2; color:#000000;">
                      <th>No</th>
                      <th>Deskripsi</th>
                      <th style="width: 20%;">Margin</th>
                      <th>Total</th>
                  </tr>
                  <tr style="padding-left: 2em;">
                      <td><b>I</b></td>
                      <td><b>Gross Profit</b></td>
                      <td></td>
                      <td><b>Rp</b> <span id="gross_profit"></span></td>
                      <input type="text" class="get_total_grossProfit" readonly hidden>
                  </tr>
                  <tr>
                      <td><b>II</b></td>
                      <td><b>Marketing Cost</b></td>
                      <td>
                          <?php $no_procurement = $detailProcess['0']['no_procurement'];
                            if ($detailProcess[0]['margin_marketing_cost'] == null) : ?>
                              <input type="text" style="width: 50%; border-radius:0.2em; border-style:none; border: 1px solid #EDEDED;" class="margin_marketing_cost" onblur="marketing_cost('<?= $no_procurement; ?>')"><span style="margin-left: 0.5em;">%</span>
                          <?php endif; ?>
                          <?php if ($detailProcess[0]['margin_marketing_cost'] != null) : ?>
                              <b><?= $detailProcess[0]['margin_marketing_cost']; ?>%</b>
                          <?php endif; ?>
                      </td>
                      <td><b>Rp</b> <span><?= number_format($detailProcess[0]['marketing_cost'], 0, ',', '.'); ?></span></td>
                  </tr>
                  <tr>
                      <td><b>III</b></td>
                      <td><b>Nett Profit</b></td>
                      <td></td>
                      <td><b>Rp <span><?= number_format($detailProcess[0]['nett_profit'], 0, ',', '.'); ?></span></b></td>
                  </tr>
                  <tr>
                      <td><b>IV</b></td>
                      <td><b>Margin</b></td>
                      <td></td>
                      <td><?= $detailProcess[0]['final_margin']; ?><b>%</b></td>
                  </tr>

              </table>
          </div>
          <div class="col-6 mt-3">
              <table class="table table-bordered" style="font-size:small; background-color: #FAFAFA;">
                  <thead>
                      <tr style="background-color: #FFCCD2; color:#000000;">
                          <th style="border-right: 1px solid #EDEDED;">Jabatan</th>
                          <th>Procurement Staff</th>
                          <th>Marketing Officer</th>
                          <th>Direktur</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td style="width: 10%; border-right: 1px solid #EDEDED;"><b>Nama</b></td>
                          <td><?= $detailProcess[0]['approved_by']; ?></td>
                          <td><?= $detailProcess[0]['inputed_by']; ?></td>
                          <td>Deddy Tri Ariyanto, S.Si</td>
                      </tr>
                      <tr>
                          <td style="border-right: 1px solid #EDEDED;"><b>Tanda Tangan</b></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>

      <div id="btn_reset_indirect" style="position:relative; float: right; margin-right:-2.8em; margin-bottom:1em; margin-top:-2.8em;">
          <?php $no_procurement = $detailProcess[0]['no_procurement'];
            $no_spph_keluar = $detailProcess[0]['no_spph_keluar'];
            ?>
          <!-- <a href="<?= base_url('admin/printAnalisa/' . $no_spph_keluar); ?>" target="_BLANK" class="btn btn-success d-none d-sm-inline-block btn-sm"><i class="fas fa-print"></i>Print Analisa</a> -->
          <a href="<?= base_url('admin/printQuotation/' . $no_procurement); ?>" class="btn btn-primary d-none d-sm-inline-block btn-sm mr-3 <?= $icon; ?>"><i class="fas fa-print"></i> Print Quotation</a>
          <button class="btn btn-danger btn-sm mr-5" onclick="reset('<?= $no_procurement; ?>')">reset</button>
      </div>
  </div>

  <!---------------------------------------- Jquery  ------------------------------------>
  <script type="text/javascript">
      $(document).ready(function() {
          subTotalHb();
          subTotalHj();
          total();
          showBtnResetIndirect();

      });

      function printQuotation(no_procurement) {
          var no_procurement = no_procurement;
          $.ajax({
              type: 'post',
              url: '<?= base_url('admin/printQuotation'); ?>',
              data: {
                  no_procurement: no_procurement
              },
              success: function(response) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Selamat',
                      text: 'Data berhasil disimpan!',
                      confirmButtonColor: '#F2789F',
                      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                      confirmButtonAriaLabel: 'Thumbs up, great!'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.reload(true)
                      }
                  })

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
              }
          });

      }

      function reset(no_procurement) {
          var no_procurement = no_procurement;
          $.ajax({
              type: 'post',
              url: '<?= base_url('admin/reset_analisa_harga'); ?>',
              data: {
                  no_procurement: no_procurement
              },
              success: function(response) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Selamat',
                      text: 'Data berhasil disimpan!',
                      confirmButtonColor: '#F2789F',
                      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                      confirmButtonAriaLabel: 'Thumbs up, great!'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.reload(true)
                      }
                  })

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
              }
          });

      }

      function subTotalHb() {
          var hb_total = $('.hb_total').val();
          var harga_jasa = $('.hjasa_total').val();
          var hitung = parseInt(hb_total) + parseInt(harga_jasa);
          var bilangan = hitung;

          var reverse = bilangan.toString().split('').reverse().join(''),
              ribuan = reverse.match(/\d{1,3}/g);
          ribuan = ribuan.join('.').split('').reverse().join('');


          document.getElementById('subtotal_hb').innerHTML = ribuan;

      }

      function subTotalHj() {
          var hb_total = $('.hj_total').val();
          var harga_jasa = $('.hjasa_total').val();
          var hitung = parseInt(hb_total) + parseInt(harga_jasa);
          var bilangan = hitung;

          var reverse = bilangan.toString().split('').reverse().join(''),
              ribuan = reverse.match(/\d{1,3}/g);
          ribuan = ribuan.join('.').split('').reverse().join('');


          document.getElementById('subtotal_hj').innerHTML = ribuan;
          $('#sub_hj').val(hitung);
      }

      function total() {

          var sub_indirect = $('.sub_indirect').val();

          //   subtotal harga beli
          var hb_total = $('.hb_total').val();
          var harga_jasa = $('.hjasa_total').val();
          var sub_hb = parseInt(hb_total) + parseInt(harga_jasa);

          //   subtotal harga jual
          var hb_total = $('.hj_total').val();
          var harga_jasa = $('.hjasa_total').val();
          var sub_hj = parseInt(hb_total) + parseInt(harga_jasa);

          var total_hargaBeli = parseInt(sub_hb) + parseInt(sub_indirect);

          var bilangan = total_hargaBeli;
          var reverse = bilangan.toString().split('').reverse().join(''),
              total_hb = reverse.match(/\d{1,3}/g);
          total_hb = total_hb.join('.').split('').reverse().join('');

          var bilangan1 = sub_hj;
          var reverse = bilangan1.toString().split('').reverse().join(''),
              total_hj = reverse.match(/\d{1,3}/g);
          total_hj = total_hj.join('.').split('').reverse().join('');

          var gross_profit = sub_hj - total_hargaBeli;
          var bilangan2 = gross_profit;
          var reverse = bilangan2.toString().split('').reverse().join(''),
              total_grossProfit = reverse.match(/\d{1,3}/g);
          total_grossProfit = total_grossProfit.join('.').split('').reverse().join('');

          document.getElementById('gross_profit').innerHTML = total_grossProfit;
          $('.get_total_grossProfit').val(gross_profit);
          document.getElementById('total_hb').innerHTML = total_hb;
          document.getElementById('total_hj').innerHTML = total_hj;
      }

      function sendJasa(no_procurement) {
            var no_procurement = no_procurement;
            var jasa = $('.jasa').val();
            var harga_jasa = $('.harga_jasa').val();
          $.ajax({
              type: 'post',
              url: '<?= base_url('admin/sendJasaAnalisa'); ?>',
              data: {
                  no_procurement: no_procurement,
                  jasa: jasa,
                  harga_jasa: harga_jasa
              },
              success: function(response) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Selamat',
                      text: 'Data berhasil disimpan!',
                      confirmButtonColor: '#F2789F',
                      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                      confirmButtonAriaLabel: 'Thumbs up, great!'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.reload(true)
                      }
                  })

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
              }
          });

      }

      function marketing_cost(no_procurement) {
          var gross_profit = $('.get_total_grossProfit').val();
          var no_procurement = no_procurement;
          var margin_marketing_cost = $('.margin_marketing_cost').val();
          var sub_hj = $('#sub_hj').val();
          $.ajax({
              type: 'post',
              url: '<?= base_url('admin/last_table'); ?>',
              data: {
                  no_procurement: no_procurement,
                  gross_profit: gross_profit,
                  margin_marketing_cost: margin_marketing_cost,
                  sub_hj: sub_hj
              },
              success: function(response) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Selamat',
                      text: 'Data berhasil disimpan!',
                      confirmButtonColor: '#F2789F',
                      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                      confirmButtonAriaLabel: 'Thumbs up, great!'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.reload(true)
                      }
                  })

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
              }
          });

      }

      function showBtnResetIndirect() {
          var nilai_margin = document.getElementById('nilai_margin').innerHTML;
          var nilai = parseInt(nilai_margin);


          if (nilai == 0) {
              $('#btn_reset_indirect').hide();
          } else {
              $('#btn_reset_indirect').show();
          }
      }

      function hitung(id_penawaran) {
          var margin = $('.margin').val();
          $.ajax({
              type: 'post',
              url: '<?= base_url('admin/hitung_analisa'); ?>',
              data: {
                  id_penawaran: id_penawaran,
                  margin: margin
              },
              success: function(response) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Selamat',
                      text: 'Data berhasil disimpan!',
                      confirmButtonColor: '#F2789F',
                      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                      confirmButtonAriaLabel: 'Thumbs up, great!'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.reload(true)
                      }
                  })

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
              }
          });
      }

      function sendPekerjaan(no_procurement) { 
          var pekerjaan = $('.pekerjaan').val();
          $.ajax({
              type: 'post',
              url: '<?= base_url('admin/sendPekerjaanAnalisa'); ?>',
              data: {
                  no_procurement: no_procurement,
                  pekerjaan: pekerjaan
              },
              success: function(response) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Selamat',
                      text: 'Data berhasil disimpan!',
                      confirmButtonColor: '#F2789F',
                      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                      confirmButtonAriaLabel: 'Thumbs up, great!'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.reload(true);
                      }
                  })

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
              }
          });
      }



      function indirectCost(no_procurement) {
          //   cost of money
          var cost_of_money_volume = $('.cost_of_money_volume').val();
          var cost_of_money_satuan = $('.cost_of_money_satuan').val();
          var jumlah_COM = $('.jumlah_COM').val();

          //   delivery cost
          var delivery_cost_volume = $('.delivery_cost_volume').val();
          var delivery_cost_satuan = $('.delivery_cost_satuan').val();
          var jumlah_DC = $('.jumlah_DC').val();
          //   PPH
          var pph_10_volume = $('.pph_10_volume').val();
          var pph_10 = $('.pph_10').val();
          var pph_22_volume = $('.pph_22_volume').val();
          var pph_22 = $('.pph_22').val();
          var pph_23_volume = $('.pph_23_volume').val();
          var pph_23 = $('.pph_23').val();
          var pph_final_volume = $('.pph_final_volume').val();
          var pph_final = $('.pph_final').val();

          $.ajax({
              type: 'post',
              url: '<?= base_url('admin/indirectCost'); ?>',
              data: {
                  no_procurement: no_procurement,
                  cost_of_money_volume: cost_of_money_volume,
                  cost_of_money_satuan: cost_of_money_satuan,
                  jumlah_COM: jumlah_COM,
                  delivery_cost_volume: delivery_cost_volume,
                  delivery_cost_satuan: delivery_cost_satuan,
                  jumlah_DC: jumlah_DC,
                  pph_10_volume: pph_10_volume,
                  pph_10: pph_10,
                  pph_22_volume: pph_22_volume,
                  pph_22: pph_22,
                  pph_23_volume: pph_23_volume,
                  pph_23: pph_23,
                  pph_final_volume: pph_final_volume,
                  pph_final: pph_final
              },
              success: function(response) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Selamat',
                      text: 'Data berhasil disimpan!',
                      confirmButtonColor: '#F2789F',
                      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                      confirmButtonAriaLabel: 'Thumbs up, great!'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.reload(true)
                      }
                  })

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
              }
          });
      }
  </script>

  <?= $this->endSection(); ?>