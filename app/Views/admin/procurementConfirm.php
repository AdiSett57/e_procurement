 <?= $this->extend('templates/index'); ?>
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
        $inisial = 'pink';
        $icon = 'pink';
    } ?>
 <!-- End change -->
 <div class="container">
     <div class="row">

     </div>
 </div>
 <div class="row">
     <div class="col">
         <div class="container">
             <div class="row ">
                 <div class="col">
                     <h5 class="<?= $icon; ?>">Sorting Data</h5>
                 </div>
             </div>
             <form action="<?= base_url('admin/procurementConfirm'); ?>" method="POST">
                 <div class="row justify-content-md-start">
                     <div class="col col-lg-2">
                         <select class="form-select drop-spph mr-5" aria-label="Default select example" name="pilih_spph" required>
                             <option class="drop-menu">Tanggal masuk</option>
                             <option class="drop-menu" value="terbaru">Terbaru</option>
                             <option value="terlama">Terlama</option>
                         </select>
                     </div>
                     <div class="col col-lg-2">
                         <button type="submit" class="btn btn-sm ml-2 mb-2 rounded-pill simpan <?= $icon; ?>">Terapkan</button>
                     </div>
                 </div>
             </form>
             <table class="table table-striped table-responsive-sm <?= $icon; ?>">
                 <br>
                 <thead>
                     <tr>
                         <th scope="col">No</th>
                         <th scope="col">No Procurement</th>
                         <th scope="col">Tanggal</th>
                         <th scope="col">Customer</th>
                         <th scope="col">Status</th>
                         <th scope="col">Tanggal confirm</th>
                         <th scope="col">Admin</th>
                         <th scope="col">Opsi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1; ?>
                     <?php foreach ($data_feedback as $v) : ?>
                         <tr>
                             <th scope="row"><?= $i++; ?></th>
                             <td scope="row"><?= $v->no_procurement; ?></td>
                             <td scope="row"><?= $v->tanggal; ?></td>
                             <td><?= $v->nama_perusahaan; ?></td>
                             <td class="text-primary"><?= $v->status; ?></td>
                             <td><?= $v->updated_at; ?></td>
                             <td><?= $v->approved_by; ?></td>
                             <td>
                                 <a href="<?= base_url('admin/analisaHarga/' . $v->no_spph_keluar); ?>" class="btn detail <?= $icon; ?>">Detail</a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
 <?= $this->endSection(); ?>