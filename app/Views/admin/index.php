    <?= $this->extend('templates/index'); ?>
    <?= $this->section('page-content'); ?>

    <!-- Change color theme  -->
    <?php
    $inisial = '';
    $icon = '';
    $color1 = '';
    $color2 = '';
    $color3 = '';

    if (in_groups('superadmin')) {
        $inisial = 'hijau';
        $icon = 'hijau';
        $color1 = '#3E7C17';
        $color2 = '#125C13';
        $color3 = '#0B4619';
    } elseif (in_groups('admin')) {
        $inisial = 'biru';
        $icon = 'biru';
        $color1 = '#1687A7';
        $color2 = '#00587A';
        $color3 = '#2E4C6D';
    } elseif (in_groups('marketing')) {
        $inisial = 'pink';
        $icon = 'pink';
        $color1 = '#F9C5D5';
        $color2 = '#F2789F';
        $color3 = '#FF5F7E';
    } else {
        $inisial = 'hijau';
        $icon = 'hijau';
    } ?>
    <!-- End change -->

    <!-- Begin Page Content -->
    <script src="<?= base_url(); ?>/vendor/chart.js/Chart.min.js"></script>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <?php if (in_groups('admin')) : ?>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            <?php endif; ?>
        </div>

        <!-- Content Row -->
        <div class="row">
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

            <!-- Content For Vendor -->

            <?php if (in_groups('vendor')) : ?>

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Introduction</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-1 mb-1" style="width: 25rem;" src="<?= base_url('img/bg-vendor.jpg'); ?>" alt="Gambar gagal dimuat..">
                        </div>
                        <p>Melalui aplikasi ini anda dapat menentukan harga dan durasi pengiriman dari barang yang di minta oleh <b>PT. WAKABE INDONESIA</b>, dengan demikian diharapkan dapat memudahkan proses bisnis antar kedua belah pihak.</p>
                        <p>Berikut penjelasan untuk masing-masing menu yang ada pada sidebar sebelah kiri :</p>
                        <ul>
                            <li><b>Incoming request</b> : menu ini berisi data request masuk dari PT.WAKABE INDONESIA</li>
                            <li><b>Successfully sent</b> : menu ini berisi rekap data yang berhasil anda submit (kirim) ke server</li>
                            <li><b>My profile</b> : menu ini berisi tentang detail account anda</li>
                            <li><b>Edit Profile</b> : anda dapat mengubah seluruh informasi dari account anda melalui menu ini</li>
                        </ul>
                        <div class="alert alert-success" role="alert">
                            <small>
                                <p>Untuk kendala dan masukkan terkait aplikasi, silahkan menghubungi PT.WAKABE INDONESIA </p>
                            </small>
                        </div>
                        <small></small>
                    </div>
                </div>



            <?php endif; ?>


            <!-- Content kecuali vendor -->
            <?php if (in_groups('superadmin') + in_groups('admin') + in_groups('marketing')) : ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2 card-index <?= $inisial; ?>">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        Procurement Request</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark"><?= $count_request; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-poll fa-2x text-<?= $icon; ?>"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2 card-index <?= $inisial; ?>">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        Procurement Proses</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark"><?= $count_proses; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-project-diagram fa-2x text-<?= $icon; ?>"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2 card-index <?= $inisial; ?>">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        Feedback Vendor</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark"><?= $count_confirm; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments-dollar fa-2x text-<?= $icon; ?>"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2 card-index <?= $inisial; ?>">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Quotation
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-dark"><?= $count_quotation; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tasks fa-2x text-<?= $icon; ?>"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">


            <div class="col-xl-8 col-lg-7">
                <div class="card">
                    <div class="card-header text-<?= $icon; ?>">
                        Login Record
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive" style="height: 350px;">
                            <thead>
                                <tr class="bg-<?= $icon; ?>">
                                    <th>Username</th>
                                    <th>Tanggal</th>
                                    <th>Perangkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_log as $log) : ?>
                                    <tr>
                                        <td><?= $log['nama_user']; ?></td>
                                        <td><?= $log['last_login']; ?></td>
                                        <td><?= $log['perangkat']; ?></td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-<?= $icon; ?>">Count ALL User</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <hr>
                        <small>
                            The users displayed are all users who can log in, but for vendors, it may not be
                        </small>
                    </div>
                </div>
                <script type="text/javascript">
                    // Set new default font family and font color to mimic Bootstrap's default styling
                    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#858796';

                    // Pie Chart Example
                    var ctx = document.getElementById("myPieChart");
                    var myPieChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['local user', 'user client', 'vendor'],
                            datasets: [{
                                data: [<?= $count_local_user; ?>, <?= $count_notLocal_user; ?>, <?= $count_vendor; ?>],
                                backgroundColor: ['<?= $color1; ?>', '<?= $color2; ?>', '<?= $color3; ?>'],
                                hoverBackgroundColor: ['#F4F6FF', '#F4F6FF', '#F4F6FF'],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: false
                            },
                            cutoutPercentage: 80,
                        },
                    });
                </script>
            </div>
        </div>
    <?php endif; ?>

    </div>
    <!-- /.container-fluid -->




    <?= $this->endSection(); ?>