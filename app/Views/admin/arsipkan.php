 <?= $this->extend('templates/index'); ?>
 <?= $this->section('page-content'); ?>
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
         <div class="col">
             <table class="table table-striped table-responsive-lg feedback_vendor">
                 <br>
                 <thead>
                     <tr align="center">
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
                             <td scope="row" class="text-primary"><?= $v['no_spph_keluar']; ?></td>
                             <td scope="row" class="text-dark bg-gradient-warning"><?= $v['nama_barang']; ?></td>
                             <td scope="row"><?= $v['volume']; ?></td>
                             <td scope="row" class="text-primary"><?= $v['vendor']; ?></td>
                             <td scope="row"><?= $v['harga_satuan']; ?></td>
                             <td scope="row" class="text-dark bg-gradient-warning"><?= number_format($v['harga_total'], 2, ',', '.'); ?></td>
                             <td scope="row" class="text-dark bg-gradient-warning"><?= $v['durasi_pengiriman']; ?></td>
                             <td>
                                 <a href="<?= base_url('admin/feedbackVendorPindahkan/' . $v['id']); ?>" class="btn btn-sm btn-primary">Pindah</a>
                                 <a href="<?= base_url('admin/feedbackVendorDelete/' . $v['id']); ?>" class="btn btn-sm btn-warning">Delete</a>
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