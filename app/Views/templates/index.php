<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Web Aplication for manage procurement flow">
    <meta name="author" content="Wakabe E-Procurement">

    <title>Wakabe | E-Procurement</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/select2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/css/custom.css" rel="stylesheet">
    <script src="<?= base_url(); ?>/js/jquery-3.6.0.js"></script>


</head>

<body id="page-top">
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

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <?= $this->include('templates/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php if (in_groups('marketing')) : ?>
                    <div class="preloader">
                        <div class="loading">
                            <img src="<?= base_url('img/loader-marketing.gif'); ?>" alt="404 Bad Request">
                            <p class="loading <?= $icon; ?>">Loading</p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (in_groups('admin')) : ?>
                    <div class="preloader">
                        <div class="loading">
                            <img src="<?= base_url('img/loader-admin.gif'); ?>" alt="404 Bad Request">
                            <p class="loading <?= $icon; ?>">Loading</p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (in_groups('superadmin') + in_groups('vendor')) : ?>
                    <div class="preloader">
                        <div class="loading">
                            <img src="<?= base_url('img/loader.gif'); ?>" alt="404 Bad Request">
                            <p class="loading <?= $icon; ?>">Loading</p>
                        </div>
                    </div>
                <?php endif; ?>


                <!-- Topbar -->
                <?= $this->include('templates/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('page-content'); ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Wakabe-Indonesia <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title <?= $icon; ?>" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('cekLog'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>/js/select2.min.js"></script>
    <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>
    <!-- Page level plugins -->


    <!-- Page level custom scripts -->



    <script>
        $(document).ready(function() {
            $('#vendor').select2({
                placeholder: "Daftar vendor",
                allowClear: true,
                language: "id"
            });




            $(".preloader").delay(150).fadeOut('slow');
            $('#notif').slideDown('slow').delay(2000).slideUp('slow');
        });


        $('.tombol-hps-request').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Apa Anda Yakin?',
                text: "Data akan dihapus dari database server",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus data'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                    Swal.fire(
                        'Deleted!',
                        'Data Berhasil Dihapus.',
                        'success'
                    )
                }
            })
        });
    </script>
</body>

</html>