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


<div class="container-fluid">
    <form method="POST" action="<?= base_url('user/update/' . $data->id); ?>" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" value="<?= $data->fullname; ?>" name="fullname" placeholder="belum ada!" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Username / email</label>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="username" value="<?= $data->username; ?>" placeholder="Username" aria-label="First name" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="email" aria-label="email" name="email" value="<?= $data->email; ?>" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">No Telepon</label>
            <input type="text" class="form-control" value="<?= $data->phone; ?>" name="phone" placeholder="belum ada!" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Update Foto Profile</label>
            <input class="form-control <?= ($validation->hasError('user_image')) ? 'is-invalid' : ''; ?>" type="file" id="formFile" name="user_image">
            <div class="invalid-feedback">
                <?= $validation->getError('user_image'); ?>
            </div>
        </div>

        <button type="submit" class="btn simpan <?= $icon; ?>">Simpan</button>
    </form>
    <br>
    <?php if (in_groups('superadmin') + in_groups('admin') + in_groups('marketing')) : ?>
        <button class="btn btn-block btn-update-password <?= $icon; ?>" href="#" data-toggle="modal" data-target="#gantiPassword">
            <i class="fas fa-key"></i>
            Ganti Password
        </button>
    <?php endif; ?>

    <?php if (in_groups('vendor')) : ?>
        <button class="btn btn-outline-primary btn-block " href="#" data-toggle="modal" data-target="#gantiPasswordVendor">
            <i class="fas fa-key"></i>
            Ganti Password
        </button>
    <?php endif; ?>

    <!-- Modal untuk ganti password user selain vendor -->
    <div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/gantiPassword/' . $data->id); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="text" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="masukkan password baru" name="password" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                            <div id="exampleInputPassword1" class="form-text"><small>Password minimal 8 karakter terdiri dari huruf dan angka</small></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <a class="btn btn-secondary float-right" type="button" data-dismiss="modal">Cancel</a>
                </div>
                <div class="modal-footer">
                    <small>
                        <p><i class="text-warning">Cek kembali password yang anda masukkan sebelum melanjutkan!!</i></p>
                    </small>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal untuk ganti password vendor -->
    <div class="modal fade" id="gantiPasswordVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/gantiPasswordVendor/' . $data->id); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="text" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="masukkan password baru" name="password" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                            <div id="exampleInputPassword1" class="form-text"><small>Password minimal 8 karakter terdiri dari huruf dan angka</small></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <a class="btn btn-secondary float-right" type="button" data-dismiss="modal">Cancel</a>
                </div>
                <div class="modal-footer">
                    <small>
                        <p><i class="text-warning">Cek kembali password yang anda masukkan sebelum melanjutkan!!</i></p>
                    </small>

                </div>
            </div>
        </div>
    </div>







</div>
<?= $this->endSection(); ?>