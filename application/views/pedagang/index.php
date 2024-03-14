<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Data Pedagang</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">pedagang</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Daftar pedagang</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <form class="form-horizontal row" action="" method="POST" id="FormLaporan">
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
                <?php if ($this->session->userdata('level') != 'Monitor') : ?>
                    <a href="<?= base_url('pedagang/tambah') ?>" class="btn btn-primary mb-2">Tambah Pedagang</a>
                <?php endif; ?>
                <div class="card" style="overflow-x:auto;">
                    <h5 class="card-header">Daftar Pedagang<?= $this->session->flashdata('message'); ?></h5>
                    <div class="card-body">
                        <table class="table " id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pedagang</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">No Rekening</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Lapak</th>
                                    <th scope="col">Sektor</th>

                                    <?php if ($this->session->userdata('level') != 'Monitor') : ?>
                                        <th scope="col">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pedagang)) : ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pedagang as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $p['nama_pedagang'] ?></td>
                                            <td><?= $p['nik'] ?></td>
                                            <td><?= $p['no_rekening'] ?></td>
                                            <td><?= $p['tgl_lahir'] ?></td>
                                            <td><?= $p['alamat'] ?></td>
                                            <td><?= $p['no_lapak'] ?></td>
                                            <td><?= $p['nama_sektor'] ?></td>
                                            <?php if ($this->session->userdata('level') != 'Monitor') : ?>
                                                <td>
                                                    <a href="<?= base_url('pedagang/ubah/') . $p['id_pedagang'] ?>" class="btn btn-warning mb-2"><i class="fas fa-edit"></i></a>
                                                    <a onclick="hapus('<?php echo $p['id_pedagang']; ?>')" data-toggle="modal" data-target="#hapus" class="btn btn-danger mb-2"><i class="fas fa-trash"></i></a>
                                                </td>
                                            <?php endif; ?>
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
                url: "<?php echo site_url('/pedagang/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="hapus"]').val(data.id_pedagang);
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
                        <p>Data pedagang akan dihapus!</p>

                        <form action="<?= base_url('pedagang/hapus') ?>" method="POST">
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