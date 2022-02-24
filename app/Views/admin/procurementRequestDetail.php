  <?= $this->extend('templates/index'); ?>
  <?= $this->section('page-content'); ?>

  <!-- Change color theme  -->
  <?php
    $inisial = '';
    $icon = '';

    if (in_groups('superadmin')) {
        $inisial = 'hijau';
        $icon = 'hijau';
    } else {
        $inisial = 'biru';
        $icon = 'biru';
    } ?>
  <!-- End change -->
  <div class="container">
      <div class="row clm-content">
          <div class="col">
              <div class="card" style="width: 25rem;">
                  <img class="card-img-top" src="<?= base_url('img/detail.jpg'); ?>" alt="Card image cap">
                  <div class="card-body">
                      <h5 class="card-title <?= $icon; ?>">Detail</h5>
                      <hr>
                      <table class="tbl-procurementRequestDetail">
                          <tbody>
                              <tr>
                                  <td>No.Spph Masuk</td>
                                  <td>:</td>
                                  <td><?= $detailInquiryProses['0']['no_spph_masuk']; ?></td>
                              </tr>
                              <tr>
                                  <td>Tanggal Request</td>
                                  <td>:</td>
                                  <td><?= $detailInquiryProses['0']['tanggal']; ?></td>
                              </tr>
                              <tr>
                                  <td>Inputed By</td>
                                  <td>:</td>
                                  <td><?= $detailInquiryProses['0']['inputed_by']; ?></td>
                              </tr>
                              <tr>
                                  <td>Status</td>
                                  <td>:</td>
                                  <td><?= $detailInquiryProses['0']['status']; ?></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="card" style="width: 25rem;">
                  <img class="card-img-top" src="<?= base_url('img/customer.jpg'); ?>" alt="Card image cap">
                  <div class="card-body">
                      <h5 class="card-title <?= $icon; ?>">Customer</h5>
                      <hr>
                      <table class="tbl-procurementRequestDetail">
                          <tbody>
                              <tr>
                                  <td>Nama Perusahaan</td>
                                  <td>:</td>
                                  <td><?= $detailInquiryProses['0']['nama_perusahaan']; ?></td>
                              </tr>
                              <tr>
                                  <td>Pic</td>
                                  <td>:</td>
                                  <td><?= $detailInquiryProses['0']['pic']; ?></td>
                              </tr>
                              <tr>
                                  <td>No Telepon</td>
                                  <td>:</td>
                                  <td><?= $detailInquiryProses['0']['no_telp']; ?></td>
                              </tr>
                              <tr>
                                  <td>Alamat</td>
                                  <td>:</td>
                                  <td><?= $detailInquiryProses['0']['alamat']; ?></td>
                              </tr>
                              <tr>
                                  <td>Email</td>
                                  <td>:</td>
                                  <td><?= $detailInquiryProses['0']['email']; ?></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>


      <div class="row">
          <div class="col">

              <?= \Config\Services::validation()->listErrors() ?>
              <form method="POST" action="<?= base_url('admin/confirmProcurementRequest/' . $detailInquiryProses['0']['no_spph_masuk']); ?>">
                  <?= csrf_field() ?>
                  <h5 class="<?= $icon; ?>">Pilih Vendor</h5>
                  <div class="row">
                      <div class="col">
                          <small>Anda dapat memilih vendor lebih dari satu</small>
                          <select id="vendor" class="form-control" name="vendor[]" multiple="multiple" required>
                              <?php foreach ($vendor as $vendor) : ?>
                                  <option value="<?= $vendor['vendor']; ?>"><?= $vendor['vendor']; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="col">
                          <small class="no_spph_info">NO SPPH Keluar</small>
                          <input type="text" class="form-control" id="no_spph_keluar" name="no_spph_keluar" value="<?= $no_spph_keluar; ?>" readonly>
                      </div>
                  </div>
                  <br>
                  <h5 class="<?= $icon; ?>">Detail Request</h5>
                  <table class="table <?= $icon; ?>">
                      <thead>
                          <tr>
                              <th>Deskripsi</th>
                              <th>Quantity</th>
                              <th>Satuan</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($detailInquiryProses as $det) : ?>
                              <tr>
                                  <td><?= $det['nama_barang']; ?></td>
                                  <td><?= $det['volume']; ?></td>
                                  <td><?= $det['satuan']; ?></td>
                              </tr>
                          <?php endforeach; ?>

                      </tbody>
                  </table>
                  <div class="btn-group float-right" role="group" aria-label="Basic mixed styles example">
                      <button type="submit" class="btn btn-primary">Send</button>
                  </div>
              </form>
              <!-- Button trigger modal -->
              <a type="button" href="<?= base_url('admin/procurementRequestDelete/' . $detailInquiryProses['0']['no_spph_masuk']); ?>" class="btn btn-danger tombol-hps-request">
                  Delete
              </a>
          </div>
      </div>
  </div>

  <script type="text/javascript">
      $(document).ready(function() {
          $('#no_spph_keluar').hide();
          $('.no_spph_info').hide();
          $('#vendor').on('input', function() {
              $('#no_spph_keluar').show();
              $('.no_spph_info').show();
          })
      });
  </script>

  <?= $this->endSection(); ?>