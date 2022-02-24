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

  <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-8">
              <?= view('Myth\Auth\Views\_message_block') ?>
              <form method="POST" action="/User/addVendorUser" class="user">
                  <?= csrf_field(); ?>
                  <div class="mb-3">
                      <label for="exampleInputperusahaan" class="form-label">Company name</label>
                      <input type="text" class="form-control" id="exampleInputperusahaan" name="vendor" aria-describedby="emailHelp" required placeholder="enter company name">
                  </div>

                  <div class="row g-3 mb-2">
                      <div class=" col-md-6">
                          <label for="exampleInputuser" class="form-label">Name of user</label>
                          <input type="text" class="form-control" id="exampleInputuser" name="fullname" aria-describedby="emailHelp" required placeholder="enter name of user">
                      </div>
                      <div class="col-md-6">
                          <label for="exampleInputPhone" class="form-label">Phone number</label>
                          <input type="text" class="form-control <?php if (session('errors.phone')) : ?>is-invalid<?php endif ?>" name="phone" id="exampleInputPhone" aria-describedby="phoneHelp" value="<?= old('phone') ?>" required placeholder="enter phone number">
                      </div>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputjabatan" class="form-label">Department</label>
                      <input type="text" class="form-control" id="exampleInputjabatan" name="jabatan" aria-describedby="emailHelp" required placeholder="enter departement name">
                  </div>

                  <div class="row g-3 mb-2">
                      <div class=" col-md-6">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                          <div id="emailHelp" class="form-text"><small>we'll never share your email with anyone else.</small></div>
                      </div>
                      <div class=" col-md-6">
                          <label for="exampleInputUsername" class="form-label">Username</label>
                          <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="exampleInputUsername" name="username" aria-describedby="emailHelp" required placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                          <div id="emailHelp" class="form-text"><small>this username will be used for the next login</small></div>
                      </div>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword" class="form-label">Password</label>
                      <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="exampleInputPassword" aria-describedby="passwordHelp" placeholder="<?= lang('Auth.password') ?>" value="<?= old('password') ?>" required>
                      <div id="emailHelp" class="form-text"><small>type password minimum 8 characters</small></div>
                  </div>
                  <button type="submit" class="btn simpan <?= $icon; ?> float-right"><?= lang('Auth.register') ?></button>
              </form>
          </div>
      </div>
  </div>

  <?= $this->endSection(); ?>