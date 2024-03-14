<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Halaman Komuni Pertama</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Komuni</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Halaman Komuni</a></li>

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
                <a href="<?= base_url('komuni/tambah') ?>" class="btn btn-primary mb-2">Tambah Komuni</a>

                <div class="card">
                    <h5 class="card-header">Daftar Komuni <?= $this->session->flashdata('message'); ?></h5>
                    <div class="card-body">
                        <table class="table table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nama Ayah</th>
                                    <th scope="col">Nama Ibu</th>
                                    <th scope="col">No Baptis</th>
                                    <th scope="col">Tanggal Permandian</th>
                                    <th scope="col">Tempat Permandian</th>
                                    <th scope="col">Paroki Penerimaan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($komuni as $b) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $b['nama'] ?></td>
                                        <td><?= $b['nama_ayah'] ?></td>
                                        <td><?= $b['nama_ibu'] ?></td>
                                        <td><?= $b['no_baptis'] ?></td>
                                        <td><?= $b['tgl_permandian'] ?></td>
                                        <td><?= $b['tmpt_permandian'] ?></td>
                                        <td><?= $b['paroki_penerimaan'] ?></td>

                                        <td>
                                            <a href="<?= base_url('komuni/ubah/') . $b['id_komuni'] ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                            <a href="" onclick="hapus('<?php echo $b['id_komuni']; ?>')" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapus"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
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
                url: "<?php echo site_url('/komuni/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="hapus"]').val(data.id_komuni);
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
                        <p>Data Yang Dipilih Akan Dihapus!
                        </p>
                        <form action="<?= base_url('komuni/hapus') ?>" method="POST">
                            <input type="hidden" name="hapus">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <button class="btn btn-primary" type="submit">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>