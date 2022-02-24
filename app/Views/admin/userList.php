  <?= $this->extend('templates/index'); ?>
  <?= $this->section('page-content'); ?>

  <div class="container-fluid">
    <div class="col-sm">
      <div id="notif" class="notif">
        <?php if (!empty($_SESSION["success"])) {
          echo $_SESSION["success"];
          unset($_SESSION["success"]);
        } ?>
      </div>
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h5 class="hijau">Manage users list</h5>
      <a href="/user/tambahUser" class="d-none d-sm-inline-block btn btn-sm shadow-sm detail hijau"><i class="fas fa-user-plus fa-sm"></i> Add user</a>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-striped table-hover table-responsive-lg">
          <thead>
            <tr class="bg-hijau">
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Vendor</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($us as $user) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $user->username; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->vendor; ?></td>
                <td>
                  <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn detail">detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>