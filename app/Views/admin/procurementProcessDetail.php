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
      <div class="row">
          <div class="col">
              <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?= base_url('img/customer.jpg'); ?>" alt="Card image cap">
                  <div class="card-body">
                      <h5 class="card-title <?= $icon; ?>">Customer</h5>
                      <hr>
                      <table class="tbl-procurementProsesDetail">
                          <tbody>
                              <tr>
                                  <td>Nama Perusahaan</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['nama_perusahaan']; ?></td>
                              </tr>
                              <tr>
                                  <td>Pic</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['pic']; ?></td>
                              </tr>
                              <tr>
                                  <td>No Telepon</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['no_telp']; ?></td>
                              </tr>
                              <tr>
                                  <td>Alamat</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['alamat']; ?></td>
                              </tr>
                              <tr>
                                  <td>Email</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['email']; ?></td>
                              </tr>
                          </tbody>
                      </table>

                  </div>
              </div>
          </div>
          <div class="col">
              <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?= base_url('img/vendor.jpg'); ?>" alt="Card image cap">
                  <div class="card-body">
                      <h5 class="card-title <?= $icon; ?>">Vendor</h5>
                      <hr>
                      <table class="tbl-procurementProsesDetail">
                          <tbody>
                              <tr>
                                  <td>No.Spph Keluar</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['no_spph_keluar']; ?></td>
                              </tr>
                              <?php $i = 1; ?>
                              <?php foreach ($dataVendor as $vn) : ?>
                                  <tr>
                                      <td>Nama Perusahaan <?= $i; ?></td>
                                      <td>:</td>
                                      <td><?= $vn; ?></td>
                                  </tr>
                                  <?php $i++; ?>
                              <?php endforeach; ?>
                              <tr>
                                  <td>Approved By</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['approved_by']; ?></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?= base_url('img/detail.jpg'); ?>" alt="Card image cap">
                  <div class="card-body">
                      <h5 class="card-title <?= $icon; ?>">Detail</h5>
                      <hr>
                      <table class="tbl-procurementProsesDetail">
                          <tbody>
                              <tr>
                                  <td>No.Spph Masuk</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['no_spph_masuk']; ?></td>
                              </tr>
                              <tr>
                                  <td>Tanggal Request</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['tanggal']; ?></td>
                              </tr>
                              <tr>
                                  <td>Tanggal Approved</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['updated_at']; ?></td>
                              </tr>
                              <tr>
                                  <td>Inputed By</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['inputed_by']; ?></td>
                              </tr>
                              <tr>
                                  <td>Status</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['status']; ?></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <table class="table table-responsive-sm table-striped" style="width: 95%; margin-top: 5%; color: #393E46;">
                  <thead>
                      <tr class="bg-<?= $icon; ?>">
                          <th>Deskripsi</th>
                          <th>Quantity</th>
                          <th>Satuan</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($detailProcess as $det) : ?>
                          <tr>
                              <td><?= $det['nama_barang']; ?></td>
                              <td><?= $det['volume']; ?></td>
                              <td><?= $det['satuan']; ?></td>
                          </tr>
                      <?php endforeach; ?>

                  </tbody>
              </table>
          </div>
      </div>


      <div class="row">
          <div class="col">

              <!-- Button trigger modal -->
              <a type="button" href="#" class="btn btn-danger" data-toggle="modal" data-target="#pendingModal" style="margin-bottom: 2%;">
                  Delete
              </a>


              <!-- Logout Modal-->
              <div class="modal fade" id="pendingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Confirm Delete..</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                                  <div class="col-sm">
                                      <p>are you sure you want to delete this data ?</p>
                                  </div>
                              </div>

                              <div class="btn-group float-right" role="group" aria-label="Basic mixed styles example">
                                  <button class="btn btn-warning" type="button" data-dismiss="modal">No</button>
                                  <a type="button" class="btn btn-danger" href="<?= base_url('admin/procurementProcessDelete/' . $detailProcess['0']['no_spph_keluar']); ?>">Yes</a>
                              </div>
                          </div>
                          <div class="modal-footer">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <?= $this->endSection(); ?>