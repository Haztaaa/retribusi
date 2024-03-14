<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Halaman Utama</h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Beranda Admin</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="">
                <div class="card border-3 border-top border-top-danger">
                    <div class="card-body">
                        <h5 class="text-muted"></h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1"></h1>
                            <form class="form-horizontal row" action="" method="POST" id="FormLaporan">

                                <div class="form-group col-md-8  col-sm-12">
                                    <input type="date" name="tgl" class="form-control">
                                </div>
                                <div class="form-group col-md-3  col-sm-12">
                                    <button type="submit" name="submit" class="btn btn-primary mb-4 ml-2">Cari</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <div class="ecommerce-widget">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- sales  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Nominal Tunggakan <?= $hari ?></h5>
                                <div class="metric-value d-inline-block">

                                    <h1 class="mb-1">
                                        <?php $nominal;
                                        $a = implode(" ", $nominal);
                                        if ($a) {
                                            echo 'Rp. ' . $a;
                                        } else {
                                            echo 'Rp. 0';
                                        }
                                        ?>
                                    </h1>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end sales  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- new customer  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Nominal Lunas <?= $hari ?></h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">

                                        <?php
                                        $nom;
                                        $a = implode(" ", $nom);
                                        if ($a) {
                                            echo 'Rp. ' . $a;
                                        } else {
                                            echo 'Rp. 0';
                                        }

                                        ?>


                                    </h1>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end new customer  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- visitor  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Tunggakan <?= $hari ?></h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?= $tunggakan ?></h1>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end visitor  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- total orders  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Lunas <?= $hari ?></h5>

                                <div class="metric-value d-inline-block">

                                    <h1 class="mb-1"><?= $lunas ?></h1>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end total orders  -->
                    <!-- ============================================================== -->
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">

                            <h5 class="mb-0">Data Retribusi <span class="float-right" style="color:#5969FF;"> | Lunas </span> <span class="float-right" style="color:#F0346E; ">Menunggak |</span></h5>

                        </div>
                        <div class="card-body">
                            <div class="ct-chart ct-golden-section"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">PD Pasar Manado</h5>

                    <img src="<?= base_url() ?>/assets/images/pasar.jpg" alt="">
                </div>

            </div>
        </div>
    </div>