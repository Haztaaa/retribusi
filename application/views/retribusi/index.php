<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Data Retribusi</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Retribusi</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Daftar retribusi lunas</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <?php
        date_default_timezone_set('Asia/Makassar');
        $bulan = date('F');
        $tgl = date('Y-m-d');
        ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <form class="form-horizontal row" action="" method="get" id="FormLaporan">
                    <div class="form-group col-md-3 col-sm-12">
                        <select class="form-control" name="sektor" id="sektor">

                            <option value="">Pilih sektor</option>
                            <?php foreach ($sektor as $s) : ?>
                                <option value="<?= $s['id_sektor']; ?>"><?= $s['nama_sektor']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mb-4">Cari</button>

                </form>

                <div class="card" style="overflow-x:auto;">
                    <h5 class="card-header">Daftar Pedagang<?= $this->session->flashdata('message'); ?></h5>
                    <div class="card-body">
                        <table class="table " id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pedagang</th>
                                    <th scope="col">Nomor Lapak</th>
                                    <th scope="col">Sektor</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pedagang)) : ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pedagang as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $p['nama_pedagang'] ?></td>
                                            <td><?= $p['no_lapak'] ?></td>
                                            <td><?= $p['nama_sektor'] ?></td>
                                            <td>
                                                <?php $id = $p['id_pedagang'];
                                                $cek = $this->db->query("SELECT tgl_pembayaran FROM pembayaran WHERE id_pedagang ='$id' AND tgl_pembayaran ='$tgl'")->num_rows();

                                                ?>
                                                <?php $id = $p['id_pedagang'];
                                                $cek_ban = $this->db->query("SELECT tgl_tunggakan FROM tunggakan WHERE id_pedagang ='$id' AND tgl_tunggakan ='$tgl'")->num_rows();
                                                ?>
                                                <?php if ($cek >= 1) : ?>
                                                    <button type="button" class="btn btn-success mb-2"><i class="fas fa-check" disabled></i></button>
                                                <?php elseif ($cek_ban >= 1) : ?>
                                                    <button type="button" class="btn btn-danger mb-2"><i class="fas fa-ban" disabled></i></button>
                                                <?php else : ?>
                                                    <form action="<?= base_url('retribusi/bayar') ?>" method="POST">
                                                        <input type="hidden" name="id_pedagang" value="<?= $p['id_pedagang'] ?>">
                                                        <input type="hidden" name="tgl_pembayaran" value="<?= $tgl ?>">
                                                        <input type="hidden" name="cek" value="1">
                                                        <input type="hidden" name="nominal" value="<?= $p['tagihan'] ?>">
                                                        <input type="hidden" name="sektor" value="<?= $p['id_sektor'] ?>">
                                                        <button type="input" class="btn btn-warning mb-2"><i class="fas fa-calendar-check"></i> | Lunas</button>
                                                    </form>
                                                    <form action="<?= base_url('retribusi/tdk_bayar') ?>" method="POST">
                                                        <input type="hidden" name="id_pedagang" value="<?= $p['id_pedagang'] ?>">
                                                        <input type="hidden" name="tgl_tunggakan" value="<?= $tgl ?>">
                                                        <input type="hidden" name="cek" value="1">
                                                        <input type="hidden" name="tagihan" value="<?= $p['tagihan'] ?>">
                                                        <input type="hidden" name="sektor" value="<?= $p['id_sektor'] ?>">
                                                        <button type="input" class="btn btn-danger mb-2"><i class="fas fa-calendar-times"></i> | Tunggak</button>
                                                    </form>
                                                <?php endif; ?>





                                                <a href="<?= base_url('retribusi/detail/') . $p['id_pedagang'] ?>" class="btn btn-primary mb-2"><i class="fas fa-info"></i></a>

                                            </td>
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

    <script>
        function hapus(id) {
            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('/retribusi/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="hapus"]').val(data.id_setoran);
                    $('#hapus').modal('show'); // show bootstrap modal when complete loaded
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
    <div class="">
        <!-- Modal -->
        <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusLabel">Notifikasi</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <span class="badge badge-danger">Perhatian!</span>
                        <p>Data setoran pedagang akan dihapus!</p>

                        <form action="<?= base_url('retribusi/hapus') ?>" method="POST">
                            <input type="hidden" name="hapus">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <button class="btn btn-primary" type="submit">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>