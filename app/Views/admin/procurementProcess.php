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
                     <input type="text" class="form-control" placeholder="Cari berdasarkan nama barang..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                     <button class="btn cari <?= $icon; ?>" type="submit" id="button-addon2" name="submit">cari</button>
                 </div>
             </form>
         </div>
         <div class="col-6">
             <div class="d-sm-flex align-items-right justify-content-end mb-4">
                 <a type="button" href="#" data-toggle="modal" data-target="#PrintModal" class="d-none d-sm-inline-block detail <?= $icon; ?> btn-sm shadow-sm"><i class="fas fa-print"></i> Print SPPH</a>
             </div>
         </div>
     </div>
     <div class="col-sm">
         <div id="notif" class="notif">
             <?php if (!empty($_SESSION["success"])) {
                    echo $_SESSION["success"];
                    unset($_SESSION["success"]);
                } ?>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col">
         <div class="container">
             <table class="table table-striped table-responsive-lg <?= $icon; ?>">
                 <br>
                 <thead>
                     <tr style="text-align: center;">
                         <th scope="col" style="width: 5%;">No</th>
                         <th scope="col" style="width: 10%;">Tanggal</th>
                         <th scope="col" style="width: 15%;">No SPPH Keluar</th>
                         <th scope="col" style="width: 15%;">No SPPH Masuk</th>
                         <th scope="col" style="width: 30%;">Vendor</th>
                         <th scope="col" style="width: 10%;">Status</th>
                         <th scope="col" style="width: 10%;">Approved</th>
                         <th scope="col" style="width: 5%;">Opsi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                     <?php foreach ($inquiryProses as $v) : ?>
                         <tr style="text-align: center;">
                             <th scope="row"><?= $i++; ?></th>
                             <td><?= $v['tanggal']; ?></td>
                             <td><?= $v['no_spph_keluar']; ?></td>
                             <td><?= $v['no_spph_masuk']; ?></td>
                             <td><?= $v['vendor']; ?></td>
                             <td class="text-<?= $icon; ?>"><?= $v['status']; ?></td>
                             <td><?= $v['approved_by']; ?></td>
                             <td>
                                 <a href="<?= base_url('admin/procurementProcessDetail/' . $v['no_spph_keluar']); ?>" class="btn detail <?= $icon; ?>">Detail</a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
             <?= $pager->links('penawaran', 'custom_pagination'); ?>

             <!-- Print Modal -->
             <div class="modal fade" id="PrintModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Print SPPH</h5>
                             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form action="<?= base_url('admin/printSpph'); ?>" method="POST">
                                 <div class="mb-3">
                                     <label for="exampleInputEmail1" class="form-label">Pilih No Spph</label>
                                     <select class="form-select" aria-label="Default select example" name="pilih_spph">
                                         <option>Pilih no Spph</option>
                                         <?php foreach ($spph as $sp) : ?>
                                             <option value="<?= $sp->no_spph_keluar; ?>"><?= $sp->no_spph_keluar; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                     <select class="form-select" aria-label="Default select example" name="pilih_vendor">
                                         <option>Pilih Vendor</option>
                                         <?php foreach ($vendor as $vn) : ?>
                                             <option value="<?= $vn->vendor; ?>"><?= $vn->vendor; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                     <div id="emailHelp" class="form-text"><small><i>Data ditampilkan berdasarkan No-SPPH dan vendor yang dipilih</i></small></div>
                                 </div>
                                 <div class="btn-group float-right" role="group" aria-label="Basic mixed styles example">
                                     <button class="btn btn-success" type="submit">confirm</button>
                                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                 </div>
                             </form>
                         </div>
                         <div class="modal-footer">
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>









 <?= $this->endSection(); ?>