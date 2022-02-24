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

 <ul class="navbar-nav sidebar <?= $inisial; ?> accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard'); ?>">
         <div class="sidebar-brand-icon">
             <!-- <i class="fas fa-digital-tachograph"></i> -->
             <?php if (in_groups('superadmin') + in_groups('vendor')) : ?>
                 <img class="logo-sidebar" src="<?= base_url('img/icon.png'); ?>" alt="">
             <?php endif; ?>
             <?php if (in_groups('admin') + in_groups('marketing')) : ?>
                 <span class="logo-brand <?= $icon; ?>">W</span>
             <?php endif; ?>
         </div>
         <div class="sidebar-brand-text <?= $icon; ?>">E-Procurement</div>
     </a>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->

     <!-- Nav - Inquiry Management -->
     <?php if (in_groups('superadmin') + in_groups('admin') + in_groups('marketing')) : ?>
         <div class="sidebar-heading">
             Procurement
         </div>

         <!-- Nav Item - Inquiry -->
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('admin/inputData'); ?>">
                 <i class="fas fa-keyboard"></i>
                 <span>Input Data</span></a>
         </li>
     <?php endif; ?>

     <?php if (in_groups('admin') + in_groups('superadmin')) :  ?>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('admin/procurementRequest'); ?>">
                 <i class="fas fa-dollar-sign"></i>
                 <span>Procurement Request</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('admin/procurementProcess'); ?>">
                 <i class="fas fa-comments-dollar"></i>
                 <span>Procurement Process</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('admin/feedbackVendor'); ?>">
                 <i class="fas fa-book-reader"></i>
                 <span>Feedback Vendor</span></a>
         </li>
     <?php endif; ?>
     <?php if (in_groups('marketing') + in_groups('superadmin')) : ?>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('admin/procurementConfirm'); ?>">
                 <i class="fas fa-clipboard-list"></i>
                 <span>Analisa Data</span></a>
         </li>
     <?php endif; ?>


     <!-- Divider -->

     <?php if (in_groups('admin')) : ?>
         <hr class="sidebar-divider">
         <div class="sidebar-heading">
             Vendors
         </div>
     <?php endif ?>

     <!-- Nav User Management -->
     <?php if (in_groups('superadmin')) : ?>
         <div class="sidebar-heading">
             Users and Vendors
         </div>

         <!-- Nav Item - User List -->
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('admin/userlist'); ?>">
                 <i class="fas fa-users"></i>
                 <span>User List</span></a>
         </li>
     <?php endif ?>

     <!-- Nav Item - Vendor List -->
     <?php if (in_groups('admin') + in_groups('superadmin')) : ?>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('admin/vendorlist'); ?>">
                 <i class="fas fa-users"></i>
                 <span>Vendor List</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('admin/Customerlist'); ?>">
                 <i class="fas fa-users"></i>
                 <span>Customer List</span></a>
         </li>
     <?php endif; ?>

     <!-- Nav Item For Vendors -->
     <?php if (in_groups('vendor')) : ?>
         <div class="sidebar-heading">
             Request
         </div>

         <!-- Nav Item - User List -->
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('vendor/incoming_request'); ?>">
                 <i class="fas fa-envelope"></i>
                 <span>Incoming request</span></a>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('vendor/successfully_send'); ?>">
                 <i class="fas fa-paper-plane"></i>
                 <span>Successfully sent</span></a>
         </li>
     <?php endif ?>
     <!-- End Vendors -->


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         User Profile
     </div>

     <!-- Nav Item - My Profile -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('user'); ?>">
             <i class="fas fa-user"></i>
             <span>My Profile</span></a>
     </li>

     <!-- Nav Item - Edit Profile -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('user/update_profile/' . user()->id); ?>">
             <i class="fas fa-user-edit"></i>
             <span>Edit Profile</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Logout -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('cekLog'); ?>">
             <i class="fas fa-sign-out-alt"></i>
             <span>Logout</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>