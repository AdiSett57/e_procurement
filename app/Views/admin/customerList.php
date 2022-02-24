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
      <div class="col-6">
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukkan user atau nama perusahaan..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
            <button class="btn cari <?= $icon; ?>" type="submit" id="button-addon2" name="submit">cari</button>
          </div>
        </form>
      </div>
      <div class="col-6">
        <div class="d-sm-flex align-items-right justify-content-end mb-4">
          <a class="d-none d-sm-inline-block btn btn-sm shadow-sm detail <?= $icon; ?>" href="#" data-toggle="modal" data-target="#tambah_customer_modal"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add Customer</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-striped table-hover table-responsive-lg">
          <br>
          <thead>
            <tr class="bg-<?= $icon; ?>">
              <th scope="col">No</th>
              <th scope="col">Perusahaan</th>
              <th scope="col">User</th>
              <th scope="col">No Telp</th>
              <th scope="col">Email</th>
              <th scope="col">Alamat</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 + (6 * ($currentPage - 1)); ?>
            <?php foreach ($customerList as $cs) : ?>
              <tr class="bg-Secondary">
                <th scope="row"><?= $i++; ?></th>
                <td><?= $cs['nama_perusahaan']; ?></td>
                <td><?= $cs['pic']; ?></td>
                <td><?= $cs['no_telp']; ?></td>
                <td><?= $cs['email']; ?></td>
                <td><?= $cs['alamat']; ?></td>
                <td>
                  <a href="<?= base_url('admin/customerDelete/' . $cs['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?= $pager->links('vendor', 'custom_pagination'); ?>

      </div>
    </div>
  </div>

  <div class="modal fade" id="tambah_customer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title <?= $icon; ?>" id="exampleModalLabel">Tambah data Customer</h5>
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
            <button type="submit" class="btn btn-update-password <?= $icon; ?>">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <small id="emailHelp" class="form-text text-muted">Data yang anda inputkan akan tersimpan ke database.</small>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>