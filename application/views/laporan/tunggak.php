<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Halaman Laporan Tunggak</h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Laporan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lapora Tunggak</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">





                <!-- ============================================================== -->
                <!-- end sales  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- new customer  -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- end new customer  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- visitor  -->
                <!-- ============================================================== -->
                <div class="">
                    <div class="card border-3 border-top border-top-danger">
                        <div class="card-body">
                            <h5 class="text-muted"></h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"></h1>
                                <form class="form-horizontal row " action="" method="POST" id="FormLaporan">
                                    <div class="form-group ">
                                        <select class="form-control" name="sektor" id="sektor" required>

                                            <option value="">Pilih sektor</option>
                                            <?php foreach ($sektor as $s) : ?>
                                                <option value="<?= $s['id_sektor']; ?>"><?= $s['nama_sektor']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-5  ">
                                        <select class="form-control selectric" id="bulan" name="bulan">
                                            <option value="" selected disabled>Pilih bulan </option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mb-4 ml-2">Cari</button>
                                    <button type="button" value="print" onclick="PrintDiv();" class="btn btn-success"><span class="icon">
                                            <i class="fa fa-print"> Cetak</i>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <div id="divToPrint">
                    <div class="card">


                        <div class="row">
                            <div class="col-md-3" style="text-align: right;"><img src="<?= base_url('assets/images/logo1.jpeg'); ?>" style="width: 150px; "></div>
                            <div class="col-md-6 ml-2">
                                <h3 style="text-align:center ; color:black" class="text-uppercase">Pasar Bersehati Hebat</h3>
                                <h4 style="text-align:center ; color:black" class="text-uppercase">Laporan Tunggakan </h4>
                                <p style="text-align: center; color:black; font-style: italic; ">Jl. Nusantara No.17, Calaca, Kec. Wenang, Kota Manado, Sulawesi Utara</p>

                                <p style="text-align: center; color:black; font-style: italic;">Kode Pos : 95122</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pedagang</th>
                                        <th scope="col">No Lapak</th>
                                        <th scope="col">Nama Sektor</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Total Tunggakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pedagang)) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pedagang as $p) : ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td>
                                                    <?= $p['nama_pedagang'] ?>
                                                </td>
                                                <td><?= $p['no_lapak'] ?></td>
                                                <td><?= $p['nama_sektor'] ?></td>
                                                <td> <?= $p['tgl_tunggakan'] ?></td>
                                                <td><span class="badge badge-danger"><?= $p['total']; ?></span></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="15" style="text-align:center;">Silahakan Memilih Sektor</td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>