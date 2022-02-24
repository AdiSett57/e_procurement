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
          <a href="/user/tambahVendorUser" class="d-none d-sm-inline-block btn btn-sm shadow-sm detail <?= $icon; ?>"><i class="fas fa-user-plus fa-sm"></i> Add vendor</a>
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
              <th scope="col">Jabatan</th>
              <th scope="col">No Telp</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 + (6 * ($currentPage - 1)); ?>
            <?php foreach ($vendorList as $v) : ?>
              <tr class="bg-Secondary">
                <th scope="row"><?= $i++; ?></th>
                <td><?= $v['vendor']; ?></td>
                <td><?= $v['fullname']; ?></td>
                <td><?= $v['jabatan']; ?></td>
                <td><?= $v['phone']; ?></td>
                <td>
                  <a href="<?= base_url('admin/vendorDetail/' . $v['id']); ?>" class="btn detail <?= $icon; ?>">Detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?= $pager->links('vendor', 'custom_pagination'); ?>

      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>