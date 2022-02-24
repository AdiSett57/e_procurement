  <?= $this->extend('templates/index'); ?>
  <?= $this->section('page-content'); ?>

  <!-- Change color theme  -->
  <?php
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



  <div class="row">
      <div class="col-sm">
          <div class="container">
              <div id="notif" class="notif">
                  <?php if (!empty($_SESSION["success"])) {
                        echo $_SESSION["success"];
                        unset($_SESSION["success"]);
                    } ?>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-xl">
          <div class="container">

              <?= \Config\Services::validation()->listErrors() ?>
              <form class="row g-3" action="/FormLoop/post" method="post" id="SimpanData">
                  <?= csrf_field() ?>
                  <!-- form input head data dan customer-->
                  <div class="col-12">
                      <h5 class="<?= $icon; ?>">Customer</h5>
                      <div class="float-right">
                          <a class="btn btn-sm tombol-<?= $icon; ?>" href="#" data-toggle="modal" data-target="#tambah_customer_modal">
                              <i class="fas fa-user-plus"></i>
                              Add new customer
                          </a>
                      </div>
                  </div>
                  <div class="col-12">
                      <label for="inputAddress" class="form-label">Nama perusahaan</label>
                      <select class="custom-select mb-1" name="nama_perusahaan" id="nama_perusahaan">
                          <option value="kosong">pilih daftar customer</option>
                          <?php foreach ($nama_perusahaan as $customer) : ?>
                              <option value="<?= $customer['nama_perusahaan']; ?>"><?= $customer['nama_perusahaan']; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <input type="text" id="id_customer" name="id_customer" class="form-control" hidden>
                  <div class="col-md-6 hide-cs">
                      <label for="no_spph_masuk" class="form-label">No.Spph masuk</label>
                      <input type="text" autofocus name="no_spph_masuk" class="form-control" id="no_spph_masuk" required>
                  </div>
                  <div class="col-md-6 hide-cs">
                      <label for="pic" class="form-label">PIC</label>
                      <input type="text" name="pic" class="form-control" id="pic" readonly>
                  </div>
                  <div class="col-12 mt-1 hide-cs">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="alamat" readonly>
                  </div>
                  <div class="col-md-6 mt-1 hide-cs">
                      <label for="no_telp" class="form-label">No telpon</label>
                      <input type="text" name="no_telp" class="form-control" id="no_telp" readonly>
                  </div>
                  <div class="col-md-6 mt-1 hide-cs">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="email" readonly>
                  </div>
                  <!-- End input data -->
                  <div class="box-body col-12 mt-4">
                      <div class="table-responsive">
                          <table class="table <?= $icon; ?>" id="tableLoop">
                              <thead>
                                  <tr>
                                      <th class="text-center">No</th>
                                      <th>Deskripsi</th>
                                      <th>Qty</th>
                                      <th>Satuan</th>
                                      <th><button class="btn btn-sm brs-baru <?= $icon; ?>" id="BarisBaru"><i class="fa fa-plus"></i></button></th>
                                  </tr>
                              </thead>
                              <tbody></tbody>
                          </table>
                      </div>
                  </div>
                  <div class="box-footer">
                      <div class="form-group text-right">
                          <button type="submit" class="btn brs-baru <?= $icon; ?>"><i class="fa fa-check"></i> Simpan</button>
                          <button type="reset" class="btn btn-default">Batal</button>
                      </div>
                  </div>
              </form>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <script>
                  $(document).ready(function() {
                      for (B = 1; B <= 1; B++) {
                          Barisbaru();
                      }
                      $('#BarisBaru').click(function(e) {
                          e.preventDefault();
                          Barisbaru();
                      });

                      $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
                  });

                  function Barisbaru() {
                      $(document).ready(function() {
                          $("[data-toggle='tooltip']").tooltip();
                      });
                      var Nomor = $("#tableLoop tbody tr").length + 1;

                      var Baris = '<tr>';
                      Baris += '<td class="text-center">' + Nomor + '</td>';

                      Baris += '<td>';
                      Baris += '<input type="text" name="nama_barang[]" class="form-control nama_barang" placeholder="Deskripsi" required="">';
                      Baris += '</td>';

                      Baris += '<td>';
                      Baris += '<input type="text" name="volume[]" class="form-control vol" placeholder="Quantity" required="">';
                      Baris += '</td>';

                      Baris += '<td>';
                      Baris += '<select class="custom-select" name="satuan[]"><option>Pilih satuan</option><option value = "meter" > Meter </option><option value = "Pcs" > Pcs </option><option value = "pack" > pack </option></select>';
                      Baris += '</td>';

                      Baris += '<td class="text-center">';
                      Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
                      Baris += '</td>';
                      Baris += '</tr>';

                      $("#tableLoop tbody").append(Baris);
                      $("#tableLoop tbody tr").each(function() {
                          $(this).find('td:nth-child(2) input').focus();
                      });
                  }

                  $(document).on('click', '#HapusBaris', function(e) {
                      e.preventDefault();
                      var Nomor = 1;
                      $(this).parent().parent().remove();
                      $('tableLoop tbody tr').each(function() {
                          $(this).find('td:nth-child(1)').html(Nomor);
                          Nomor++;
                      });
                  });
              </script>
          </div>
      </div>
  </div>

  <div class="modal fade" id="tambah_customer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah data Customer</h5>
              </div>
              <div class="modal-body">
                  <form method="POST" action="<?= base_url('admin/addCustomer'); ?>">
                      <div class="form-group">
                          <label for="nama_perusahaan">Nama perusahaan</label>
                          <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" aria-describedby="emailHelp" placeholder="masukkan nama perusahaan">
                      </div>
                      <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <input type="text" class="form-control" id="alamat" placeholder="masukkan alamat" name="alamat">
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="pic">PIC</label>
                              <input type="text" name="pic" class="form-control" id="pic" placeholder="Pic">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="no_telp">No telpon</label>
                              <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="no telepon">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" placeholder="masukkan email" name="email">
                      </div>
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-warning">Submit</button>
                  </form>
              </div>
              <div class="modal-footer">
                  <small id="emailHelp" class="form-text text-muted">Data yang anda inputkan akan tersimpan ke database.</small>
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
      $(document).ready(function() {
          $('.hide-cs').hide();
          $('#nama_perusahaan').on('input', function() {
              var nama_perusahaan = $(this).val();
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/get_customer_onInput') ?>",
                  dataType: "JSON",
                  data: {
                      nama_perusahaan: nama_perusahaan
                  },
                  cache: false,
                  success: function(data) {
                      $.each(data, function(pic, alamat, no_telp, email, id) {
                          $('.hide-cs').show();
                          $('#id_customer').val(data.id);
                          $('#email').val(data.email);
                          $('#pic').val(data.pic);
                          $('#alamat').val(data.alamat);
                          $('#no_telp').val(data.no_telp);

                      });
                  }
              });
              return false;
          });
      });
  </script>
  <?= $this->endSection(); ?>