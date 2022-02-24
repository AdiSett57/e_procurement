 <!-- Change color theme  -->
 <?php
    $inisial = '';
    $icon = '';
    if (in_groups('superadmin')) {
        $inisial = 'hijau';
        $icon = 'hijau';
        $status = "Super Admin";
    } elseif (in_groups('admin')) {
        $inisial = 'biru';
        $icon = 'biru';
        $status = "Admin";
    } elseif (in_groups('marketing')) {
        $inisial = 'pink';
        $icon = 'pink';
        $status = "Marketing";
    } else {
        $inisial = 'hijau';
        $icon = 'hijau';
    } ?>
 <!-- End change -->



 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow top-template <?= $icon; ?>">

     <!-- Sidebar Toggle (Topbar) -->
     <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
         <i class="fa fa-bars"></i>
     </button>

     <a class="navbar-brand" href="#">
         <?php if (in_groups('vendor')) : ?>
             <h4>Wakabe Indonesia</h4>
         <?php endif; ?>
         <?php if (in_groups('admin') + in_groups('superadmin') + in_groups('marketing')) : ?>
             <h4 class="<?= $icon; ?>"><?= $judul; ?></h4>
         <?php endif;  ?>
     </a>

     <!-- Topbar Navbar -->
     <ul class="navbar-nav ml-auto">


         <div class="topbar-divider d-none d-sm-block"></div>


         <!-- Nav Item - User Information -->
         <li class="nav-item dropdown no-arrow kiri">
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <?php if (in_groups('vendor')) : ?>
                     <span class="mr-2 d-none d-lg-inline topbar-user"><?= user()->username; ?> | <?= user()->vendor; ?></span>
                 <?php endif; ?>
                 <?php if (in_groups('superadmin') + in_groups('admin') + in_groups('marketing')) : ?>
                     <span class="mr-2 d-none d-lg-inline topbar-user <?= $icon; ?>"><?= $status; ?> | <?= user()->fullname; ?></span>
                 <?php endif; ?>
                 <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/<?= user()->user_image; ?>">
             </a>
             <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                 <a class="dropdown-item drop-user" href="<?= base_url('user'); ?>">
                     <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                     <span>My Profile</span>
                 </a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item drop-user" href="#" data-toggle="modal" data-target="#logoutModal">
                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                     <span>Logout</span>
                 </a>
             </div>
         </li>

     </ul>

 </nav>