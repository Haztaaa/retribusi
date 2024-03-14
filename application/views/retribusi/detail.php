<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">DATA RETRIBUSI</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Retribusi</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <?php
        date_default_timezone_set('Asia/Makassar');
        $bulans = date('F');
        $b = date('m');
        $bini = date('m');
        $tahun = date('Y');

        settype($b, 'integer');
        settype($tahun, 'integer');
        ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <div class="card" style="overflow-x:auto;">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                        <?php if (empty($bulan)) : ?>
                            <?php
                            $bulans = date('F'); ?>
                            <div class="col">
                                <h5 class="card-header">Retribusi Bulan (<?= $bulans ?>)</h5>
                            </div>
                        <?php else : ?>
                            <?php
                            $monthName = date("F", mktime(0, 0, 0, $bulan, 10));

                            ?>
                            <div class="col">
                                <h5 class="card-header">Retribusi Bulan <?= $monthName ?></h5>
                            </div>
                        <?php endif; ?>

                    </div>


                    <div class="card-body">

                        <form class="form-horizontal row" action="" method="POST" id="FormLaporan">
                            <div class="form-group col-md-3 col-sm-12">
                                <select class="form-control selectric" id="bulan" name="bulan" required>
                                    <option value="" selected disabled>-- Pilih bulan --</option>
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
                            <button type="submit" name="submit" class="btn btn-primary mb-4">Cari</button>
                        </form>

                        <div class="row">

                            <div class="col-sm col-lg-9">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label" style="color: black;">Nama Pedagang</label>
                                    <table>
                                        <td>
                                            <?= $data['nama_pedagang'] ?>
                                        </td>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label" style="color: black;">Sektor</label>
                                    <table>
                                        <td>
                                            <?= $data['nama_sektor'] ?>
                                        </td>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label" style="color: black;">Tagihan</label>
                                    <table>
                                        <td>
                                            <?= $data['tagihan'] ?>
                                        </td>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-lg-12">
                            <label for="inputText3" class="col-form-label" style="color: black;">Data Pembayaran (Lunas)</label>
                            <table>
                                <div class="row">
                                    <?php if ($pem) : ?>
                                        <?php foreach ($pem as $p) : ?>
                                            <?php
                                            $originalDate = $p['tgl_pembayaran'];
                                            $newDate1 = date("d M Y", strtotime($originalDate)); ?>

                                            <div class="col-md-3">
                                                <div class="p-2 mb-2 bg-success text-white">
                                                    <?= $newDate1 ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="col">
                                            <div class="p-2 mb-2 bg-success text-white">
                                                Belum Ada Pembayaran
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </table>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="inputText3" class="col-form-label" style="color: black;">Data Hari Tidak Membayar</label>
                            <table>
                                <div class="row">
                                    <?php if ($tunggakan) : ?>
                                        <?php foreach ($tunggakan as $p) : ?>
                                            <?php
                                            $originalDate = $p['tgl_tunggakan'];
                                            $newDate1 = date("d M Y", strtotime($originalDate)); ?>

                                            <div class="col-md-3">
                                                <div class="p-2 mb-2 bg-danger text-white">
                                                    <?= $newDate1 ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="col">
                                            <div class="p-2 mb-2 bg-danger text-white">
                                                Bulan Ini Belum Ada Tunggakan
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </table>
                        </div>

                        <div class="form-group">
                            <label for="inputText3" class="col-form-label" style="color: black;">Total Tunggakan</label>

                            <?php if (empty($bulan)) : ?>
                                <?php $number = cal_days_in_month(CAL_GREGORIAN, $b, $tahun); // 31
                                ?>

                                <?php
                                $tagihan = $data['tagihan'];
                                $haribulan = $number;
                                $akhir = $total * $tagihan;
                                ?>
                                <?php if ($total == 0) : ?>
                                    <div class="p-2 mb-2 bg-success text-white">
                                        <?= $total ?> Hari (Tidak Membayar) dari <?= $haribulan ?> Hari
                                    </div>
                                <?php else : ?>
                                    <div class="p-2 mb-2 bg-danger text-white">
                                        <?= $total ?> Hari (Tidak Membayar) dari <?= $haribulan ?> Hari
                                    </div>
                                <?php endif; ?>

                                <?php
                                $tagihan = $data['tagihan'];
                                $haribulan = $number;
                                $akhir = $total * $tagihan;
                                ?>
                                <?php if ($akhir == 0) : ?>

                                    <div class="p-2 mb-2 bg-success text-white">
                                        Lunas
                                    </div>
                                <?php else : ?>
                                    <div class="p-2 mb-2 bg-danger text-white">
                                        Rp. <?= $akhir ?>

                                    </div>
                                <?php endif; ?>

                            <?php else : ?>
                                <?php $number = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); // 31
                                ?>

                                <?php
                                $tagihan = $data['tagihan'];
                                $haribulan = $number;
                                $akhir = $total * $tagihan;
                                ?>
                                <?php if ($total == 0) : ?>
                                    <div class="p-2 mb-2 bg-success text-white">
                                        <?= $total ?> Hari (Tidak Membayar) dari <?= $haribulan ?> Hari
                                    </div>
                                <?php else : ?>
                                    <div class="p-2 mb-2 bg-danger text-white">
                                        <?= $total ?> Hari (Tidak Membayar) dari <?= $haribulan ?> Hari
                                    </div>
                                <?php endif; ?>
                                <?php
                                $tagihan = $data['tagihan'];
                                $haribulan = $number;
                                $akhir = $total * $tagihan;
                                ?>
                                <?php if ($akhir == 0) : ?>
                                    <div class="p-2 mb-2 bg-success text-white">
                                        Lunas
                                    </div>
                                <?php else : ?>
                                    <div class="p-2 mb-2 bg-danger text-white">
                                        Rp. <?= $akhir ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <!-- <?php if ($akhir == 0) : ?>
                                <form action="<?= base_url('retribusi/lunas') ?>" method="POST">
                                    <input type="hidden" name="id_pedagang" id="" value="<?= $data['id_pedagang'] ?>">
                                    <input type="hidden" name="keterangan" id="" value="Lunas">
                                    <?php if (empty($bulan)) : ?>
                                        <input type="hidden" name="bulan" id="" value="<?= $bulans ?>">
                                    <?php else : ?>
                                        <input type="hidden" name="bulan" id="" value="<?= $monthName ?>">
                                    <?php endif; ?>
                                    <button type="input" class="btn btn-success float-right">Simpan Lunas</button>
                                </form>
                            <?php else : ?>
                                <form action="<?= base_url('retribusi/tunggak') ?>" method="POST">
                                    <input type="hidden" name="id_pedagang" id="" value="<?= $data['id_pedagang'] ?>">
                                    <input type="hidden" name="total" id="" value="<?= $akhir ?>">
                                    <?php if (empty($bulan)) : ?>
                                        <input type="hidden" name="bulan" id="" value="<?= $bulans ?>">
                                    <?php else : ?>
                                        <input type="hidden" name="bulan" id="" value="<?= $monthName ?>">
                                    <?php endif; ?>
                                    <button type="input" class="btn btn-danger float-right">Simpan Tunggakan</button>
                                </form>
                            <?php endif; ?> -->
                        </div>
                        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#pembayaranModal">
                            Pembayaran
                        </button>
                        <button type="button" class="btn btn-danger mt-4" data-toggle="modal" data-target="#tunggakModal">
                            Tidak Membayar
                        </button>
                        <a href="<?= base_url('retribusi') ?>" class="btn btn-warning mt-4">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pembayaranModal" tabindex="-1" role="dialog" aria-labelledby="pembayaranModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pembayaranModalLabel">Data Pembayaran Pedagang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('retribusi/bayar') ?>" method="POST">
                    <div class="modal-body">
                        <input id="inputText3" type="hidden" name="id_pedagang" class="form-control" value="<?= $data['id_pedagang'] ?>" readonly>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tagihan</label>
                            <input id="inputText3" type="text" name="nominal" class="form-control" value="<?= $data['tagihan'] ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tanggal pembayaran</label>
                            <input id="inputText3" type="date" name="tgl_pembayaran" class="form-control">
                            <?= form_error('tgl_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="input" class="btn btn-primary">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tunggakModal" tabindex="-1" role="dialog" aria-labelledby="tunggakModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tunggakModalLabel">Data Pedagang yang Tidak Membayar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('retribusi/tdk_bayar') ?>" method="POST">
                    <div class="modal-body">
                        <input id="inputText3" type="hidden" name="id_pedagang" class="form-control" value="<?= $data['id_pedagang'] ?>" readonly>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tagihan</label>
                            <input id="inputText3" type="text" name="tagihan" class="form-control" value="<?= $data['tagihan'] ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tanggal tunggakan</label>
                            <input id="inputText3" type="date" name="tgl_tunggakan" class="form-control">
                            <?= form_error('tgl_tunggakan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="input" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>