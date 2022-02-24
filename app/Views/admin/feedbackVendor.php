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
     <div class="col-sm">
         <div id="notif" class="notif">
             <?php if (!empty($_SESSION["success"])) {
                    echo $_SESSION["success"];
                    unset($_SESSION["success"]);
                } ?>
         </div>
     </div>
     <div class="row ">
         <div class="col">
             <h5 class="<?= $icon; ?>">Filtering Data</h5>
         </div>
         <div class="col" style="display: flex; justify-content: end;">
             <a href="<?= base_url('admin/feedbackVendorArsipkan'); ?>" class="btn btn-secondary btn-sm rounded-pill">Diarsipkan</a>
         </div>
     </div>
     <form action="<?= base_url('admin/feedbackVendor'); ?>" method="POST">
         <div class="row justify-content-md-start">
             <div class="col-lg-auto">
                 <select class="form-select drop-spph" aria-label="Default select example" name="pilih_spph" required>
                     <option class="drop-menu">Deskripsi</option>
                     <?php foreach ($deskripsi as $des) : ?>
                         <option class="drop-menu" value="<?= $des->nama_barang; ?>"><?= $des->nama_barang; ?></option>
                     <?php endforeach; ?>
                 </select>
             </div>
             <div class="col-lg-auto">
                 <select class="form-select drop-spph" required aria-label="Default select example" name="opsi">
                     <option value="-" class="drop-menu">Opsi</option>
                     <option value="harga termurah">Harga Termurah</option>
                     <option value="pengiriman tercepat">Pengiriman Tercepat</option>
                 </select>
             </div>
             <div class="col col-lg-2">
                 <button type="submit" class="btn btn-sm rounded-pill simpan <?= $icon; ?>">Terapkan</button>
             </div>
         </div>
     </form>
     <div class="row">
         <div class="col-lg">
             <table class="table table-striped table-responsive-lg feedback_vendor">
                 <br>
                 <thead>
                     <tr align="center" class="bg-<?= $icon; ?>">
                         <th scope="col">No</th>
                         <th scope="col">No SPPH</th>
                         <th scope="col">Deskripsi</th>
                         <th scope="col">Banyaknya</th>
                         <th scope="col">Vendor</th>
                         <th scope="col">Harga Satuan</th>
                         <th scope="col">Total Harga</th>
                         <th scope="col">Durasi Pengiriman</th>
                         <th scope="col">Opsi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1;
                        foreach ($data_feedback as $v) : ?>
                         <tr align="center">
                             <th scope="row"><?= $i++; ?></th>
                             <td scope="row" class="text-primary"><?= $v->no_spph_keluar; ?></td>
                             <td scope="row" class="text-dark bg-gradient-warning"><?= $v->nama_barang; ?></td>
                             <td scope="row"><?= $v->volume; ?></td>
                             <td scope="row" class="text-primary"><?= $v->vendor; ?></td>
                             <td scope="row"><?= $v->harga_satuan; ?></td>
                             <td scope="row" class="text-dark bg-gradient-warning"><?= number_format($v->harga_total, 2, ',', '.'); ?></td>
                             <td scope="row" class="text-dark bg-gradient-warning"><?= $v->durasi_pengiriman; ?> hari</td>
                             <td>
                                 <a href="<?= base_url('admin/feedbackVendorConfirm/' . $v->id); ?>" class="btn detail <?= $icon; ?> btn-sm" id="toast_request">Accept</a>
                                 <a href="<?= base_url('admin/feedbackVendorDelete/' . $v->id); ?>" class="btn btn-sm btn-warning mt-3">Delete</a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
 <?= $this->endSection(); ?>