  <?= $this->extend('templates/index'); ?>
  <?= $this->section('page-content'); ?>

  <div class="container">
      <div class="row">
          <div class="col">
              <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?= base_url('img/customer.jpg'); ?>" alt="Card image cap">
                  <div class="card-body">
                      <h5 class="card-title">Customer</h5>
                      <hr>
                      <table class="tbl-procurementProsesDetail">
                          <tbody>
                              <tr>
                                  <td>No.Spph Masuk</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['no_spph_masuk']; ?></td>
                              </tr>
                              <tr>
                                  <td>Perusahaan</td>
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
                      <h5 class="card-title">Vendor</h5>
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
                                      <td>Vendor <?= $i; ?></td>
                                      <td>:</td>
                                      <td><?= $vn['vendor']; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Pic</td>
                                      <td>:</td>
                                      <td><?= $vn['fullname']; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Jabatan</td>
                                      <td>:</td>
                                      <td><?= $vn['jabatan']; ?></td>
                                  </tr>
                                  <tr>
                                      <td>No Telp</td>
                                      <td>:</td>
                                      <td><?= $vn['phone']; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Tgl Approved</td>
                                      <td>:</td>
                                      <td><?= $vn['tanggal_kirim']; ?></td>
                                  </tr>
                                  <?php $i++; ?>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?= base_url('img/detail.jpg'); ?>" alt="Card image cap">
                  <div class="card-body">
                      <h5 class="card-title">Detail</h5>
                      <hr>
                      <table class="tbl-procurementProsesDetail">
                          <tbody>
                              <tr>
                                  <td>No.Procurement</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['no_procurement']; ?></td>
                              </tr>
                              <tr>
                                  <td>Tanggal Request</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['tanggal']; ?></td>
                              </tr>
                              <tr>
                                  <td>Approved</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['updated_at']; ?></td>
                              </tr>
                              <tr>
                                  <td>Approved By</td>
                                  <td>:</td>
                                  <td><?= $detailProcess['0']['approved_by']; ?></td>
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
                  <thead class="thead-dark">
                      <tr>
                          <th>No Procurement</th>
                          <th>Deskripsi</th>
                          <th>Quantity</th>
                          <th>Satuan</th>
                          <th>Harga Satuan</th>
                          <th>Harga Total</th>
                          <th>Durasi Pengiriman</th>
                          <th>Dari Vendor</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($detailProcess as $det) : ?>
                          <tr>
                              <td><?= $det['no_procurement']; ?></td>
                              <td><?= $det['nama_barang']; ?></td>
                              <td><?= $det['volume']; ?></td>
                              <td><?= $det['satuan']; ?></td>
                              <td><?= $det['harga_satuan']; ?></td>
                              <td><?= $det['harga_total']; ?></td>
                              <td><?= $det['durasi_pengiriman']; ?></td>
                              <td><?= $det['vendor']; ?></td>
                          </tr>
                      <?php endforeach; ?>

                  </tbody>
              </table>
          </div>
      </div>


      <div class="row">
          <div class="col">

              <!-- Button trigger modal -->
              <a type="button" href="<?= base_url('admin/backConfirm'); ?>" class="btn btn-danger" style="margin-bottom: 2%;">
                  Kembali
              </a>
          </div>
      </div>
  </div>

  <?= $this->endSection(); ?>