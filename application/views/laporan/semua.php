<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Halaman Laporan</h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Laporan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Semua Laporan</li>
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
                                <form class="form-horizontal row" action="" method="POST" id="FormLaporan">
                                    <div class="form-group ">

                                    </div>
                                    <div class="form-group col-md-6  col-sm-12">
                                        <input type="date" name="tgl" class="form-control">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mb-4 ml-2">Cari</button>
                                    <div class="form-group col-md-5  col-sm-12">
                                        <button type="button" value="print" onclick="PrintDiv();" class="btn btn-success"><span class="icon">
                                                <i class="fa fa-print"> Cetak</i>
                                    </div>
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
                                <h4 style="text-align:center ; color:black" class="text-uppercase">Laporan Data Retribusi</h4>
                                <p style="text-align: center; color:black; font-style: italic; ">Jl. Nusantara No.17, Calaca, Kec. Wenang, Kota Manado, Sulawesi Utara</p>

                                <p style="text-align: center; color:black; font-style: italic;">Kode Pos : 95122</p>
                                <p style="text-align: center; color:black; font-style: italic;">Tanggal: <?= $tgl ?></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>

                                        <th scope="col">Nama Sektor</th>
                                        <th scope="col">Total Lunas</th>
                                        <th scope="col">Total (Lunas)</th>
                                        <th scope="col">Total Tunggakan</th>
                                        <th scope="col">Total (Tunggakan)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($tgl)) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pedagang as $p) : ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td>
                                                    <?= $p['nama_sektor'] ?>
                                                </td>
                                                <?php
                                                if ($status == 'true') {
                                                    $id_sektor = $p['id_sektor'];
                                                    $totall = $this->db->query("SELECT *,s.id_sektor,pm.id_pedagang FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor INNER JOIN pembayaran pm ON p.id_pedagang = pm.id_pedagang WHERE p.id_sektor='$id_sektor' AND pm.tgl_pembayaran='$tgl'")->num_rows();
                                                    echo '<td>' . $totall . '</td>';
                                                    $tagihan = $p['tagihan'];
                                                    $akhir = $totall * $tagihan;
                                                    echo '<td>' . $akhir . '</td>';
                                                } else {
                                                    $id_sektor = $p['id_sektor'];
                                                    $total = $this->db->query("SELECT *,s.id_sektor,pm.id_pedagang FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor INNER JOIN pembayaran pm ON p.id_pedagang = pm.id_pedagang WHERE p.id_sektor='$id_sektor'")->num_rows();
                                                    echo '<td>' . $total . '</td>';
                                                    $tagihan = $p['tagihan'];
                                                    $akhir = $total * $tagihan;
                                                    echo '<td>' . $akhir . '</td>';
                                                } ?>
                                                <?php
                                                if ($status == 'true') {
                                                    $id_sektor = $p['id_sektor'];
                                                    $totalz = $this->db->query("SELECT *,s.id_sektor,t.id_pedagang FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor INNER JOIN tunggakan t ON p.id_pedagang = t.id_pedagang WHERE p.id_sektor='$id_sektor'AND t.tgl_tunggakan = '$tgl'")->num_rows();
                                                    echo '<td>' . $totalz . '</td>';
                                                    $tagihan = $p['tagihan'];
                                                    $akhirtunggakan = $totalz * $tagihan;
                                                    echo '<td>' . $akhirtunggakan . '</td>';
                                                } else {
                                                    $id_sektor = $p['id_sektor'];
                                                    $totalz = $this->db->query("SELECT *,s.id_sektor,t.id_pedagang FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor INNER JOIN tunggakan t ON p.id_pedagang = t.id_pedagang WHERE p.id_sektor='$id_sektor'")->num_rows();
                                                    echo '<td>' . $totalz . '</td>';
                                                    $tagihan = $p['tagihan'];
                                                    $akhirtunggakan = $totalz * $tagihan;
                                                    echo '<td>' . $akhirtunggakan . '</td>';
                                                } ?>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="15" style="text-align:center;">Silahakan Memilih Tanggal</td>
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