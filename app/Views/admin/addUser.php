  <?= $this->extend('templates/index'); ?>
  <?= $this->section('page-content'); ?>

  <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-8">
              <?= view('Myth\Auth\Views\_message_block') ?>
              <form method="POST" action="/User/adduser" class="user">
                  <div class="mb-3">
                      <label for="exampleInputUsername" class="form-label">Username</label>
                      <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="exampleInputUsername" name="username" aria-describedby="emailHelp" required placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                      <div id="emailHelp" class="form-text"><small>this username will be used for the next login</small></div>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                      <div id="emailHelp" class="form-text"><small>we'll never share your email with anyone else.</small></div>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword" class="form-label">Password</label>
                      <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="exampleInputPassword" aria-describedby="passwordHelp" placeholder="<?= lang('Auth.password') ?>" value="<?= old('password') ?>" required>
                      <div id="emailHelp" class="form-text"><small>type password minimum 8 characters</small></div>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPhone" class="form-label">Phone number</label>
                      <input type="text" class="form-control <?php if (session('errors.phone')) : ?>is-invalid<?php endif ?>" name="phone" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="insert phone number" value="<?= old('phone') ?>" required>
                      <div id="phoneHelp" class="form-text"><small>we'll never share your phone number with anyone else.</small></div>
                  </div>
                  <select class="form-select mr-3" aria-label="Default select example" name="permision">
                      <option value="marketing">select permissions</option>
                      <option value="admin">Admin</option>
                      <option value="marketing">Marketing</option>
                  </select>
                  <button type="submit" class="btn simpan hijau float-right"><?= lang('Auth.register') ?></button>
              </form>
          </div>
      </div>
  </div>

  <?= $this->endSection(); ?>