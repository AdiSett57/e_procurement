  <?= $this->extend('templates/index'); ?>
  <?= $this->section('page-content'); ?>

  <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-8" align="center">
              <div class="card mb-3 my-profile" style="max-width: 540px;">
                  <div class="row g-0">
                      <div class="col-md-4">
                          <img src="<?= base_url('/img/' . $user->user_image); ?>" class="img-fluid rounded-start ml-4 mt-4" alt="<?= $user->username; ?>">
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                              <ul class="list-group list-group-flush">
                                  <li class="list-group-item">
                                      <h5><?= $vendor['fullname']; ?></h5>
                                  </li>
                                  <li class="list-group-item"><b><?= $vendor['vendor']; ?></b> / <?= $vendor['jabatan']; ?>
                                  </li>
                                  <li class="list-group-item">Username : <?= $vendor['username']; ?>
                                  </li>

                                  <li class="list-group-item">Email : <?= $user->email; ?></li>
                                  <li class="list-group-item"> No Telp : <?= $vendor['phone']; ?>
                                  </li>
                                  <li class="list-group-item"> Password :
                                      <span class="badge badge-success"><?= $vendor['password']; ?></span>
                                  </li>
                                  <li class="list-group-item">
                                      <small><a href="<?= base_url('admin/vendorList'); ?>">&laquo; back to vendor list </a></small>
                                      <small class="ml-3"> | </small>
                                      <small class="ml-3"><a class="text-danger" href="<?= base_url('user/deleteUser/' .$idHps); ?>">&otimes; delete account </a></small>
                                  </li>

                              </ul>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>

  <?= $this->endSection(); ?>