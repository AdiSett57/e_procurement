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
     <div class="row">
         <div class="col-6">
             <form action="" method="POST">
                 <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Cari berdasarkan deskripsi atau nama barang..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                     <button class="btn simpan <?= $icon; ?>" type="submit" id="button-addon2" name="submit">cari</button>
                 </div>
             </form>
         </div>
     </div>
     <div class="row">
         <div class="col">
             <table class="table table-light table-striped table-hover table-responsive-sm <?= $icon; ?>">
                 <br>
                 <thead>
                     <tr>
                         <th scope="col">No</th>
                         <th scope="col">Tanggal</th>
                         <th scope="col">No SPPH Masuk</th>
                         <th scope="col">Customer</th>
                         <th scope="col">status</th>
                         <th scope="col">Inputed By</th>
                         <th scope="col">Opsi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                     <?php foreach ($inquiryProses as $v) : ?>
                         <tr>
                             <th scope="row"><?= $i++; ?></th>
                             <td><?= $v['tanggal']; ?></td>
                             <td><?= $v['no_spph_masuk']; ?></td>
                             <td><?= $v['nama_perusahaan']; ?></td>
                             <td class="text-<?= $icon; ?>"><?= $v['status']; ?></td>
                             <td><?= $v['inputed_by']; ?></td>
                             <td>
                                 <a href="<?= base_url('admin/procurementRequestDetail/' . $v['no_spph_masuk']); ?>" class="btn detail <?= $icon; ?>" id="toast_request">Detail</a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
             <?= $pager->links('penawaran', 'custom_pagination'); ?>

         </div>
     </div>
 </div>
 <?= $this->endSection(); ?>